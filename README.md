# Google Recaptcha
Google provides a useful _CAPTCHA_ that can be used to provide better security for your pages, namely [Google reCAPTCHA](https://www.google.com/recaptcha/intro/v3.html).

> Fun fact: CAPTCHA means _**C**ompletely **A**utomated **P**ublic **T**uring test to tell **C**omputers and **H**umans **A**part_.

###### Table of contents
- [Prerequisites](/documentation/05_prerequisites.md)
- [Installation](/documentation/10_installation.md)
- [Configuration](/documentation/20_configuration.md)
- [Usage](/documentation/30_usage.md)
  - [Including the Script](/documentation/30_usage.md#including-the-script)
  - [Implementing the Form](/documentation/30_usage.md#implementing-the-form)
  - [Explicit Token Validation](/documentation/30_usage.md#explicit-token-validation)
- [Extending the Bundle](/documentation/40_extending_the_bundle.md)

# When should I use this bundle?
Whenever an action in your **Pimcore**-project needs to be protected with [Google reCAPTCHA V3](https://www.google.com/recaptcha/intro/v3.html).

> V3 is the only supported version.

# Why should I use this bundle?
To protect your site against bots. For example, if your site has some kind of authentication (e.g., login, registration, ...),
you'll want to include [Google reCAPTCHA](https://www.google.com/recaptcha/intro/v3.html) into your site as this will 
increase _security_. [See Google's explanatory video for details](https://youtu.be/tbvxFW4UJdU).

> Please note that there are some **privacy concerns**, as it is said (though, not proven) that Google may collect user data
> for their own benefits - other than Google reCAPTCHA improvements.
> 
>**Beware that you are responsible for GDPR compliance.**
