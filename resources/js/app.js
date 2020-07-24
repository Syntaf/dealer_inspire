require('./bootstrap');

class FormController
{
    constructor(formId) {
        this.$form = $(formId);

        this.initialize();
    }

    initialize () {
        this.$form.on('submit', this.handleSubmit.bind(this));
    }

    handleSubmit (event) {
        event.preventDefault();

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

    handleSuccess (res) {
        console.log(res.responseJSON);
    }

    handleFailure (res) {
        const response = res.responseJSON;

        if  ('errors' in response) {
            $.each(response.errors, this.setValidationState.bind(this));
        }
    }

    setValidationState (errorName, errorMessage) {
        $('.input-group[data-role="' + errorName + '"]').addClass('has-error');
    }
}

window.FormController = FormController;
