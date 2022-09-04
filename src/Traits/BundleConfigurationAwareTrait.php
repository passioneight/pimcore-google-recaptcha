<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Traits;

trait BundleConfigurationAwareTrait
{
    private array $configuration;

    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * This is automatically called via the extension.
     */
    public function setConfiguration(array $configuration): void
    {
        $this->configuration = $configuration;
    }
}
