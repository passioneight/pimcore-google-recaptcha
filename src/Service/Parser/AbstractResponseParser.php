<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Service\Parser;

use Passioneight\PimcoreGoogleRecaptcha\Constant\ResponseKey;

abstract class AbstractResponseParser implements ResponseParserInterface, \JsonSerializable
{
    protected array $responseData;
    protected string $defaultAction;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->responseData[ResponseKey::SUCCESS] ?? false;
    }

    /**
     * @return float
     */
    public function getScore(): float
    {
        return $this->responseData[ResponseKey::SCORE] ?? 0.0;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->responseData[ResponseKey::ACTION] ?? "";
    }

    /**
     * @return array
     */
    public function getErrorCodes(): array
    {
        return $this->responseData[ResponseKey::ERROR_CODES] ?? [];
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->responseData[ResponseKey::HOSTNAME] ?? "";
    }

    /**
     * @return string|null
     */
    public function getChallengeTimestamp(): ?string
    {
        return $this->responseData[ResponseKey::CHALLENGE_TIMESTAMP] ?? null;
    }

    /**
     * @return array
     */
    public function getParsedResponse(): array
    {
        return $this->responseData;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): mixed
    {
        return json_encode($this->responseData);
    }
}
