<?php

namespace Passioneight\PimcoreGoogleRecaptcha\EventSubscriber\Validation;

use Passioneight\PimcoreGoogleRecaptcha\Event\ValidationEvent;
use Passioneight\PimcoreGoogleRecaptcha\Exception\Validation\ValidationException;
use Passioneight\PimcoreGoogleRecaptcha\Traits\ResponseValidatorTrait;
use Passioneight\PimcoreGoogleRecaptcha\Traits\TokenDecoderTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ValidationSubscriber implements EventSubscriberInterface
{
    use ResponseValidatorTrait;
    use TokenDecoderTrait;

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ValidationEvent::class => "validate"
        ];
    }

    /**
     * @param ValidationEvent $event
     * @throws ValidationException
     */
    public function validate(ValidationEvent $event): void
    {
        $token = $event->getToken();

        $response = $this->tokenDecoder->decodeToken($token);
        $event->setResponse($response);

        $this->responseValidator->validate($response);
    }
}
