<?php

namespace App\Http\Controllers\Helper;

use App\Exceptions\ParamterErrorException;
use Illuminate\Http\Request;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;
use Validator;

/**
 * Trait BatchOperation
 *
 * 控制器通用操作基础实现
 *
 * @author  luotao
 * @version 1.0
 * @package App\Http\Controllers\Helper
 */
trait SimpleOperation
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return JsonResponseBodyInterface
     */
    public function destroy($id) : JsonResponseBodyInterface
    {
        $this->service->softDelete($id);
        
        return build_successful_body();
    }
    
    /**
     * 批量禁用角色
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponseBodyInterface
     */
    public function batchDisabled(Request $request) : JsonResponseBodyInterface
    {
        $ids       = $request->json('params');
        $validator = Validator::make($ids, ['ids' => 'required|array'], [
            'ids.required' => '请指定需要批量操作的选项ID',
            'ids.array'    => 'params.ids字段必须是数组'
        ]);
        if ($validator->fails()) {
            throw new ParamterErrorException($validator->errors()->first());
        }
        
        $affectedRows = $this->service->batchDisabled($ids);
        
        return build_successful_body([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * batchEnable
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponseBodyInterface
     */
    public function batchEnable(Request $request) : JsonResponseBodyInterface
    {
        $ids       = $request->json('params');
        $validator = Validator::make($ids, ['ids' => 'required|array'], [
            'ids.required' => '请指定需要批量操作的选项ID',
            'ids.array'    => 'params.ids字段必须是数组'
        ]);
        if ($validator->fails()) {
            throw new ParamterErrorException($validator->errors()->first());
        }
        
        $affectedRows = $this->service->batchEnabled($ids);
        
        return build_successful_body([
            'affected_rows' => $affectedRows
        ]);
    }
}
