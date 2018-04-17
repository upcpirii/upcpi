<?php

namespace UPCEngineering\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Ramsey\Uuid\Uuid;
use UPCEngineering\Eloquent\Member;
use UPCEngineering\Http\Controllers\Controller as BaseController;
use UPCEngineering\Http\Requests\MemberRequest;

class Controller extends BaseController
{
    public function index()
    {
        return view('member.index');
    }

    public function show(Member $member)
    {
        return redirect()->route('member.general.show', compact('member'));
    }

    public function data()
    {
        return datatables()->of(Member::all())->make(true);
    }

    public function store(MemberRequest $request)
    {
        $data = $request->all();

        $data['status'] = array_key_exists('status', $data) ? 'active' : 'inactive';
        $data['uuid'] = Uuid::uuid4()->toString();

        return Member::create($data);
    }
}
