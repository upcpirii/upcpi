<?php

namespace UPCEngineering\Http\Controllers\Member;

use UPCEngineering\Eloquent\Member;
use UPCEngineering\Http\Controllers\Controller as BaseController;

class DataTableController extends BaseController
{
    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function index()
    {
        return datatables()->of(Member::all())->make(true);
    }
}
