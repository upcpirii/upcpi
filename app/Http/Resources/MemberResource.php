<?php

namespace UPCEngineering\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'id'             => $this->id,
            'uuid'           => $this->uuid,
            'display_name'   => $this->displayName,
            'first_name'     => $this->first_name,
            'middle_name'    => $this->middle_name,
            'last_name'      => $this->last_name,
            'prefix'         => $this->prefix,
            'suffix'         => $this->suffix,
            'gender'         => $this->gender,
            'marital_status' => $this->marital_status,
            'salutation'     => $this->salutation,
            'nickname'       => $this->nickname,
            'status'         => strcmp($this->status, 'active') == 0 ? true : false,
            'date_of_birth'  => $this->date_of_birth,
            'personal_email' => $this->personal_email,
            'home_phone'     => $this->home_phone,
            'mobile_phone'   => $this->mobile_phone,
            'is_user'        => $this->user ? true : false,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
