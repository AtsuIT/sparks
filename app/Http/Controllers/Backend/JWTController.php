<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\Http\Resources\LoginResource;
use App\Models\Role;

class JWTController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','refresh']]);
    }

    /**
     * Register user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:5',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
                'name' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        $role = Role::findByName('user');
        $user->syncRoles($role);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(new LoginResource(['token'=>$this->respondWithToken($token),'refresh'=>$this->refresh()]),200);
        // return  LoginResource::collection([$this->respondWithToken($token),$this->refresh(),$this->profile()]);
        // return ['login'=>$this->respondWithToken($token),'refresh'=>$this->refresh(),'userData'=>$this->profile()];
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    /**
     * Refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'accessToken' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}











    // class UserController extends Controller
    // {
    //     public function authenticate(Request $request)
    //     {
    //         $credentials = $request->only('email', 'password');

    //         try {
    //             if (! $token = JWTAuth::attempt($credentials)) {
    //                 return response()->json(['error' => 'invalid_credentials'], 400);
    //             }
    //         } catch (JWTException $e) {
    //             return response()->json(['error' => 'could_not_create_token'], 500);
    //         }

    //         return response()->json(compact('token'));
    //     }

    //     public function register(Request $request)
    //     {
    //             $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             'password' => 'required|string|min:6|confirmed',
    //         ]);

    //         if($validator->fails()){
    //                 return response()->json($validator->errors()->toJson(), 400);
    //         }

    //         $user = User::create([
    //             'name' => $request->get('name'),
    //             'email' => $request->get('email'),
    //             'password' => Hash::make($request->get('password')),
    //         ]);

    //         $token = JWTAuth::fromUser($user);

    //         return response()->json(compact('user','token'),201);
    //     }

    //     public function getAuthenticatedUser()
    //         {
    //                 try {

    //                         if (! $user = JWTAuth::parseToken()->authenticate()) {
    //                                 return response()->json(['user_not_found'], 404);
    //                         }

    //                 } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    //                         return response()->json(['token_expired'], $e->getStatusCode());

    //                 } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    //                         return response()->json(['token_invalid'], $e->getStatusCode());

    //                 } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    //                         return response()->json(['token_absent'], $e->getStatusCode());

    //                 }

    //                 return response()->json(compact('user'));
    //         }
    // }
