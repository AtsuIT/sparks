<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => '/images/_/_/_/_/',
            'company' => 'compag',
            'contact' => '5555555',
            'contry' => 'ch',
            'email' => $this->email,
            'currentPlan'=> 'company',
            'name'=>$this->name,
            'id'=>$this->id,
            'role'=>'admin',
            'status'=>'active',
            'username'=>'test'
        ];
    }
}
