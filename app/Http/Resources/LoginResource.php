<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // dd($this['token']->original['user']->id),
            'accessToken' => $this['token']->original['accessToken'],
            'refreshToken' => $this['refresh']->original['accessToken'],
            'userData' => [
              'ability'=>[
                  [
                    'action'=> 'manage',
                    'subject'=> 'all',
                  ]
                ],
                'id'=>$this['token']->original['user']->id,
                'email'=>$this['token']->original['user']->email,
                'avatar'=> "require('@/assets/images/avatars/13-small.png')",
                'name'=>$this['token']->original['user']->name,
                // 'fullName'=>$this['token']->original['user']->name,
                'role'=> Auth::user()->roles->pluck('name')[0],
            ]

        ];
    }
}
