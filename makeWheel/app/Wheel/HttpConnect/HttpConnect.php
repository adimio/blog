<?php


namespace makeWheel\Wheel\HttpConnect;


class HttpConnection
{
    /**
     * @param string $url 请求地址
     * @param bool $params 请求参数 (post-data  get-?param[array])
     * @param int $ispost 请求方式
     * @param int $https https协议
     * @return bool|mixed
     */
    public static function curl($url, $params = false, $ispost = 0, $https = 0){
        $httpInfo = array();
        $ch = curl_init();//初始化curl句柄
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);//HTTP版本
        //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);//最长等待时间
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);//允许函数执行最长时间
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//获取的信息以字符串返回，而不是直接输出
        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);//请求方式POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);//post—data
            curl_setopt($ch, CURLOPT_URL, $url);//url
        } else {
            if ($params) {//get传入参数
                if (is_array($params)) {
                    $params = http_build_query($params);//在url后的请求字符串
                }
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }

        $response = curl_exec($ch);

        if ($response === FALSE) {
            return false;
        }
        //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //$httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }


    public function pool(){

    }
}
