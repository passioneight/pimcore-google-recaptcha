var googleRecaptchaScript = document.createElement('script');
googleRecaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=' + _config.googleRecaptcha.publicKey;
googleRecaptchaScript.async = false;

document.body.insertBefore(googleRecaptchaScript, document.body.lastChild);

googleRecaptchaScript.addEventListener('load', function() {
    grecaptcha.ready(function () {
        var elements = document.querySelectorAll(_config.googleRecaptcha.querySelector);

        if (elements) {
            for (var element of elements) {
                var action = "action" in element.dataset ? element.dataset["action"] : false;
                action = action ? action : _config.googleRecaptcha.defaultAction;

                if (_config.googleRecaptcha.debug) {
                    console.debug("Executing Google Recaptcha on action:", action);
                }

                var form = element.closest("form");

                if(form) {
                    var submitButtons = form.querySelectorAll('[type="submit"]');
                    submitButtons = submitButtons ? submitButtons : [];

                    for (var submitButton of submitButtons) {
                        submitButton.addEventListener('click', function(e){
                            e.preventDefault();

                            grecaptcha.execute(_config.googleRecaptcha.publicKey, {action: action}).then(function (token) {
                                if (_config.googleRecaptcha.debug) {
                                    console.debug("Received response for action:", action, token);
                                }

                                element.value = token;

                                form.dispatchEvent(new Event('submit'));
                            });
                        });
                    }
                }
            }
        } else if (_config.googleRecaptcha.debug) {
            console.debug("Could not find Google Recaptcha elements for query selector '" + _config.googleRecaptcha.querySelector + "'");
        }
    });
});
