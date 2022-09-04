<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Twig\Extension;

use Passioneight\PimcoreGoogleRecaptcha\Traits\GoogleRecaptchaConfigurationTrait;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GoogleRecaptchaExtension extends AbstractExtension
{
    use GoogleRecaptchaConfigurationTrait;

    /**
     * @inheritDoc
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction("google_recaptcha_public_key", [$this->googleRecaptchaConfiguration, "getPublicKey"]),
            new TwigFunction("google_recaptcha_default_action", [$this->googleRecaptchaConfiguration, "getDefaultAction"]),
            new TwigFunction("google_recaptcha_debug", [$this, "isDebugEnabled"])
        ];
    }

    /**
     * @return int this is needed because a boolean value of false would result in no output for the JS config.
     */
    public function isDebugEnabled(): int
    {
        return (int)$this->googleRecaptchaConfiguration->isDebugEnabled();
    }
}
