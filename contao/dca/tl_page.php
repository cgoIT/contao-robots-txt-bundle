<?php

/*
 * This file is part of cgoit\contao-robots-txt-bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, cgoIT
 * @author     cgoIT <https://cgo-it.de>
 * @license    LGPL-3.0-or-later
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addField('useExternalRobotsConfig', 'robotsTxt', PaletteManipulator::POSITION_AFTER)
    ->applyToPalette('rootfallback', 'tl_page')
;

$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'] = array_merge(
    ['useExternalRobotsConfig'],
    $GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'],
);

$GLOBALS['TL_DCA']['tl_page']['subpalettes']['useExternalRobotsConfig'] = 'externalRobotsConfigUrl';

$GLOBALS['TL_DCA']['tl_page']['fields']['useExternalRobotsConfig'] = [
    'exclude' => true,
    'filter' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr m12'],
    'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_page']['fields']['externalRobotsConfigUrl'] = [
    'search' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 2048, 'dcaPicker' => true, 'tl_class' => 'w100'],
    'sql' => ['type' => 'text', 'length' => 2048, 'notnull' => false],
];
