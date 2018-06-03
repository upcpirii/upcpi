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

namespace UPCEngineering;

use UPCEngineering\Eloquent\User;

class Test
{
    private const API_CODE = 'TR-ALEXI399026_1YEFI';
    private const URL = 'https://www.itexmo.com/php_api/api.php';

    public function sendTextMessage($number, $message)
    {
        $ch = curl_init();
        $postData = ['1' => $number, '2' => $message, '3' => self::API_CODE];
        $options = [
            CURLOPT_URL            => self::URL,
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => http_build_query($postData),
            CURLOPT_RETURNTRANSFER => true,
        ];
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendVerificationCodeTo(User $user)
    {
        dd($user);
        $number = $user->mobile_number;
        $message = $user->verification_code;

        $result = $this->sendTextMessage($number, $message);

        return $result;
    }

    public function sendNotificationTo(User $user)
    {
        $number = $user->mobile_number;
        $message = ''; // link to page

        $result = $this->sendTextMessage($number, $message);

        return $result;
    }

    public function generateVerificationCode()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $characters = str_split(strtoupper(substr(str_shuffle($characters), 0, 4)));
        $numbers = range(0, 9);
        shuffle($numbers);
        $numbers = array_slice($numbers, 0, 1);
        $verification_code = [];

        for ($i = 0; $i < count($characters); $i++) {
            array_push($verification_code, $characters[$i]);
        }

        array_push($verification_code, $numbers[0]);

        shuffle($verification_code);

        return implode('', array_slice($verification_code, 0, 6));
    }
}
