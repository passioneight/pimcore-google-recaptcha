# Usage
After [configuring the bundle]((/documentation/20_configuration.md)), the JavaScript needs to become aware of the bundle's
configuration. Include the following template to achieve this:

```twig
{% include '@PimcoreGoogleRecaptcha/google-recaptcha.html.twig' %}
```

> You can also pass a `nonce` parameter to the template to improve security
> (see [CSP](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src) for more information).

### Including the Script
Import the script in your main script (e.g., `app.js`) and call the `loadScript` method once you have the user's
consent to load Google reCAPTCHA:

```js
    let recaptcha = new PassioneightGoogleRecaptcha()

    // Omitted: asking for the user's permission
    let userConsent = true 

    if(userConsent) {
        recaptcha.loadScript()
    }
```

> You may want to use a custom callback when the `grecaptcha` is ready. You can pass the callback to the `loadScript`
> method, like so: `recaptcha.loadScript(() => { recaptcha.fetchRecaptchaToken(event) })`.

The script will automatically detect any form fields with the defined `querySelector` (i.e., `.google-recaptcha` by default) 
and try to find a parent form. If the user submits the form, the reCAPTCHA-token is loaded first, so it is submitted too.

> To avoid timeouts, the reCAPTCHA is executed **on click**, since Google states: _reCAPTCHA tokens expire after two
> minutes. If you're protecting an action with reCAPTCHA, make sure to call execute when the user takes the action_.

### Implementing the Form
While the script is loaded, it won't find any forms to protect just yet. You'll need to add a hidden form field, which
will be used to submit the token that was loaded from Google.

Conveniently, you can add this field as follows:
```php

namespace App\Form\Authentication;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Passioneight\PimcoreGoogleRecaptcha\Form\Field\GoogleRecaptchaField;

class RegistrationForm extends AbstractType
{
    const FIELD_GOOGLE_RECAPTCHA = "google-recaptcha";

    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // Omitted: any other fields of the form

        $builder->add(self::FIELD_GOOGLE_RECAPTCHA, GoogleRecaptchaField::class);

        $builder->add('submit', SubmitType::class, [
            'label_format' => 'form.registration.submit'
        ]);
    }
}
```

> If you want to customize the `action` that is sent to Google, add a `data-action="myCustomAction"` to the `SubmitType`.

Using the `GoogleRecaptchaField`, the token will be validated automatically, because it contains the `GoogleRecaptchaConstraint`.

### Explicit Token Validation
If you want to validate the token yourself, dispatch a `ValidationEvent`:
 ```php
    try{
        $this->eventDispacther->dispatch(new ValidationEvent($token));
    } catch (ValidationException $e) {
        // Do some error handling
    }
```

### [Next Chapter: Extending the bundle](/documentation/40_extending_the_bundle.md)
