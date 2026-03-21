async function caricaPrenotazioni() {
    try {
        const response = await fetch('path/to/get_prenotazioni.php');
        const dati = await response.json();
        
        console.log("Dati caricati via Fetch:", dati);
        // Qui gestisci la visualizzazione dei dati
    } catch (error) {
        console.error("Errore nel caricamento:", error);
    }
}

caricaPrenotazioni();