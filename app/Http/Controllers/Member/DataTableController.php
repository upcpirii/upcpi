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

namespace UPCEngineering\Http\Controllers\Member;

use UPCEngineering\Eloquent\Member;
use UPCEngineering\Http\Controllers\Controller as BaseController;

class DataTableController extends BaseController
{
    /**
     * @throws \Exception
     *
     * @return mixed
     */
    public function index()
    {
        return datatables()->of(Member::all())->make(true);
    }
}
