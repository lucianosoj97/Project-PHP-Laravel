function formatCPF(cpf) {
    cpf = cpf.replace(/\D/g, "");

    cpf = cpf.substring(0, 11);

    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

    return cpf;
}

function formatPhone(phone) {
    phone = phone.replace(/\D/g, "");

    phone = phone.substring(0, 14);

    phone = phone.replace(/(\d{2})(\d)/, "($1) $2");
    phone = phone.replace(/(\d{5})(\d{4})/, "$1-$2");

    return phone;
}

function formatFieldValues() {
    const cpfInput = document.getElementById("cpf");
    if (cpfInput) {
        cpfInput.value = formatCPF(cpfInput.value);
    }

    const phoneInput = document.getElementById("phone");
    if (phoneInput) {
        phoneInput.value = formatPhone(phoneInput.value);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    formatFieldValues();

    const cpfInput = document.getElementById("cpf");
    if (cpfInput) {
        cpfInput.addEventListener("input", function (e) {
            e.target.value = formatCPF(e.target.value);
        });
    }

    const phoneInput = document.getElementById("phone");
    if (phoneInput) {
        phoneInput.addEventListener("input", function (e) {
            e.target.value = formatPhone(e.target.value);
        });
    }
});
