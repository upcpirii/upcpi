<?php

namespace UPCEngineering\Support\DisplayNames;

class FirstNameLastName extends BaseClass
{
    /**
     * @return bool|string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        if ($this->variant == self::FNAME_LNAME) {
            return parent::handle();
        }

        return false;
    }
}
