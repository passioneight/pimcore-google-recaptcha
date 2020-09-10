# Configuration
Once you obtained your keys (see [prerequisites](/documentation/05_prerequsites.md)), add them to the bundle as follows:

```yaml
google_recaptcha:
    public_key: '<public-key>'
    private_key: '<private-key>'
```
> If you need a different **score-threshold** for your site, you can set the corresponding config.
> 
> Have a look at the complete configuration options [here](/src/Resources/config/config.example.yml).

### [Next Chapter: Usage](/documentation/30_usage.md)