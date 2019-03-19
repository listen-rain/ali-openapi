<?php
/**
 * Created by PhpStorm.
 * User: <zhufengwei@aliyun.com>
 * Date: 2019/3/19
 * Time: 11:48
 */

/**
 *
 */
define('LOCATION_SERVICE_PRODUCT_NAME', 'Location');
/**
 *
 */
define('LOCATION_SERVICE_VERSION', '2015-06-12');
/**
 *
 */
define('LOCATION_SERVICE_DESCRIBE_ENDPOINT_ACTION', 'DescribeEndpoints');
/**
 *
 */
define('LOCATION_SERVICE_REGION', 'cn-hangzhou');

class DescribeEndpointRequest extends RpcAcsRequest
{
    /**
     * DescribeEndpointRequest constructor.
     *
     * @param $id
     * @param $serviceCode
     * @param $endPointType
     */
    public function __construct($id, $serviceCode, $endPointType)
    {
        parent::__construct(LOCATION_SERVICE_PRODUCT_NAME,
                            LOCATION_SERVICE_VERSION,
                            LOCATION_SERVICE_DESCRIBE_ENDPOINT_ACTION);

        $this->queryParameters['Id']          = $id;
        $this->queryParameters['ServiceCode'] = $serviceCode;
        $this->queryParameters['Type']        = $endPointType;
        $this->setRegionId(LOCATION_SERVICE_REGION);

        $this->setAcceptFormat('JSON');
    }
}
