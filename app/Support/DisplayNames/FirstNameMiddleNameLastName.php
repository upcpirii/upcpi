<?php

namespace UPCEngineering\Support\DisplayNames;

class FirstNameMiddleNameLastName extends BaseClass
{
    /**
     * @return bool|string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        if ($this->variant == self::FNAME_MNAME_LNAME) {
            $data = array_only($this->attributes, ['first_name', 'middle_name', 'last_name']);

            if (is_null($data['middle_name'])) {
                array_pull($data, 'middle_name');
            }

            return $this->render(implode(' ', $data));
        }

        return false;
    }
}
