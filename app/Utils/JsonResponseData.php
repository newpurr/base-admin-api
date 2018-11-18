<?php

namespace App\Utils;

use App\Constant\JsonResponseCode;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Trait JsonResponseDataFormat Json信息响应格式化工具类
 *
 * @package App\util
 */
trait JsonResponseData
{
    /**
     * formatSuccess 成功响应数据
     *
     * @param array|LengthAwarePaginator $response
     *
     * @return array
     */
    public function success($response = []) : array
    {
        if ($response instanceof LengthAwarePaginator) {
            return $this->format(JsonResponseCode::SUCCESS, '', paginateToApiData($response));
        }
        
        return $this->format(JsonResponseCode::SUCCESS, '', $response);
    }
    
    /**
     * error 响应错误数据
     *
     * @param string $code
     * @param string $msg
     *
     * @return array
     */
    public function error(string $code, string $msg) : array
    {
        return $this->format($code, $msg, []);
    }
    
    /**
     * format 统一格式返回数据格式
     *
     * @param string $code         错误码
     * @param string $msg          错误信息
     * @param array  $responseData 响应数据
     *
     * @return array
     */
    public function format(string $code, string $msg, array $responseData = []) : array
    {
        if (empty($msg)) {
            $msg = JsonResponseCode::getName($code) ?? '';
        }
        
        return [
            'code'    => $code,
            'message' => $msg,
            'payload' => (object) $responseData
        ];
    }
}
