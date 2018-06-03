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

namespace UPCEngineering\Overrides\BaconQrCode\Renderer\Image;

use BaconQrCode\Renderer\Image\Svg as BaconQrCodeSvg;

/**
 * SVG backend.
 */
class Svg extends BaconQrCodeSvg
{
    const UPPER_LEFT = 1;
    const LOWER_LEFT = 2;
    const UPPER_RIGHT = 3;
    const LOWER_RIGHT = 4;
    const IMAGE_CENTER = 5;

    protected $scale_table = [
        100 => [
            'top'      => ['start' => 13, 'end' => 25],
            'bottom'   => ['start' => 73, 'end' => 85],
            'align'    => ['start' => 69, 'end' => 77],
            'image'    => ['start' => 35, 'end' => 63],
        ],
        200 => [
            'top'      => ['start' => 7, 'end' => 37],
            'bottom'   => ['start' => 157, 'end' => 187],
            'align'    => ['start' => 147, 'end' => 167],
            'image'    => ['start' => 62, 'end' => 132],
        ],
        300 => [
            'top'      => ['start' => 20, 'end' => 62],
            'bottom'   => ['start' => 230, 'end' => 272],
            'align'    => ['start' => 216, 'end' => 244],
            'image'    => ['start' => 97, 'end' => 195],
        ],
        400 => [
            'top'      => ['start' => 15, 'end' => 75],
            'bottom'   => ['start' => 315, 'end' => 375],
            'align'    => ['start' => 295, 'end' => 335],
            'image'    => ['start' => 125, 'end' => 265],
        ],
    ];

    /**
     * Size of svg to create.
     *
     * @var int
     */
    protected $size = 0;

    /**
     * init(): defined by RendererInterface.
     *
     * @see    ImageRendererInterface::init()
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $this->size = $this->finalWidth;
    }

    /**
     * drawBlock(): defined by RendererInterface.
     *
     * @see    ImageRendererInterface::drawBlock()
     *
     * @param int    $x
     * @param int    $y
     * @param string $colorId
     *
     * @return void
     */
    public function drawBlock($x, $y, $colorId)
    {
        // fallback to parent if size not in scale.
        if (!in_array($this->size, array_keys($this->scale_table))) {
            parent::drawBlock($x, $y, $colorId);

            return;
        }

        if ($this->position(self::UPPER_LEFT, $x, $y) || $this->position(self::LOWER_LEFT, $x, $y)
            || $this->position(self::UPPER_RIGHT, $x, $y) || $this->position(self::LOWER_RIGHT, $x, $y)) {
            $adjustment = ($this->blockSize / 2);

            parent::drawBlock($x - $adjustment, $y - $adjustment, $colorId);

            return;
        }

        if ($this->position(self::IMAGE_CENTER, $x, $y)) {

            // intentionally left blank.

            return;
        }

        $circle = $this->svg->addChild('circle');
        $circle->addAttribute('cx', $x);
        $circle->addAttribute('cy', $y);
        $circle->addAttribute('r', $this->blockSize / 2);
        $circle->addAttribute('fill', '#'.$this->colors[$colorId]);
    }

    /**
     * @param string $orientation
     * @param int    $x
     * @param int    $y
     *
     * @return bool
     */
    protected function position($orientation, $x, $y)
    {
        $scale = $this->scale_table[$this->size];

        switch ($orientation) {
            case self::UPPER_LEFT:
                return $x >= $scale['top']['start'] && $x <= $scale['top']['end'] && $y >= $scale['top']['start'] && $y <= $scale['top']['end'];
            case self::LOWER_LEFT:
                return $x >= $scale['top']['start'] && $x <= $scale['top']['end'] && $y >= $scale['bottom']['start'] && $y <= $scale['bottom']['end'];
            case self::UPPER_RIGHT:
                return $x >= $scale['bottom']['start'] && $x <= $scale['bottom']['end'] && $y >= $scale['top']['start'] && $y <= $scale['top']['end'];
            case self::LOWER_RIGHT:
                return $x >= $scale['align']['start'] && $x <= $scale['align']['end'] && $y >= $scale['align']['start'] && $y <= $scale['align']['end'];
            case self::IMAGE_CENTER:
                return $x >= $scale['image']['start'] && $x <= $scale['image']['end'] && $y >= $scale['image']['start'] && $y <= $scale['image']['end'];
            default:
                return false;
        }
    }
}
