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

use UPCEngineering\Eloquent\Family;
use UPCEngineering\Eloquent\Member;
use UPCEngineering\Exceptions\FamilyAlreadyExistsException;
use UPCEngineering\Http\Requests\FamilyRequest;

class FamilyController extends Controller
{
    /**
     * @param FamilyRequest $request
     *
     * @throws FamilyAlreadyExistsException
     *
     * @return Family
     */
    public function store(FamilyRequest $request): Family
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
