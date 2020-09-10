<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Decoder;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Configuration\GoogleRecaptchaConfiguration;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractTokenDecoder implements TokenDecoderInterface
{
    /** @var ResponseInterface $decodedResponse */
    protected $decodedResponse;

    /** @var GoogleRecaptchaConfiguration $configuration */
    protected $configuration;

    /**
     * ResponseDecoder constructor.
     * @param GoogleRecaptchaConfiguration $configuration
     */
    public function __construct(GoogleRecaptchaConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return ResponseInterface
     */
    public function getDecodedResponse(): ResponseInterface
    {
        return $this->decodedResponse;
    }

    /**
     * @return string|null
     */
    protected function getSecret(): ?string
    {
        return $this->configuration->getPrivateKey();
    }

    /**
     * @return string
     */
    protected function getTokenDecoderUrl(): string
    {
        return $this->configuration->getTokenDecoderUrl();
    }

    /**
     * @param string $token
     * @return array
     */
    protected function getRequestBody(string $token)
    {
        return [
            'body' => [
                'secret' => $this->getSecret(),
                'response' => $token
            ]
        ];
    }
}
