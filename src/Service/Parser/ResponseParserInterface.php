<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Parser;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ResponseParserInterface
{
    /**
     * @param ResponseInterface $response
     */
    public function parse(ResponseInterface $response);

    /**
     * @return bool
     */
    public function isSuccessful(): bool;

    /**
     * @return array
     */
    public function getParsedResponse(): array;
}
