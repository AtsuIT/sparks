<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Resources\UserResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['prepareCheckout']]);
    }

    public function index(Request $request)
    {
        $searchParams = $request->params;
        $userQuery = User::query();
        $userQuery->whereHas('roles', function($q) { $q->where('name', 'admin'); });
        $limit = Arr::get($searchParams, 'perPage', '');

        // $role = $request->role;
        $keyword = $request->q;
        // if (!empty($role)) {
        //     $userQuery->whereHas('roles', function($q) use ($role) { $q->where('name', $role); });
        // }

        if (!empty($keyword)) {
            $userQuery->where('name', 'LIKE', '%' . $keyword . '%');
            // $userQuery->orWhere('name', 'LIKE', '%' . $keyword . '%');
            $userQuery->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }
        
        return UserResource::collection($userQuery->paginate($limit));
    }
    public function customer(Request $request)
    {
        $searchParams = $request->params;
        $userQuery = User::query();
        $userQuery->whereHas('roles', function($q) { $q->where('name', 'user'); });
        $limit = Arr::get($searchParams, 'perPage', '');

        $keyword = $request->q;
        // if (!empty($role)) {
        //     $userQuery->whereHas('roles', function($q) use ($role) { $q->where('name', $role); });
        // }

        if (!empty($keyword)) {
            $userQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $userQuery->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }
        
        return UserResource::collection($userQuery->paginate($limit));
    }
    public function getUser($id)
    {
        return response()->json(['data'=>User::find($id),'code'=>200]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'user.email' => false ? 'required|email|unique:users' : 'required|email',
        ]);
        $data= $request->user;
        
        $user = User::find($data['id']);
        $user->email = $data['email'];
        $user->name = ['en'=>$data['name']['en'],'ar'=>$data['name']['ar']];
        $user->save();
        return response()->json(['data'=>$user,'code'=>200]);

    }
    public function store(Request $request)
    {
            $params = $request->all();

            $user = User::create([
                'name' => $params['item']['name'],
                'email' => $params['item']['email'],
                'password' => Hash::make($params['item']['name']),
            ]);
            $role = Role::find($params['item']['role']);
            $user->syncRoles($role);
            return response()->json(['data'=>$user,'code'=>200]);

    }

    public function BackendstoreUser(Request $request)
    {
        $params = $request->all();
        $user = User::create([
            'name' => $params['user']['fullName'],
            'email' => $params['user']['email'],
            'password' => Hash::make($params['user']['password']),
        ]);
        $role = Role::where('name',$params['user']['role'])->first();
        $user->syncRoles($role);
        return response()->json(['data'=>$user,'code'=>200]);
    }
    public function destroy(Request $request)
    {
        try {
            $user=User::where('id', $request->user)->delete();
            return response()->json(['data'=>'success', 201]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 403);
        }
    }

    public function updatewithpassword(Request $request)
    {
        try {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'email' => false ? 'required|email|unique:users' : 'required|email',
                'password' => ['required'],
                'password_confirmation' => ['same:password'],
            ]);
       
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password),
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'email'=>$request->email]);
            $user= User::find(auth()->user()->id);
            return response()->json(['data'=>new UserResource($user),'message'=>'success', 200]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 403);
        }        
   
    }
    
}
