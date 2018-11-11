<?php

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

if (!function_exists('paginateToApiData')) {
    /**
     * paginate对象装换Api数据结构辅助函数
     *
     * @param \Illuminate\Contracts\Pagination\LengthAwarePaginator $paginate
     *
     * @return array
     */
    function paginateToApiData(LengthAwarePaginator $paginate)
    {
        return [
            'paginate' => [
                'items'        => $paginate->items(),
                'total'        => $paginate->total(),
                'last_page'    => $paginate->lastPage(),
                'current_page' => $paginate->currentPage(),
                'page_size'    => $paginate->perPage()
            ]
        ];
    }
}
if (!function_exists('jsonResponse')) {
    /**
     * Get the JsonResponseData instance.
     *
     * @return \App\Utils\JsonResponseData
     */
    function jsonResponse()
    {
        return app(\App\Utils\JsonResponseData::class);
    }
}
