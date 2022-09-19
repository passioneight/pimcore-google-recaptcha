<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Decoder;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface TokenDecoderInterface
{
    /**
     * @param string $token
     * @return ResponseInterface
     */
    public function decodeToken(string $token): ResponseInterface;
}
