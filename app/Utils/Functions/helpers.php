<?php

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

if (!function_exists('paginate_to_apidata')) {
    /**
     * paginate对象装换Api数据结构辅助函数
     *
     * @param \Illuminate\Contracts\Pagination\LengthAwarePaginator $paginate
     *
     * @return array
     */
    function paginate_to_apidata(LengthAwarePaginator $paginate)
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

if (!function_exists('absolute_resources_path')) {
    /**
     * 获取资源绝对路径
     *
     * @param string $relativePath
     *
     * @return string
     */
    function resources_path(string $relativePath)
    {
        return sprintf('//%s/%s', config('filesystems.disks.public.upyun.domain'), $relativePath);
    }
}
