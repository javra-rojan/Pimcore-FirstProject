<?php

namespace PIM\Bundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class PIMRelationsBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/pimrelations/js/pimcore/startup.js',
            '/bundles/pimrelations/js/pimcore/testPromptOnSave.js',
        ];
    }
}
