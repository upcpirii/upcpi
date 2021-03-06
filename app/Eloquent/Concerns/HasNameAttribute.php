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

namespace UPCEngineering\Eloquent\Concerns;

use UPCEngineering\Eloquent\User;
use UPCEngineering\Support\DisplayNames\BaseClass;
use UPCEngineering\Support\DisplayNames\FirstNameLastName;
use UPCEngineering\Support\DisplayNames\FirstNameMiddleInitial;
use UPCEngineering\Support\DisplayNames\FirstNameMiddleInitialLastName;
use UPCEngineering\Support\DisplayNames\FirstNameMiddleNameLastName;
use UPCEngineering\Support\DisplayNames\LastNameCommaFirstName;

trait HasNameAttribute
{
    private $variants = [
        FirstNameLastName::class,
        LastNameCommaFirstName::class,
        FirstNameMiddleNameLastName::class,
        FirstNameMiddleInitialLastName::class,
        FirstNameMiddleInitial::class,
    ];

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getDisplayNameAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->displayName;
        }

        $chosenVariant = user_setting('app.display-name', BaseClass::FNAME_MNAME_LNAME);
        $showSalutation = user_setting('app.show-salutation', false);

        foreach ($this->variants as $variant) {
            $this->attributes['display_name'] = (new $variant($this->attributes, $chosenVariant, $showSalutation))->handle();

            if ($this->attributes['display_name']) {
                return $this->attributes['display_name'];
            }
        }

        $this->attributes['display_name'] = (new BaseClass($this->attributes))->handle();

        return $this->attributes['display_name'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getLastNameAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->last_name;
        }

        return $this->attributes['last_name'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getFirstNameAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->first_name;
        }

        return $this->attributes['first_name'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getMiddleNameAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->middle_name;
        }

        return $this->attributes['middle_name'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getPrefixAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->prefix;
        }

        return $this->attributes['prefix'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getSuffixAttribute()
    {
        if (self::class == User::class && $this->member) {
            return $this->member->suffix;
        }

        return $this->attributes['suffix'];
    }

    /**
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getEmailAttribute()
    {
        if (self::class == User::class && $this->member && $this->member->personal_email) {
            return $this->member->personal_email;
        }

        return $this->attributes['email'];
    }
}
