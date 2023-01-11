<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\backOffice\PermissionService;
use App\Services\backOffice\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    protected $permissionService;
    protected $roleService;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $this->roleService->allPermissions();
            $roles = Role::select('*');
            return DataTables::of($roles)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/roles-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/roles-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/roles-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="sa-warning btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>';
                })
                ->editColumn('info', function ($row) {
                    return substr($row->info,0,15);
               })
               ->escapeColumns([])
            ->make(true);
        }
        return view('roles.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->permissionService->getPermissions();
        return view('roles.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleService->storeRole($request);
        return redirect()->route('roles')->with('success', Lang::get('t-role-created'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->roleService->findRole($id);
        $permission = $this->permissionService->getPermissions();
        $rolePermissions = $this->roleService->rolePermissions($id);
        return view('roles.show',compact('role','rolePermissions','permission'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleService->findRole($id);
        $permission = $this->permissionService->getPermissions();
        $rolePermissions = $this->roleService->rolePermissions($id);
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleService->updateRole($request, $id);
        return redirect()->route('roles')->with('success', Lang::get('t-role-updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleService->destroyRole($id);
        return redirect()->route('roles')->with('error', Lang::get('t-role-deleted'));
    }
}
