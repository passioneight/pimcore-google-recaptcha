<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Traits;

use Passioneight\PimcoreGoogleRecaptcha\Service\Decoder\TokenDecoderInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait TokenDecoderTrait
{
    protected TokenDecoderInterface $tokenDecoder;

    /**
     * @internal
     */
    #[Required]
    public function setTokenDecoder(TokenDecoderInterface $tokenDecoder): void
    {
        $this->tokenDecoder = $tokenDecoder;
    }
}
