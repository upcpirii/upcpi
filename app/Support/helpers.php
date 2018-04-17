<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('display_uuid')) {
    function display_uuid($uuid)
    {
//        $imageSource = "<img src='data:image/png;base64, ".base64_encode(QrCode::format('png')->size(400)->errorCorrection('H')->margin('1')->encoding('UTF-8')->generate($uuid))."'>";

//        return $imageSource;
//
        return QrCode::format('svg')->size(100)->errorCorrection('H')->margin('1')->encoding('UTF-8')->generate($uuid);
    }
}

function isActiveRoute($route, $output = 'active')
{
    if (Route::currentRouteNamed($route)) {
        return $output;
    }
}
