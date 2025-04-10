document.addEventListener("DOMContentLoaded", function () {
    const diaSelect = document.getElementById("dia");
    const mesSelect = document.getElementById("mes");

    for (let i = 1; i <= 31; i++) {
        let option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        diaSelect.appendChild(option);
    }

    const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    meses.forEach((mes, index) => {
        let option = document.createElement("option");
        option.value = index + 1;
        option.textContent = mes;
        mesSelect.appendChild(option);
    });
});