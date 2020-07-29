require('./bootstrap');

class FormController
{
    constructor(formId) {
        this.$form = $(formId);
        this.$responseLabel = this.$form.find('[data-role="response"]');

        this.initialize();
    }

    initialize () {
        this.$form.on('submit', this.handleSubmit.bind(this));
    }

    handleSubmit (event) {
        event.preventDefault();
        
        this.resetErrors();

        const data = this.$form.serialize();
        const url = this.$form.attr('action');

        this.postForm(url, data)
            .done(this.handleSuccess.bind(this))
            .fail(this.handleFailure.bind(this));
    }

    postForm (url, data) {
        return $.ajax({
            method: 'POST',
            url: url,
            data: data
        });
    }

    handleSuccess (_res) {
        this.$responseLabel.text('Thank you for your submission! You should receive a copy of your inquiry shortly via email.')
            .show();
    }

    handleFailure (res) {
        const response = res.responseJSON;

        if ('errors' in response) {
            $.each(response.errors, this.setValidationState.bind(this));
        } else {
            this.$responseLabel.text('Something went wrong :( please try again')
                .show();
        }
    }

    setValidationState (errorName, _errorMessage) {
        $('div[data-error="' + errorName + '"]').addClass('has-error');
    }

    resetErrors () {
        this.$form.find('div[data-role="group"]').each((_key, input) => {
            $(input).removeClass('has-error');
        });
    }
}

window.FormController = FormController;
