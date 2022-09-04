# Extending the Bundle
If the provided code is not sufficient for your use case, you can extend the provided services like so:

```yaml
Passioneight\PimcoreGoogleRecaptcha\Service\Decoder\TokenDecoderInterface:
    class: AppBundle\Service\GoogleRecaptcha\Decoder\TokenDecoder

Passioneight\PimcoreGoogleRecaptcha\Service\Parser\ResponseParserInterface:
    class: AppBundle\Service\GoogleRecaptcha\Parser\ResponseParser

Passioneight\PimcoreGoogleRecaptcha\Service\Validator\ResponseValidatorInterface:
    class: AppBundle\Service\GoogleRecaptcha\Validator\ResponseValidator
```

> Consider extending the following classes instead of starting from scratch:
> - `Passioneight\PimcoreGoogleRecaptcha\Service\Decoder\AbstractTokenDecoder`
> - `Passioneight\PimcoreGoogleRecaptcha\Service\Parser\AbstractResponseParser`
> - `Passioneight\PimcoreGoogleRecaptcha\Service\Validator\AbstractResponseValidator`
