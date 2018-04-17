<?php

namespace UPCEngineering\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Ramsey\Uuid\Uuid;
use UPCEngineering\Eloquent\Family;
use UPCEngineering\Eloquent\Member;
use UPCEngineering\Exceptions\FamilyAlreadyExistsException;
use UPCEngineering\Http\Requests\FamilyRequest;
use UPCEngineering\Http\Requests\MemberRequest;

class FamilyController extends Controller
{
    /**
     * @param FamilyRequest $request
     * @return
     * @throws FamilyAlreadyExistsException
     */
    public function store(FamilyRequest $request)
    {
        $data = $request->all();

        $headMember = Member::where('first_name', $data['first_name'])->where('last_name', $data['last_name'])->first();

        if (Family::where('head', $headMember->id)->first()) {
            throw new FamilyAlreadyExistsException();
        }

        $data['head'] = $headMember->id;
        $data['name'] = implode(' ', [$data['first_name'], $data['last_name'], 'Family']);

        return Family::create($data);
    }
}
