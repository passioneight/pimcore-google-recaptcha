<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class PimcoreGoogleRecaptchaBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    /**
     * @inheritDoc
     */
    protected function getComposerPackageName(): string
    {
        $composerFile = __DIR__ . '/../composer.json';
        $property = "name";

        if(file_exists($composerFile)) {
            $composerConfig = file_get_contents($composerFile);
            $composerConfig = json_decode($composerConfig);
            if(property_exists($composerConfig, $property)) {
                return $composerConfig->{$property};
            }
        }

        return "";
    }
}
