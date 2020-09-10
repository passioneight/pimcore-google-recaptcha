<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Constant;

class DefaultConfigurationValue
{
    const TOKEN_DECODER_URL = 'https://www.google.com/recaptcha/api/siteverify';
    const SCORE_THRESHOLD = 0.5;
    const DEFAULT_ACTION = "default";
}
