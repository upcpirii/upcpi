<?php

namespace UPCEngineering\Http\Controllers\Member;

use Illuminate\Http\RedirectResponse;
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

    /**
     * @param Member $member
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Member $member): RedirectResponse
    {
        return redirect()->route('member.general.show', compact('member'));
    }

    /**
     * @param MemberRequest $request
     *
     * @return Member
     */
    public function store(MemberRequest $request) : Member
    {
        $data = $request->all();

        $data['status'] = array_key_exists('status', $data) ? 'active' : 'inactive';
        $data['uuid'] = Uuid::uuid4()->toString();

        return Member::create($data);
    }
}
