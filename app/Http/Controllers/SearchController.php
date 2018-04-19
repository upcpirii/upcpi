<?php

namespace UPCEngineering\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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

        if(request()->expectsJson()) {
            return $members;
        }

        return view('search.show', ['members' => $members]);
    }
}
