<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Form\Constraint;

use Passioneight\PimcoreGoogleRecaptcha\Form\Validator\GoogleRecaptchaValidator;
use Symfony\Component\Validator\Constraint;

class GoogleRecpatchaConstraint extends Constraint
{
    const ERROR_CODE_DECODE_RESPONSE = 1;
    const ERROR_CODE_BOT_DETECTED = 2;

    protected string $message = "google-recaptcha-response.invalid";

    /**
     * @inheritDoc
     */
    public function validatedBy()
    {
        return GoogleRecaptchaValidator::class;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
