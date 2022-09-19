<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Validator;

use Passioneight\PimcoreGoogleRecaptcha\Exception\Validation\ValidationException;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface ResponseValidatorInterface
{
    /**
     * @param ResponseInterface $response
     * @throws ValidationException if the given response was not valid.
     */
    public function validate(ResponseInterface $response): void;

    /**
     * @return bool
     */
    public function isHuman(): bool;
}
