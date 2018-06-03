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

namespace UPCEngineering\Http\Controllers;

use Illuminate\View\View;
use UPCEngineering\Eloquent\Member;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function show() : View
    {
        $search = request('q');

        $page = request()->page ?? 1;

        $members = collect(Member::search($search)->raw()['hits'])->forPage($page, 15);

        if (request()->expectsJson()) {
            return $members;
        }

        return view('search.show', compact('members'));
    }
}
