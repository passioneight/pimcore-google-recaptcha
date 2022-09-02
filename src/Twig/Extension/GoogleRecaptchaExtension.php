<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Twig\Extension;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Configuration\GoogleRecaptchaConfiguration;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GoogleRecaptchaExtension extends AbstractExtension
{
    /** @var GoogleRecaptchaConfiguration $configuration */
    private $configuration;

    /**
     * GoogleRecaptchaExtension constructor.
     * @param GoogleRecaptchaConfiguration $configuration
     */
    public function __construct(GoogleRecaptchaConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @inheritDoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction("google_recaptcha_public_key", [$this->configuration, "getPublicKey"]),
            new TwigFunction("google_recaptcha_default_action", [$this->configuration, "getDefaultAction"]),
            new TwigFunction("google_recaptcha_debug", [$this, "isDebugEnabled"])
        ];
    }

    /**
     * @return int this is needed because a boolean value of false would result in no output for the JS config..
     */
    public function isDebugEnabled(): int
    {
        return (int)$this->configuration->isDebugEnabled();
    }
}
