# Usage
After configuring the bundle, you'll need some JavaScript in your HTML-Code.

> Note that the `recpatcha.js` only supports **V3**.

```html
<script>
    var _config = _config || {};

    _config.googleRecaptcha = {
        debug: {{ google_recaptcha_debug() }},
        publicKey: "{{ google_recaptcha_public_key() }}",
        querySelector: ".google-recaptcha",
        defaultAction: "{{ google_recaptcha_default_action() }}",
    };
</script>
<script src="{{ asset('bundles/googlerecaptcha/js/recaptcha.js') }}"></script>
```

> No need to change the JavaScript, as you can simply change the bundle's configuration to alter the `_config` variable.

Next, add a hidden form field to your form, like so:
```html
<input type="hidden" name="google-recaptcha" class="google-recaptcha" />
```

> If you want to customize the `action` that is sent to Google, add a `data-action="myCustomAction"` attribute to the form field.

The script will automatically detect any elements with the `google-recaptcha` class and try to find a parent form.
If a parent form was found, _any_ corresponding submit buttons (i.e., `<input type="submit" ...>`) will be used to trigger
Google's `grecaptcha.execute` method before the form is actually submitted.

> The reCAPTCHA is executed on each click, since Google states: _reCAPTCHA tokens expire after two minutes. If you're
> protecting an action with reCAPTCHA, make sure to call execute when the user takes the action_.

Once the [Promise](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise) resolves,
a token will be added to the hidden input field. Afterwards the form will be submitted.

Finally, you'll need to verify that the user is human. Various, extendable services are provided for this:
- `TokenDecoderInterface`
- `ResponseParserInterface`
- `ResponseValidatorInterface`

Inject both the `TokenDecoderInterface` and `ResponseValidatorInterface` into your class, which handles the form submission
and add the following code:
```php
$recaptchaToken = "theSubmittedToken"; 
$recaptchaResponse = $this->responseDecoder->decodeToken($recaptchaToken);
$this->responseValidator->validate($recaptchaResponse); // Throws an exception if invalid
```

Alternatively, you can trigger a `ValidationEvent` using Symfony's `EventDispatcherInterface`. If the token is invalid,
a `ValidationException` is thrown.

```php
try{
    $this->eventDispacther->dispatch(new ValidationEvent("theSubmittedToken"));
} catch (ValidationException $e) {
    // Do some error handling
}
```

> You may want to checkout our [Form Builder Bundle](https://github.com/passioneight/form-builder) for an even easier integration.
> You'll only have to include the JS and add a `GoogleRecaptcha` field to your form.

### [Next Chapter: Extending the bundle](/documentation/40_extending_the_bundle.md)