<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Configuration;

use Passioneight\Bundle\PimcoreUtilitiesBundle\Traits\BundleConfigurationAwareTrait;
use Passioneight\PimcoreGoogleRecaptcha\Constant\Configuration;

class GoogleRecaptchaConfiguration
{
    use BundleConfigurationAwareTrait;

    public function getPrivateKey(): string
    {
        return $this->getConfiguration()[Configuration::PRIVATE_KEY];
    }

    public function getPublicKey(): string
    {
        return $this->getConfiguration()[Configuration::PUBLIC_KEY];
    }

    public function getTokenDecoderUrl(): string
    {
        return $this->getConfiguration()[Configuration::TOKEN_DECODER_URL];
    }

    public function isDebugEnabled(): bool
    {
        return $this->getConfiguration()[Configuration::DEBUG];
    }

    public function getDefaultAction(): string
    {
        return $this->getConfiguration()[Configuration::DEFAULT_ACTION];
    }

    public function getScoreThreshold(): float
    {
        return $this->getConfiguration()[Configuration::SCORE_THRESHOLD];
    }
}
