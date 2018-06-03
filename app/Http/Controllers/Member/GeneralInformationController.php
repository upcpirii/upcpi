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

use Illuminate\View\View;
use UPCEngineering\Eloquent\Member;
use UPCEngineering\Http\Controllers\Controller as BaseController;

class GeneralInformationController extends BaseController
{
    /**
     * @param Member $member
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Member $member) : View
    {
        $images = ['abinav_t.jpg', 'admod.jpg', 'ashleyford.jpg', 'azielsilas.jpg', 'brad_frost.jpg', 'calebogden.jpg', 'csswizardry.jpg', 'dancounsell.jpg', 'dzyngiri.jpg', 'jadlimcaco.jpg', 'jsa.jpg', 'k.jpg', 'kastov_yury.jpg', 'marcogomes.jpg', 'nckjrvs.jpg', 'rem.jpg', 'ritu.jpg', 'sauro.jpg', 'talhaconcepts.jpg', 'tonystubblebine.jpg', 'vladabazhan.jpg', 'zack415.jpg', 'zeldman.jpg', 'admod.jpg', 'ashleyford.jpg', 'azielsilas.jpg', 'brad_frost.jpg', 'calebogden.jpg', 'csswizardry.jpg', 'dancounsell.jpg', 'dzyngiri.jpg', 'jadlimcaco.jpg', 'jsa.jpg', 'k.jpg', 'kastov_yury.jpg', 'marcogomes.jpg', 'nckjrvs.jpg', 'rem.jpg', 'ritu.jpg', 'sauro.jpg', 'talhaconcepts.jpg', 'tonystubblebine.jpg', 'vladabazhan.jpg', 'zack415.jpg', 'zeldman.jpg'];

        $image = $images[rand(0, count($images) - 1)];

        return view('member.general.show', compact('member', 'image'));
    }
}
