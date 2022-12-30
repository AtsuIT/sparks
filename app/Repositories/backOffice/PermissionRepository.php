<?php

namespace App\Repositories\backOffice;

use App\Repositories\Interfaces\backOffice\PermissionRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Spatie\Permission\Models\Permission;
use DataTables;
//use Your Model

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected $permission;

    function __construct(Permission $permission)
    {
        $this->permission = $permission;
        
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Permission::class;
    }

    public function getPermissions()
    {
        return Permission::get();
    }

    public function allPermissions()
    {
        $permissions = Permission::select('*');
            return Datatables::of($permissions)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/permissions-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/permissions-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/permissions-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
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

    public function storePermission($data)
    {
        Permission::create(['name' => $data['name']]);
    }

    public function findPermission($id)
    {
        return Permission::findOrFail($id);
    }

    public function updatePermission($data, $id)
    {
        $permission = $this->findPermission($id);
        $permission->name = $data['name'];
        $permission->save();
    }

    public function destroyPermission($id)
    {
        $permission = $this->findPermission($id);
        $permission->delete();
    }
}
