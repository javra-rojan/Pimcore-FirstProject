<?php

namespace Javra\ImportFromJsonBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ImportFromJsonBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/importfromjson/js/pimcore/startup.js'
        ];
    }
}