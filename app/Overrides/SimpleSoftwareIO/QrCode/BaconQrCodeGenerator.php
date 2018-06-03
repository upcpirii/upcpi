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

namespace UPCEngineering\Overrides\SimpleSoftwareIO\QrCode;

use BaconQrCode\Renderer\Image\RendererInterface;
use BaconQrCode\Writer;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator as Generator;
use UPCEngineering\Overrides\BaconQrCode\Renderer\Image\Svg;

class BaconQrCodeGenerator extends Generator
{
    /**
     * BaconQrCodeGenerator constructor.
     *
     * @param Writer|null            $writer
     * @param RendererInterface|null $format
     */
    public function __construct(Writer $writer = null, RendererInterface $format = null)
    {
        $format = $format ?: new Svg();
        $this->writer = $writer ?: new Writer($format);
    }

    /**
     * Switches the format of the outputted QrCode or defaults to SVG.
     *
     * @param string $format The desired format.
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function format($format)
    {
        switch ($format) {
            case 'svg':
                $this->writer->setRenderer(new Svg());
                break;
            default:
                parent::format($format);
        }

        return $this;
    }
}
