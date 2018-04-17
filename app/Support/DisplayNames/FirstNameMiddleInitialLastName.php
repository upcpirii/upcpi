<?php

namespace UPCEngineering\Support\DisplayNames;

class FirstNameMiddleInitialLastName extends BaseClass
{
    /**
     * @return bool|string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        if ($this->variant == self::FNAME_MINITIAL_LNAME) {
            if ($this->middleInitial) {
                return $this->render(implode(' ', [$this->attributes['first_name'], $this->middleInitial, $this->attributes['last_name']]));
            }

            return $this->render(implode(' ', [$this->attributes['first_name'], $this->attributes['last_name']]));
        }

        return false;
    }
}
