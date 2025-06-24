document.addEventListener('DOMContentLoaded', () => {
    const reportType = document.getElementById('reportType');
    const inputField = document.getElementById('inputField');
    const form = document.getElementById("safe");

    console.log('hello')
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
        let path = "";
        switch (type) {
            case '2': // email
                inputHTML = `
                    <input type="email" name="url" class="form-control form-control-lg" placeholder="exemple@email.com" required />
                `;
                path = 'email'
                break;
            case '3': // phone
                inputHTML = `
                    <input type="tel" id="phoneInput" name="url" class="form-control form-control-lg" placeholder="06 12 34 56 78" required />
                `;
                path = 'phone'
                break;
            default: // url
                inputHTML = `
                    <input type="url" name="url" class="form-control form-control-lg" placeholder="example-url.com" required />
                `;
                path = 'url'
        }

        inputField.innerHTML = inputHTML;
        form.action = '/result/' + path;
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
