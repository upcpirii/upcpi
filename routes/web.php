<?php

/*
 * This file is part of the UPCPI Software package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @version    alpha
 *
 * @author     Bertrand Kintanar <bertrand@imakintanar.com>
 * @license    BSD License (3-clause)
 * @copyright  (c) 2017-2018, UPC Engineering
 *
 * @link       https://bitbucket.org/bkintanar/upcpi
 */

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use LaravelCebu\Itexmo\Itexmo;
use UPCEngineering\Eloquent\Member;
use UPCEngineering\Eloquent\User;

Route::group(['middleware' => ['web'], 'namespace' => 'Auth'], function () {
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});

Route::get('/', function () {
    $users = User::with('member')->where('id', 1)->first();

//    return new \UPCEngineering\Http\Resources\UserResource($users);

    return redirect()->route('member.index');

    return view('home.index');
});

Route::group(['middleware' => 'auth'], function () {
    $this->get('/home', 'HomeController@index')->name('home');

    $this->group(['namespace' => 'Member'], function () {
        $this->get('/members', 'Controller@index')->name('member.index');
        $this->get('/members/data', 'DataTableController@index')->name('member.datatable.index');
        $this->get('/members/{member}', 'Controller@show')->name('member.show');
        $this->get('/members/{member}/general', 'GeneralInformationController@show')->name('member.general.show');
    });

    $this->get('search', 'SearchController@show');
});

Route::get('/user', function () {
    return new \UPCEngineering\Http\Resources\MemberCollection(Member::all()->take(10));
});

Route::get('/itexmo', function () {
    $itexmo = new Itexmo();

//    $itexmo->send('09089878856', 'Hello World!');

    return $itexmo->apiCodeStatus();
});

Route::get('/data', function () {
    $members = Member::select(DB::raw('members.id, uuid, first_name, middle_name, last_name, personal_email, home_phone, mobile_phone, date_of_birth, marital_status_id, created_at, MONTH(`date_of_birth`) as month, DAY(`date_of_birth`) as day, timestampdiff(year,date_of_birth,curdate()) as age'))->orderBy('month')->orderBy('day')->get();

    $members = $members->map(function ($item, $key) {
        return [
            'id'             => $item->id,
            'uuid'           => $item->uuid,
            'first_name'     => $item->first_name,
            'middle_name'    => $item->middle_name,
            'last_name'      => $item->last_name,
            'display_name'   => $item->display_name,
            'marital_status' => $item->marital_status,
            'personal_email' => $item->personal_email,
            'home_phone'     => $item->home_phone,
            'mobile_phone'   => $item->mobile_phone,
            'date_of_birth'  => $item->date_of_birth->toDateString(),
            'created_at'     => $item->created_at->toDateTimeString(),
            'month'          => $item->month,
            'day'            => $item->day,
            'age'            => $item->age,
        ];
    });

    foreach ($members as $member) {
        // convert month to specific name
        $monthNumber = $member['month'];
        $month = strtolower(Carbon::createFromFormat('!m', $monthNumber)->format('F'));

        $report[$month][] = $member;
    }

    return datatables()->of($members)->make(true);
});
