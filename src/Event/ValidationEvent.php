<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Event;

use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ValidationEvent extends GenericEvent
{
    /** @var ResponseInterface $response */
    private $response;

    /**
     * ValidationEvent constructor.
     * @param $token
     * @param array $arguments
     */
    public function __construct($token, array $arguments = [])
    {
        parent::__construct($token, $arguments);
    }

    /**
     * @return string $token
     */
    public function getToken()
    {
        return $this->getSubject();
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response): void
    {
        $this->response = $response;
    }
}
