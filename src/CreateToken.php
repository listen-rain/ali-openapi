<?php

namespace Listen\AliOpenapi;

use Listen\AliOpenapi\Nls\Request\V20180518\CreateTokenRequest;
use Illuminate\Config\Repository;
use DefaultProfile;
use DefaultAcsClient;
use ServerException;
use ClientException;

class CreateToken
{
    use CallbackTrait {
        CallbackTrait::__construct as private callbackConstruct;
    }

    private          $config;
    private          $client;
    private          $clientProfile;
    protected static $logger;

    public function __construct(Repository $config)
    {
        $this->config = $config;

        self::mergeConfig();
        self::defineProxy();
        $this->addEndpoint();
        $this->setProfile();

        $this->callbackConstruct();
    }

    /**
     * @param $endpointName
     * @param $regionId
     * @param $product
     * @param $domain
     */
    public function addEndpoint()
    {
        DefaultProfile::addEndpoint(
            $this->config->get('aliopenapi.endpointName'),
            $this->config->get('aliopenapi.regionId'),
            $this->config->get('aliopenapi.product'),
            $this->config->get('aliopenapi.domain')
        );

        return $this;
    }

    public function setProfile()
    {
        $this->clientProfile = DefaultProfile::getProfile(
            $this->config->get('aliopenapi.regionId'),                     # Region ID
            $this->config->get('aliopenapi.accessKeyId'),                  # 您的 AccessKey ID
            $this->config->get('aliopenapi.accessKeySecret')               # 您的 AccessKey Secret
        );

        $this->makeClient();

        return $this;
    }

    public function makeClient()
    {
        $this->client = new DefaultAcsClient($this->clientProfile);

        return $this;
    }

    public function getToken()
    {
        # 发起请求并处理返回
        try {
            $response = $this->client->getAcsResponse(
                new CreateTokenRequest()
            );

            if (!$response) {
                $this->applyCallback('aliopenapi', '获取阿里 Token 失败', 0);

                return false;
            }

            return $response->Token;
        } catch (ServerException $e) {
            $this->applyCallback('aliopenapi', $e->getMessage(), $e->getErrorCode());

            return false;
        } catch (ClientException $e) {
            $this->applyCallback('aliopenapi', $e->getMessage(), $e->getErrorCode());

            return false;
        }
    }

    private static function defineProxy()
    {
        !defined('ENABLE_HTTP_PROXY') && define('ENABLE_HTTP_PROXY', false);
        !defined('HTTP_PROXY_IP') && define('HTTP_PROXY_IP', '127.0.0.1');
        !defined('HTTP_PROXY_PORT') && define('HTTP_PROXY_PORT', '8888');
    }

    private static function mergeConfig()
    {
        require_once __DIR__ . '/core/Regions/EndpointConfig.php';
        require_once __DIR__ . '/core/Regions/LocationService.php';
    }
}
