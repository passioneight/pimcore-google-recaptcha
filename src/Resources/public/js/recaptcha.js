var googleRecaptchaScript = document.createElement('script');
googleRecaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=' + _config.googleRecaptcha.publicKey;
googleRecaptchaScript.async = false;

document.body.insertBefore(googleRecaptchaScript, document.body.lastChild);

googleRecaptchaScript.addEventListener('load', function() {
    grecaptcha.ready(function () {
        var elements = document.querySelectorAll(_config.googleRecaptcha.querySelector);

        if (elements.length > 0) {
            for (var element of elements) {
                var action = "action" in element.dataset ? element.dataset["action"] : false;
                action = action ? action : _config.googleRecaptcha.defaultAction;

                if (_config.googleRecaptcha.debug) {
                    console.debug("Executing Google Recaptcha on action:", action);
                }

                var submitButtons = element.closest('form').querySelectorAll('[type="submit"]');
                submitButtons = submitButtons ? submitButtons : [];

                for (var submitButton of submitButtons) {
                    submitButton.addEventListener('click', function(e){
                        e.preventDefault();

                        var form = e.target.closest("form");

                        grecaptcha.execute(_config.googleRecaptcha.publicKey, {action: action}).then(function (token) {
                            if (_config.googleRecaptcha.debug) {
                                console.debug("Received response for action:", action, token);
                            }

                            form.querySelector(_config.googleRecaptcha.querySelector).value = token;

                            if (form.noValidate || form.reportValidity()) {
                                var doSubmit = form.dispatchEvent(new Event('submit', {
                                    cancelable: true
                                }));
    
                                if (doSubmit) {
                                    form.submit();
                                }
                            }
                        });
                    });
                }
            }
        } else if (_config.googleRecaptcha.debug) {
            console.debug("Could not find Google Recaptcha elements for query selector '" + _config.googleRecaptcha.querySelector + "'");
        }
    });
});
