<?php

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
