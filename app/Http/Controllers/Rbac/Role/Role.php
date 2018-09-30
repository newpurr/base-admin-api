<?php

namespace App\Http\Controllers\Rbac\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = \App\Models\Role::when(\request('name'), function (\Illuminate\Database\Eloquent\Builder $query,$value) {
            return $query->where('name', 'like','%' . $value . '%');
        })->paginate((int) \request('limit', 15));
        return response()->json([
            'items'    => $paginate->items(),
            'paginate' => [
                'total'     => $paginate->total(),
                'last_page' => $paginate->lastPage(),
                'per_page'  => $paginate->perPage()
            ]
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleModel = \App\Models\Role::make();
        $roleModel->fill($request->only(['name']));
        $roleModel->save();
        return $roleModel;
    }
    
    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Models\Role::find($id);
    }
    
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roleModel = \App\Models\Role::findOrFail($id);
        $roleModel->fill($request->only(['name']));
        $roleModel->save();
        return $roleModel;
    }
    
    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function batchDestory(Request $request)
    {
        $ids = $request->json('params.ids');
        if(!$ids) {
            return [
                'code' => 'error',
                'desc' => 'no selected option'
            ];
        }
    
        $ids = explode(',', $ids);
        \App\Models\Role::whereIn('id', $ids)->update(['enable'=>0]);
        return [
            'code' => 'succeed',
            'desc' => ''
        ];
    }
    
    public function batchEnable(Request $request)
    {
        $ids = $request->json('params.ids');
        if(!$ids) {
            return [
                'code' => 'error',
                'desc' => 'no selected option'
            ];
        }
    
        $ids = explode(',', $ids);
        \App\Models\Role::whereIn('id', $ids)->update(['enable'=>1]);
        return [
            'code' => 'succeed',
            'desc' => ''
        ];
    }
}
