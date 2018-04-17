<?php

namespace UPCEngineering\Support\DisplayNames;

class BaseClass
{
    const FNAME_LNAME          = 1;
    const LNAME_COMMA_FNAME    = 2;
    const FNAME_MNAME_LNAME    = 3;
    const FNAME_MINITIAL_LNAME = 4;
    const FNAME_MINITIAL       = 5;

    /**
     * @var array $attributes
     */
    protected $attributes;

    /**
     * @var string $middleInitial
     */
    protected $middleInitial;

    /**
     * @var int variant
     */
    protected $variant = self::FNAME_LNAME;

    /**
     * @var bool $showSalutation
     */
    protected $showSalutation = false;

    protected $arr = [];

    /**
     * BaseClass constructor.
     *
     * @param array $attributes
     * @param int   $variant
     * @param bool  $showSalutation
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function __construct(array $attributes, $variant = self::FNAME_LNAME, $showSalutation = false)
    {
        $this->variant = $variant;
        $this->attributes = $attributes;
        $this->showSalutation = $showSalutation;

        $this->middleInitial = $this->attributes['middle_name'] ? $this->attributes['middle_name'][0].'.' : '';
    }

    /**
     * Default display name variant.
     *
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function handle()
    {
        return $this->render(implode(' ', [$this->attributes['first_name'], $this->attributes['last_name']]));
    }

    /**
     * @param $name
     *
     * @return string
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function render($name)
    {
        if (!isset($this->attributes['salutation']) && array_key_exists('gender', $this->attributes)) {
            switch ($this->attributes['gender']) {
                case 'M':
                    $this->attributes['salutation'] = __('app.bro');

                    break;
                case 'F':
                    $this->attributes['salutation'] = __('app.sis');

                    break;
            }
        }

        if ($this->showSalutation && isset($this->attributes['salutation'])) {
            return implode(' ', [$this->attributes['salutation'], $name]);
        }

        return $name;
    }
}
