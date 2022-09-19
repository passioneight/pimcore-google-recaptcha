<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Validator;

use Passioneight\PimcoreGoogleRecaptcha\Traits\GoogleRecaptchaConfigurationTrait;
use Passioneight\PimcoreGoogleRecaptcha\Traits\ResponseParserTrait;

abstract class AbstractResponseValidator implements ResponseValidatorInterface
{
    use GoogleRecaptchaConfigurationTrait;
    use ResponseParserTrait;

    /**
     * @inheritDoc
     */
    public function isHuman(): bool
    {
        return $this->googleRecaptchaConfiguration->getScoreThreshold() <= $this->responseParser->getScore();
    }
}
