<?php

namespace UPCEngineering\Support\DisplayNames;

class LastNameCommaFirstName extends BaseClass
{
    /**
     * @return bool|string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        if ($this->variant == self::LNAME_COMMA_FNAME) {
            return $this->render(implode(', ', [$this->attributes['last_name'], $this->attributes['first_name']]));
        }

        return false;
    }
}
