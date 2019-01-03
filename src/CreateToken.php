<?php
/**
 * Created by PhpStorm.
 * User: <zhufengwei@100tal.com>
 * Date: 2019/1/2
 * Time: 16:34
 */

namespace Listen\AliApi;

use Listen\AliApi\Nls\Request\V20180518\CreateTokenRequest;
use Illuminate\Config\Repository;
use DefaultProfile;
use DefaultAcsClient;
use ServerException;
use ClientException;

class CreateToken
{
    private $config;
    private $client;
    private $clientProfile;

    public function __construct(Repository $config)
    {
        $this->config = $config;

        self::mergeConfig();
        self::defineProxy();
        $this->addEndpoint();
        $this->setProfile();
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

            return $response->Token;
        } catch (ServerException $e) {
            print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
        } catch (ClientException $e) {
            print "Error: " . $e->getErrorCode() . " Message: " . $e->getMessage() . "\n";
        }
    }

    private static function defineProxy()
    {
        define('ENABLE_HTTP_PROXY', false);
        define('HTTP_PROXY_IP', '127.0.0.1');
        define('HTTP_PROXY_PORT', '8888');
    }

    private static function mergeConfig()
    {
        require __DIR__ . '/core/Regions/EndpointConfig.php';
        require __DIR__ . '/core/Regions/LocationService.php';
    }
}
