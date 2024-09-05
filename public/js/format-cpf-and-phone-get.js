document.addEventListener("DOMContentLoaded", function () {

    const cpfCells = document.querySelectorAll("td:nth-child(2)");

    cpfCells.forEach(function (cell) {
        const cpf = cell.textContent.trim();
        if (cpf.length === 11) {
            const formattedCpf = formatCpf(cpf);
            cell.textContent = formattedCpf;
        }
    });


    const phoneCells = document.querySelectorAll("td:nth-child(5)");
    phoneCells.forEach(function (cell) {
        const phone = cell.textContent.trim();
        const formattedPhone = formatPhone(phone);
        cell.textContent = formattedPhone;
    });
});

function formatCpf(cpf) {
    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}

function formatPhone(phone) {
    return phone.replace(/(\d{2})(\d)(\d{4})(\d{4})/, "($1) $2 $3-$4");
}
