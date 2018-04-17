<?php

namespace UPCEngineering\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MemberCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'  => MemberResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
