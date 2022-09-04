<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Validator;

use Passioneight\PimcoreGoogleRecaptcha\Exception\Validation\ValidationException;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ResponseValidator extends AbstractResponseValidator
{
    /**
     * @inheritDoc
     * @throws ValidationException containing the json-serialized response
     */
    public function validate(ResponseInterface $response): void
    {
        $this->responseParser->parse($response);

        if (!($this->responseParser->isSuccessful() && $this->isHuman())) {
            throw new ValidationException($this->responseParser->jsonSerialize());
        }
    }
}
