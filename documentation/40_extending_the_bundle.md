# Extending the Bundle
If, for some reason, the provided code is not sufficient, you may extend the provided services like so:

```yaml
Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Decoder\TokenDecoderInterface:
    class: AppBundle\Service\GoogleRecaptcha\Decoder\TokenDecoder

Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Parser\ResponseParserInterface:
    class: AppBundle\Service\GoogleRecaptcha\Parser\ResponseParser

Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Validator\ResponseValidatorInterface:
    class: AppBundle\Service\GoogleRecaptcha\Validator\ResponseValidator
```

> Your custom classes should extend from the provided abstract classes:
> - `Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Decoder\AbstractTokenDecoder`
> - `Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Parser\AbstractResponseParser`
> - `Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Service\Validator\AbstractResponseValidator`