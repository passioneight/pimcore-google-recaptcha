<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Decoder;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TokenDecoder extends AbstractTokenDecoder
{
    /**
     * @inheritDoc
     * @throws TransportExceptionInterface
     */
    public function decodeToken(string $token)
    {
        $tokenDecoderUrl = $this->getTokenDecoderUrl();
        $this->decodedResponse = HttpClient::create()->request('POST', $tokenDecoderUrl, $this->getRequestBody($token));
        return $this->getDecodedResponse();
    }
}
