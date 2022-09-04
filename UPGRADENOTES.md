# Upgrade Notes
## 2.0.0
- Namespace changed from `Passioneight\Bundle\PimcoreGoogleRecaptchaBundle` to
`Passioneight\PimcoreGoogleRecaptcha`. Use your IDE to replace namespaces.

- Requirements changed to `pimcore/pimcore ^10.5`, which means PHP 8 is used.

- `google-recaptcha.js` is now a class. You'll have to transpile the file. For example,
you may want to use [Webpack Encore](https://github.com/symfony/webpack-encore) (see docs).

- `google-recaptcha.js` does not load Google's script by default anymore. Instead, call the `loadScript` method explicitly. 
This ensures GDPR compliance, unless you call the method without user consent.

- Added some `Trait`s to ease dependency injection of services.

## 1.0.0
No upgrade notes available, because `v1.0.0` was the first version.
