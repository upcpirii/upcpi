<?php

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
        if ($format == 'svg') {
            $this->writer->setRenderer(new Svg());
        } else {
            parent::format($format);
        }

        return $this;
    }
}
