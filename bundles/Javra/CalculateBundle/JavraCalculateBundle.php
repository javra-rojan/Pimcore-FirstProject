<?php

namespace Javra\CalculateBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class JavraCalculateBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/javracalculate/js/pimcore/startup.js'
        ];
    }
}