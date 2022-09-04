<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Parser;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ResponseParserInterface
{
    /**
     * @param ResponseInterface $response
     */
    public function parse(ResponseInterface $response): array;

    /**
     * @return bool
     */
    public function isSuccessful(): bool;

    /**
     * @return array
     */
    public function getParsedResponse(): array;
}
