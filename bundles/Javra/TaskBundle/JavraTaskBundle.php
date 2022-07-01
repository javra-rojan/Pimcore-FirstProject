<?php

namespace Javra\TaskBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class JavraTaskBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/javratask/js/pimcore/startup.js',
            '/bundles/javratask/js/pimcore/custom.js',
        ];
    }
}
