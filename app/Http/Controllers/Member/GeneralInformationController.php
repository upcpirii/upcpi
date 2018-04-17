<?php

namespace UPCEngineering\Http\Controllers\Member;

use UPCEngineering\Eloquent\Member;
use UPCEngineering\Http\Controllers\Controller as BaseController;

class GeneralInformationController extends BaseController
{
    public function show(Member $member)
    {
        $images = ['abinav_t.jpg', 'admod.jpg', 'ashleyford.jpg', 'azielsilas.jpg', 'brad_frost.jpg', 'calebogden.jpg', 'csswizardry.jpg', 'dancounsell.jpg', 'dzyngiri.jpg', 'jadlimcaco.jpg', 'jsa.jpg', 'k.jpg', 'kastov_yury.jpg', 'marcogomes.jpg', 'nckjrvs.jpg', 'rem.jpg', 'ritu.jpg', 'sauro.jpg', 'talhaconcepts.jpg', 'tonystubblebine.jpg', 'vladabazhan.jpg', 'zack415.jpg', 'zeldman.jpg', 'admod.jpg', 'ashleyford.jpg', 'azielsilas.jpg', 'brad_frost.jpg', 'calebogden.jpg', 'csswizardry.jpg', 'dancounsell.jpg', 'dzyngiri.jpg', 'jadlimcaco.jpg', 'jsa.jpg', 'k.jpg', 'kastov_yury.jpg', 'marcogomes.jpg', 'nckjrvs.jpg', 'rem.jpg', 'ritu.jpg', 'sauro.jpg', 'talhaconcepts.jpg', 'tonystubblebine.jpg', 'vladabazhan.jpg', 'zack415.jpg', 'zeldman.jpg'];

        $image = $images[rand(0, count($images)-1)];

        return view('member.general.show', compact('member', 'image'));
    }
}
