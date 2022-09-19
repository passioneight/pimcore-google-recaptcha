<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Decoder;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class TokenDecoder extends AbstractTokenDecoder
{
    /**
     * @inheritDoc
     * @throws TransportExceptionInterface
     */
    public function decodeToken(string $token): ResponseInterface
    {
        $tokenDecoderUrl = $this->getTokenDecoderUrl();
        $this->decodedResponse = HttpClient::create()->request(Request::METHOD_POST, $tokenDecoderUrl, $this->getRequestBody($token));

        return $this->getDecodedResponse();
    }
}
