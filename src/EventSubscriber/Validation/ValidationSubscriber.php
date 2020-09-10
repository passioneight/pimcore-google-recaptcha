<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\EventSubscriber\Validation;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Event\ValidationEvent;
use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Exception\Validation\ValidationException;
use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Decoder\TokenDecoderInterface;
use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Validator\ResponseValidatorInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ValidationSubscriber implements EventSubscriberInterface
{
    /** @var TokenDecoderInterface $decoder */
    protected $decoder;

    /** @var ResponseValidatorInterface $validator */
    protected $validator;

    /**
     * ValidationSubscriber constructor.
     * @param TokenDecoderInterface $decoder
     * @param ResponseValidatorInterface $validator
     */
    public function __construct(TokenDecoderInterface $decoder, ResponseValidatorInterface $validator)
    {
        $this->decoder = $decoder;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            ValidationEvent::class => "validate"
        ];
    }

    /**
     * @param ValidationEvent $event
     * @throws ValidationException
     */
    public function validate(ValidationEvent $event)
    {
        $token = $event->getToken();

        $response = $this->decoder->decodeToken($token);
        $event->setResponse($response);

        $this->validator->validate($response);
    }
}
