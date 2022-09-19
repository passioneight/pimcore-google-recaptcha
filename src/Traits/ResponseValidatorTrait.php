<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Traits;

use Passioneight\PimcoreGoogleRecaptcha\Service\Validator\ResponseValidatorInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait ResponseValidatorTrait
{
    protected ResponseValidatorInterface $responseValidator;

    /**
     * @internal
     */
    #[Required]
    public function setResponseValidator(ResponseValidatorInterface $responseValidator): void
    {
        $this->responseValidator = $responseValidator;
    }
}
