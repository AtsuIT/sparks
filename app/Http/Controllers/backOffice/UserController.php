<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\backOffice\RoleService;
use App\Services\backOffice\UserService;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;
    
    function __construct(RoleService $roleService, UserService $userService)
    {
        $this->roleService = $roleService;
        $this->userService = $userService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::get();
            return DataTables::of($users)
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-info" href="/users-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary" href="/users-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                        <button type="button" class="sa-warning btn btn-danger" data-id="'.$row->id.'">
                            <i class="fas fa-trash"></i>
                        </button>';
                // $csrf = csrf_token();
                // return '<form method="POST" action="/users-destroy/'.$row->id.'">
                //                     <input name="_token" type="hidden" value='.$csrf.'>
                //                     <input name="_method" type="hidden" value="DELETE">
                //             <a class="btn btn-info" href="/users-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                //             <a class="btn btn-primary" href="/users-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                //             <button type="submit" class="sa-warning btn btn-danger">
                //                 <i class="fas fa-trash"></i>
                //             </button>
                //         </form>';
                })
                ->editColumn('info', function ($row) {
                    return substr($row->info,0,15);
               })
               ->escapeColumns([])
            ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->getRoles();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {    
        $this->userService->storeUser($request);    
        return redirect()->route('users')->with('success', Lang::get('t-user-created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->findUser($id);
        $roles = $this->roleService->getRoles();
        $userRole = $this->userService->userRole($user);
        return view('users.show',compact('user','roles','userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->findUser($id);
        $roles = $this->roleService->getRoles();
        $userRole = $this->userService->userRole($user);
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->route('users')->with('success', Lang::get('t-user-updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->destroyUser($id);
        return response()->json(['error'=>Lang::get('t-user-deleted')]);
        // return redirect()->route('users')->with('error', Lang::get('t-user-deleted'));
    }

    public function editProfile($id)
    {
        $user = $this->userService->findProfile($id);
        return view('users.edit-profile',compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->back()->with('success', Lang::get('t-user-profile-updated'));
    }
}
