<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Decoder;

use Passioneight\PimcoreGoogleRecaptcha\Traits\GoogleRecaptchaConfigurationTrait;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractTokenDecoder implements TokenDecoderInterface
{
    use GoogleRecaptchaConfigurationTrait;

    protected ResponseInterface $decodedResponse;

    public function getDecodedResponse(): ResponseInterface
    {
        return $this->decodedResponse;
    }

    protected function getSecret(): ?string
    {
        return $this->googleRecaptchaConfiguration->getPrivateKey();
    }

    protected function getTokenDecoderUrl(): string
    {
        return $this->googleRecaptchaConfiguration->getTokenDecoderUrl();
    }

    protected function getRequestBody(string $token): array
    {
        return [
            'body' => [
                'secret' => $this->getSecret(),
                'response' => $token
            ]
        ];
    }
}
