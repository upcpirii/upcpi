<?php

namespace UPCEngineering\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use UPCEngineering\Eloquent\User;
use UPCEngineering\Test;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return RedirectResponse
     */
    public function index() : RedirectResponse
    {
//        (new Test())->sendVerificationCodeTo(User::find(1));

        return redirect()->route('member.index');
    }
}
