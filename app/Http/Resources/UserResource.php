<?php

namespace UPCEngineering\Http\Resources;

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
            'id'            => $this->id,
            'display_name'  => $this->displayName,
            'first_name'    => $this->first_name,
            'middle_name'   => $this->middle_name,
            'last_name'     => $this->last_name,
            'prefix'        => $this->prefix,
            'suffix'        => $this->suffix,
            'email'         => $this->email,
            'last_login_at' => $this->last_login_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'member'        => new MemberResource($this->member),
        ];
    }
}
