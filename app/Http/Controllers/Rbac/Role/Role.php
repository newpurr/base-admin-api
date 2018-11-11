<?php

namespace App\Http\Controllers\Rbac\Role;

use App\Exceptions\ParamterErrorException;
use App\Models\Role as RoleModel;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index() : array
    {
        $paginate = RoleModel::when(\request('name'), function (EloquentBuilder $query, $value) {
            return $query->where('name', 'like', '%' . $value . '%');
        })->paginate((int) \request('limit', 15));
        
        return jsonResponse()->formatPaginateAsSuccess($paginate);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function store(Request $request) : array
    {
        $roleModel = RoleModel::make();
        $roleModel->fill($request->only([ 'name' ]));
        $roleModel->save();
        
        return jsonResponse()->formatAsSuccess($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return array|mixed
     */
    public function show($id)
    {
        $roleModel = RoleModel::find($id);
        if (!$roleModel) {
            return response('', Response::HTTP_NOT_FOUND);
        }
        
        return jsonResponse()->formatAsSuccess($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return array
     */
    public function update(Request $request, $id) : array
    {
        $roleModel = RoleModel::findOrFail($id);
        $roleModel->fill($request->only([ 'name' ]));
        $roleModel->save();
        
        return jsonResponse()->formatAsSuccess($roleModel->toArray());
    }
    
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int $id
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
    
    /**
     * 批量禁用角色
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function batchDestory(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $ids = explode(',', $ids);
        RoleModel::whereIn('id', $ids)->update([ 'enable' => 0 ]);
        
        return jsonResponse()->formatAsSuccess();
    }
    
    /**
     * batchEnable
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function batchEnable(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            return jsonResponse()->format('error', 'no selected option');
        }
        
        $ids = explode(',', $ids);
        RoleModel::whereIn('id', $ids)->update([ 'enable' => 1 ]);
        
        return jsonResponse()->format('succeed', '');
    }
}
