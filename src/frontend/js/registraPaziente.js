function verifica(event) {
    const alertDiv = document.getElementById("alert");
    const valore = document.getElementById("IDPaziente").value;

    console.log(valore);
    if (isNaN(valore)) {
        event.preventDefault(); // blocca l'invio automatico
        alertDiv.innerHTML = "Inserire un valore valido!";
    }
}