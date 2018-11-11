<?php

namespace App\Utils;

use App\Constant\JsonResponseCode;

/**
 * Trait JsonResponseDataFormat Json信息响应格式化工具类
 * @package App\util
 */
class JsonResponseData
{
    /**
     * formatSuccess 成功响应数据format
     * @param array $response
     * @return array
     */
    public function formatAsSuccess(array $response = []) : array
    {
        return $this->format(JsonResponseCode::SUCCESS, '', $response);
    }
    
    /**
     * formatPaginateAsSuccess LengthAwarePaginator对象format
     * @param \Illuminate\Contracts\Pagination\LengthAwarePaginator $paginate
     * @return array
     */
    public function formatPaginateAsSuccess(\Illuminate\Contracts\Pagination\LengthAwarePaginator $paginate) : array
    {
        return $this->format(JsonResponseCode::SUCCESS, '', paginateToApiData($paginate));
    }
    
    /**
     * formatError 响应错误数据format
     * @param string $code
     * @param string $msg
     * @return array
     */
    public function formatAsError(string $code, string $msg) : array
    {
        return $this->format($code, $msg, []);
    }
    
    /**
     * format 统一格式返回数据格式
     * @param string $code         错误码
     * @param string $msg          错误信息
     * @param array  $responseData 响应数据
     * @return array
     */
    public function format(string $code, string $msg, array $responseData = []) : array
    {
        if (empty($msg)) {
            $msg = JsonResponseCode::getName($code) ?? '';
        }
        
        return [
            'errno'   => $code,
            'errmsg'  => $msg,
            'payload' => (object) $responseData
        ];
    }
}
