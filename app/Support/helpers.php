<?php

use Hyn\Tenancy\Contracts\CurrentHostname;
use Illuminate\Support\Facades\Route;

if (!function_exists('display_uuid')) {
    function display_uuid($uuid)
    {
        return QrCode::format('svg')->size(200)->errorCorrection('H')->margin('1')->encoding('UTF-8')->generate($uuid);
    }
}

if (!function_exists('display_uuid_png')) {
    function display_uuid_png($uuid)
    {
        $qrCode = QrCode::format('png')
            ->color(26, 179, 148)
            ->size(200)
            ->errorCorrection('H')
            ->margin('1')
            ->encoding('UTF-8')
            ->merge('/public/images/logo.png', .38)
            ->generate($uuid);

        $uuid_png = base64_encode($qrCode);

        return sprintf("<img src='data:image/png;base64,%s' />", $uuid_png);
    }
}

function isActiveRoute($route, $output = 'active')
{
    if (Route::currentRouteNamed($route)) {
        return $output;
    }
}

if (!function_exists('media')) {
    function media($filename, $height)
    {
        $directory = app(\Hyn\Tenancy\Website\Directory::class);
        $imagePath = storage_path('app/tenancy/tenants/').$directory->path("media/{$filename}");

        try {
            $content = file_get_contents($imagePath);
        } catch (ErrorException $e) {
            $imagePath = public_path('/images/upc-logo-2017.png');
            $content = file_get_contents($imagePath);
        }

        $image = base64_encode($content);
        $mime  = mime_content_type($imagePath);

        return sprintf("<img src='data:%s;base64,%s' height='%s' />", $mime, $image, $height);
    }
}
