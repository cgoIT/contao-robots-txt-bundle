<?php

declare(strict_types=1);

/*
 * This file is part of cgoit\contao-robots-txt-bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, cgoIT
 * @author     cgoIT <https://cgo-it.de>
 * @license    LGPL-3.0-or-later
 */

namespace Cgoit\RobotsTxtBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CgoitRobotsTxtBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
