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

namespace UPCEngineering\Support\DisplayNames;

class FirstNameMiddleInitial extends BaseClass
{
    /**
     * @return bool|string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        if ($this->variant == self::FNAME_MINITIAL) {
            if ($this->middleInitial) {
                return $this->render(implode(' ', [$this->attributes['first_name'], $this->middleInitial]));
            }

            return $this->render($this->attributes['first_name']);
        }

        return false;
    }
}
