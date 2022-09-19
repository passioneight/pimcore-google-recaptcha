<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Traits;

use Passioneight\PimcoreGoogleRecaptcha\Service\Parser\ResponseParserInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait ResponseParserTrait
{
    protected ResponseParserInterface $responseParser;

    /**
     * @internal
     */
    #[Required]
    public function setResponseParser(ResponseParserInterface $responseParser): void
    {
        $this->responseParser = $responseParser;
    }
}
