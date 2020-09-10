<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Validator;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Configuration\GoogleRecaptchaConfiguration;
use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Parser\ResponseParserInterface;

abstract class AbstractResponseValidator implements ResponseValidatorInterface
{
    /** @var ResponseParserInterface $responseParser */
    protected $responseParser;

    /** @var float $scoreThreshold */
    protected $scoreThreshold;

    /**
     * AbstractResponseValidator constructor.
     * @param ResponseParserInterface $responseParser
     * @param GoogleRecaptchaConfiguration $configuration
     */
    public function __construct(ResponseParserInterface $responseParser, GoogleRecaptchaConfiguration $configuration)
    {
        $this->responseParser = $responseParser;
        $this->scoreThreshold = $configuration->getScoreThreshold();
    }

    /**
     * @inheritDoc
     */
    public function isHuman(): bool
    {
        return $this->scoreThreshold <= $this->responseParser->getScore();
    }
}
