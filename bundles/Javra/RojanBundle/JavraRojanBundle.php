<?php

namespace Javra\RojanBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class JavraRojanBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/javrarojan/js/pimcore/startup.js'
        ];
    }
}