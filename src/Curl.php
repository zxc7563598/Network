<?php

namespace Suqingan\Network;

class Curl
{

    /**
     * Curl 发送 Get 请求
     * 
     * 如果不指定 Type 则将不会携带 Content-type
     *
     * @param string $url 请求地址
     * @param string $type 请求类型「from, form-data, json, xml」
     * @param array $header 额外的 header
     * @param integer $timeout 超时时间「毫秒」
     * @return string|array|null
     */
    public static function Get($url, $type = null, $header = [], $timeout = 0)
    {
        $headerArray = [];
        switch ($type) {
            case 'from':
                $headerArray = ["Content-type:application/x-www-form-urlencoded", "Accept:application/x-www-form-urlencoded"];
                break;
            case 'form-data':
                $headerArray = ["Content-type:multipart/form-data", "Accept:multipart/form-data"];
                break;
            case 'json':
                $headerArray = ["Content-type:application/json", "Accept:application/json"];
                break;
            case 'xml':
                $headerArray = ["Content-type:text/xml", "Accept:text/xml"];
                break;
        }
        $headerArray = array_merge($headerArray, $header);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return [
            'code' => $code,
            'data' => $output
        ];
    }

    /**
     * Curl 发送 Post 请求
     * 
     * 如果不指定 Type 则将不会携带 Content-type, 也不会对请求数据进行处理
     *
     * @param string $url 请求地址
     * @param array|string $data 请求数据
     * @param string $type 请求类型「from, form-data, json, xml」
     * @param array $header 额外的 header
     * @param integer $timeout 超时时间「毫秒」
     * @return array
     */
    public static function Post($url, $data, $type = null, $header = [], $timeout = 0)
    {
        $headerArray = [];
        switch ($type) {
            case 'from':
                $headerArray = ["Content-type:application/x-www-form-urlencoded", "Accept:application/x-www-form-urlencoded"];
                $data = http_build_query($data);
                break;
            case 'form-data':
                $headerArray = ["Content-type:multipart/form-data", "Accept:multipart/form-data"];
                break;
            case 'json':
                $headerArray = ["Content-type:application/json", "Accept:application/json"];
                $data = json_encode($data, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES + JSON_PRESERVE_ZERO_FRACTION);
                break;
            case 'xml':
                $headerArray = ["Content-type:text/xml", "Accept:text/xml"];
                $data = urlencode($data);
                break;
        }
        $headerArray = array_merge($headerArray, $header);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return [
            'code' => $code,
            'data' => $output
        ];
    }

    /**
     * Curl 发送 Del 请求
     * 
     * 如果不指定 Type 则将不会携带 Content-type, 也不会对请求数据进行处理
     *
     * @param string $url 请求地址
     * @param array|string $data 请求数据
     * @param string $type 请求类型「from, form-data, json, xml」
     * @param array $header 额外的 header
     * @param integer $timeout 超时时间「毫秒」
     * @return array
     */
    public static function Del($url, $data, $type = null, $header = [], $timeout = 0)
    {
        $headerArray = [];
        switch ($type) {
            case 'from':
                $headerArray = ["Content-type:application/x-www-form-urlencoded", "Accept:application/x-www-form-urlencoded"];
                $data = http_build_query($data);
                break;
            case 'form-data':
                $headerArray = ["Content-type:multipart/form-data", "Accept:multipart/form-data"];
                break;
            case 'json':
                $headerArray = ["Content-type:application/json", "Accept:application/json"];
                $data = json_encode($data, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES + JSON_PRESERVE_ZERO_FRACTION);
                break;
            case 'xml':
                $headerArray = ["Content-type:text/xml", "Accept:text/xml"];
                $data = urlencode($data);
                break;
        }
        $headerArray = array_merge($headerArray, $header);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return [
            'code' => $code,
            'data' => $output
        ];
    }
    /**
     * Curl 发送 Put 请求
     * 
     * 如果不指定 Type 则将不会携带 Content-type, 也不会对请求数据进行处理
     *
     * @param string $url 请求地址
     * @param array|string $data 请求数据
     * @param string $type 请求类型「from, form-data, json, xml」
     * @param array $header 额外的 header
     * @param integer $timeout 超时时间「毫秒」
     * @return array
     */
    public static function Put($url, $data, $type = null, $header = [], $timeout = 0)
    {
        $headerArray = [];
        switch ($type) {
            case 'from':
                $headerArray = ["Content-type:application/x-www-form-urlencoded", "Accept:application/x-www-form-urlencoded"];
                $data = http_build_query($data);
                break;
            case 'form-data':
                $headerArray = ["Content-type:multipart/form-data", "Accept:multipart/form-data"];
                break;
            case 'json':
                $headerArray = ["Content-type:application/json", "Accept:application/json"];
                $data = json_encode($data, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES + JSON_PRESERVE_ZERO_FRACTION);
                break;
            case 'xml':
                $headerArray = ["Content-type:text/xml", "Accept:text/xml"];
                $data = urlencode($data);
                break;
        }
        $headerArray = array_merge($headerArray, $header);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return [
            'code' => $code,
            'data' => $output
        ];
    }
}
