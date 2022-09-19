<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Traits;

use Passioneight\PimcoreGoogleRecaptcha\Service\Configuration\GoogleRecaptchaConfiguration;
use Symfony\Contracts\Service\Attribute\Required;

trait GoogleRecaptchaConfigurationTrait
{
    protected GoogleRecaptchaConfiguration $googleRecaptchaConfiguration;

    /**
     * @internal
     */
    #[Required]
    public function setGoogleRecaptchaConfiguration(GoogleRecaptchaConfiguration $googleRecaptchaConfiguration): void
    {
        $this->googleRecaptchaConfiguration = $googleRecaptchaConfiguration;
    }
}
