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

if (!function_exists('json_response')) {
    /**
     * Get the JsonResponseData instance.
     *
     * @return \App\Utils\JsonResponseData
     */
    function json_response()
    {
        return app(\App\Utils\JsonResponseData::class);
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

if (!function_exists('saveTree')) {
    function saveTree($tree, $parantId = 0)
    {
        if (empty($tree)) {
            return true;
        }
        
        /** @var \App\Models\Permission $model */
        $model = \App\Models\Permission::firstOrNew([
            'per_type' => 2,
            'path'     => $tree['absolute_path']
        ]);
        
        $model->name        = $tree['name'];
        $model->description = $tree['title'];
        $model->per_type    = $tree['per_type'];
        $model->parent_id   = $parantId;
        $model->save();
        
        if (empty($tree['children'])) {
            return true;
        }
        
        foreach ($tree['children'] as $child) {
            saveTree($child, $model->id);
        }
        
        return true;
    }
}
