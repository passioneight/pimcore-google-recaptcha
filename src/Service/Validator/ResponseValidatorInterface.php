<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Validator;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Exception\Validation\ValidationException;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface ResponseValidatorInterface
{
    /**
     * @param ResponseInterface $response
     * @throws ValidationException if the given response was not valid.
     */
    public function validate(ResponseInterface $response);

    /**
     * @return bool
     */
    public function isHuman(): bool;
}
