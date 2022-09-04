<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Event;

use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ValidationEvent extends GenericEvent
{
    private ResponseInterface $response;

    public function getToken(): ?string
    {
        return $this->getSubject();
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function setResponse(ResponseInterface $response): void
    {
        $this->response = $response;
    }
}
