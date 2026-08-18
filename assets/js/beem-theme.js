jQuery(document).ready(function ($) {
    const submitBtnLabelMap = {
        request: BeemThemeModalLabelRequest || 'Request',
        contact: BeemThemeModalLabelContact || 'Contact'
    };
});

(function ($) {
    const modal = document.getElementById('beem-contact-modal');
    if (!modal) {
        return;
    }

    const form = document.getElementById('beem-contact-form');
    const statusLabel = document.getElementById('beem-contact-status');
    const titleLabel = document.getElementById('beem-modal-title');
    const submitLabel = document.getElementById('beem-contact-submit-label');
    const phoneInput = document.getElementById('beem-contact-phone');
    const countryInput = document.getElementById('beem-contact-country');
    const typeInput = document.getElementById('beem-contact-type');
    const bootstrapModal = window.bootstrap ? new window.bootstrap.Modal(modal) : null;

    let itel;
    if (phoneInput && window.intlTelInput) {
        itel = window.intlTelInput(phoneInput, {
            initialCountry: BeemTheme.defaultCountry || 'sa',
            onlyCountries: BeemTheme.allowedCountries || ['sa', 'ae', 'eg'],
            nationalMode: false,
            formatOnDisplay: true,
            autoPlaceholder: 'aggressive',
            separateDialCode: true,
            dropdownContainer: document.body,
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.8/js/utils.js',
        });
    }

    document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#beem-contact-modal"]').forEach((btn) => {
        btn.addEventListener('click', function () {
            const type = this.getAttribute('data-type') || 'contact';
            const copy = BeemTheme && BeemTheme.requestText ? BeemTheme.requestText : {};
            typeInput.value = type;
            if (type === 'request') {
                titleLabel.textContent = copy.request || 'Request a demo';
                submitLabel.textContent = copy.requestSubmit || 'Submit request';
            } else {
                titleLabel.textContent = copy.contact || 'Contact us';
                submitLabel.textContent = copy.contactSubmit || 'Send message';
            }
        });
    });

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (countryInput && itel) {
                const countryData = itel.getSelectedCountryData ? itel.getSelectedCountryData() : {};
                countryInput.value = countryData.name || countryData.iso2 || '';
            }
            const data = $(form).serialize();
            statusLabel.textContent = BeemTheme.requestMessage || 'Submitting...';
            $.post(BeemTheme.ajaxUrl, data, function (response) {
                if (response && response.success) {
                    form.reset();
                    statusLabel.textContent = response.data.message;
                    setTimeout(function () {
                        statusLabel.textContent = '';
                        if (bootstrapModal) {
                            bootstrapModal.hide();
                        }
                    }, 1800);
                } else {
                    statusLabel.textContent = response && response.data && response.data.message ? response.data.message : 'Submission failed.';
                }
            }, 'json');
        });
    }
})(jQuery);
