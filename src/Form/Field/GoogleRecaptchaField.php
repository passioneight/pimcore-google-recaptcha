<?php

namespace Passioneight\PimcoreGoogleRecaptcha\Form\Field;

use Passioneight\PimcoreGoogleRecaptcha\Form\Constraint\GoogleRecpatchaConstraint;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoogleRecaptchaField extends HiddenType
{
    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefault('label', false);
        $resolver->setDefault('mapped', false);
        $resolver->setDefault('attr', [
            'class' => 'google-recaptcha'
        ]);
        $resolver->setDefault('constraints', [
            // Do not add NotBlank, otherwise the browser's validation does not trigger the 'submit' event in JavaScript
            new GoogleRecpatchaConstraint()
        ]);
    }
}
