<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Configuration;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Constant\Configuration;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class GoogleRecaptchaConfiguration
{
    /** @var ParameterBagInterface $parameterBag */
    private $parameterBag;

    /**
     * GoogleRecaptchaConfiguration constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @return string|null
     */
    public function getPrivateKey(): ?string
    {
        return $this->getConfig()[Configuration::PRIVATE_KEY];
    }

    /**
     * @return string|null
     */
    public function getPublicKey(): ?string
    {
        return $this->getConfig()[Configuration::PUBLIC_KEY];
    }

    /**
     * @return string
     */
    public function getTokenDecoderUrl(): string
    {
        return $this->getConfig()[Configuration::TOKEN_DECODER_URL];
    }

    /**
     * @return bool
     */
    public function isDebugEnabled(): bool
    {
        return $this->getConfig()[Configuration::DEBUG];
    }

    /**
     * @return string
     */
    public function getDefaultAction(): string
    {
        return $this->getConfig()[Configuration::DEFAULT_ACTION];
    }

    /**
     * @return float
     */
    public function getScoreThreshold(): float
    {
        return $this->getConfig()[Configuration::SCORE_THRESHOLD];
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return $this->parameterBag->get(Configuration::ROOT) ?: [];
    }
}
