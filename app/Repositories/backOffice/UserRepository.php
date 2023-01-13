<?php

namespace App\Repositories\backOffice;

use App\Models\User;
use App\Services\Interfaces\backOffice\UserServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\Facades\DataTables;

//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserServiceInterface
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
        
    }
    
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function allUsers()
    {
        $users = User::get();
            return DataTables::of($users)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/users-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/users-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/users-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
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

    public function storeUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
        ]);
        $user->assignRole($data['roles']);
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function findProfile($id)
    {
        return User::findOrFail(Auth::user()->id);
    }

    public function userRole($user)
    {
        return $user->roles->all();
    }

    public function updateUser($data, $id)
    {
        $user = $this->findUser($id);
        if(!empty($data['password'])){ 
            $data['password'] = Hash::make($data['password']);
        }else{
            $data = Arr::except($data,array('password'));    
        }
        if ($data['avatar'] != "") {
            $avatar = time() . '.' . $data['avatar']->getClientoriginalExtension();
            $data['avatar']->move(public_path('uploads/avatars'), $avatar);
        }
        $user->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>($data['password'] ? $data['password'] : $user->password),
            'avatar' => isset($avatar) ? $avatar : null,
        ]);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($data['roles']);
    }

    public function destroyUser($id)
    {
        $user = $this->findUser($id);
        $user->delete();
    }
}
