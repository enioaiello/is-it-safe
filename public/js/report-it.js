document.addEventListener('DOMContentLoaded', () => {
    const reportType = document.getElementById('reportType');
    const inputField = document.getElementById('inputField');

    function formatPhone(value) {
        return value
            .replace(/\D/g, '')
            .slice(0, 10)
            .replace(/(\d{2})(?=\d)/g, '$1 ')
            .trim();
    }

    function applyPhoneFormatter(input) {
        input.addEventListener('input', () => {
            input.value = formatPhone(input.value);
        });
    }

    function renderInput(type) {
        let inputHTML = '';

        switch (type) {
            case '2': // email
                inputHTML = `
                    <input type="email" name="value" class="form-control form-control-lg" placeholder="exemple@email.com" required />
                `;
                break;
            case '3': // phone
                inputHTML = `
                    <input type="tel" id="phoneInput" name="value" class="form-control form-control-lg" placeholder="06 12 34 56 78" required />
                `;
                break;
            default: // url
                inputHTML = `
                    <input type="url" name="value" class="form-control form-control-lg" placeholder="example-url.com" required />
                `;
        }

        inputField.innerHTML = inputHTML;

        if (type === '3') {
            const phoneInput = document.getElementById('phoneInput');
            applyPhoneFormatter(phoneInput);
        }
    }

    // Initial rendering
    renderInput(reportType.value);

    reportType.addEventListener('change', () => {
        renderInput(reportType.value);
    });
});
