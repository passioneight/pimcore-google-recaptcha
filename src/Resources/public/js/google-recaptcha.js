export class GoogleRecaptcha {
    constructor(_config) {
        this._config = _config ? _config : window._config
    }

    get isDebuggingEnabled() {
        return this._config.googleRecaptcha.debug
    }

    get publicKey() {
        return this._config.googleRecaptcha.publicKey
    }

    get querySelector() {
        return this._config.googleRecaptcha.querySelector
    }

    get defaultAction() {
        return this._config.googleRecaptcha.defaultAction
    }

    loadScript(onRecaptchaReady = null) {
        this._onRecaptchaReadyCallback = onRecaptchaReady

        let recaptchaScriptTag = this._createRecaptchaScriptTag()
        document.body.insertBefore(recaptchaScriptTag, document.body.lastChild)
    }

    _createRecaptchaScriptTag() {
        let recaptchaScriptTag = document.createElement('script');

        recaptchaScriptTag.src = 'https://www.google.com/recaptcha/api.js?render=' + this.publicKey
        recaptchaScriptTag.addEventListener('load', this._onRecaptchaScriptLoaded.bind(this))

        return recaptchaScriptTag
    }

    _onRecaptchaScriptLoaded() {
        // grecaptcha is globally provided by Google
        this._grecaptcha = window.grecaptcha
        this._grecaptcha.ready((this._onRecaptchaReadyCallback ? this._onRecaptchaReadyCallback : this._onRecaptchaReady).bind(this))
    }

    _onRecaptchaReady() {
        let elements = document.querySelectorAll(this.querySelector)

        if (elements && elements.length > 0) {
            elements.forEach((element) => {
                let form = element.closest('form')

                if (form) {
                    form.addEventListener('submit', this.fetchRecaptchaToken.bind(this))
                }
            })
        } else if (this.isDebuggingEnabled) {
            console.debug("Could not find Google Recaptcha elements for query selector '" + this.querySelector + "'")
        }
    }

    fetchRecaptchaToken(event) {
        event.preventDefault()

        let form = event.target,
            submitter = event.submitter

        let action = this._getActionFromElement(submitter)

        if (this.isDebuggingEnabled) {
            console.debug("Executing Google Recaptcha on action:", action)
            console.debug("Submitter was:", submitter)
        }

        this._grecaptcha.execute(this.publicKey, {
            action: action
        }).then((token) => {
            if (this.isDebuggingEnabled) {
                console.debug("Received response for action:", action, token);
            }

            form.querySelector(this.querySelector).value = token
            form.submit()
        })
    }

    _getActionFromElement(element) {
        return element.dataset.action ? element.dataset.action : this.defaultAction
    }
}
