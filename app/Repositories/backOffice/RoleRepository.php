<?php

namespace App\Repositories\backOffice;

use App\Repositories\Interfaces\backOffice\RoleRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $role;

    function __construct(Role $role)
    {
        $this->role = $role;
        
    }
    
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    public function allRoles()
    {
        $roles = Role::select('*');
            return Datatables::of($roles)
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

    public function getRoles()
    {
        return Role::all();
    }

    public function storeRole($data)
    {
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);
    }

    public function findRole($id)
    {
        return Role::findOrFail($id);
    }

    public function updateRole($data, $id)
    {
        $role = $this->findRole($id);
        $role->name = $data['name'];
        $role->save();
        $role->syncPermissions($data['permission']);
    }

    public function destroyRole($id)
    {
        $role = $this->findRole($id);
        $role->delete();
    }
}
