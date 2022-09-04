<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Form\Validator;

use Passioneight\PimcoreGoogleRecaptcha\Event\ValidationEvent;
use Passioneight\PimcoreGoogleRecaptcha\Exception\Validation\ValidationException;
use Passioneight\PimcoreGoogleRecaptcha\Form\Constraint\GoogleRecpatchaConstraint;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Contracts\Service\Attribute\Required;

class GoogleRecaptchaValidator extends ConstraintValidator
{
    private EventDispatcherInterface $eventDispatcher;

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof GoogleRecpatchaConstraint) {
            throw new UnexpectedTypeException($constraint, GoogleRecpatchaConstraint::class);
        }

        try {
            $this->eventDispatcher->dispatch(new ValidationEvent($value));
        } catch (ValidationException $e) {
            $this->context->buildViolation($constraint->getMessage())
                ->setCode(GoogleRecpatchaConstraint::ERROR_CODE_BOT_DETECTED)
                ->setCause($e)
                ->setInvalidValue($value)
                ->addViolation();
        } catch (\Throwable $e) {
            $this->context->buildViolation($constraint->getMessage())
                ->setCode(GoogleRecpatchaConstraint::ERROR_CODE_DECODE_RESPONSE)
                ->setCause($e)
                ->addViolation();
        }
    }

    /**
     * @internal
     */
    #[Required]
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}
