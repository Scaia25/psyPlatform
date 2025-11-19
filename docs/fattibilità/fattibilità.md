# Studio di Fattibilità – PsyPlatform  
v1.0.0 – 17/11/2025 – Giorgio Cominelli, Simone Scainelli

---

# Sommario Esecutivo

### **Descrizione sintetica del progetto**  
PsyPlatform è una piattaforma digitale che facilita la comunicazione e la gestione del percorso terapeutico tra psicologi e pazienti, offrendo strumenti sicuri, intuitivi e conformi alle normative sulla privacy.

### **Scopo principale dello studio**  
Valutare fattibilità tecnica, economica, organizzativa e di mercato della realizzazione della piattaforma.

### **Raccomandazione finale**  
**FATTIBILE CON CONDIZIONI** – Il progetto è realizzabile, ma richiede competenze avanzate in sicurezza, gestione dati sanitari e infrastrutture affidabili.

### **Investimento stimato**  
€ 8.000 – € 20.000

### **ROI atteso**  
30–60% entro 2–3 anni.

### **Rischi principali**
- Conformità GDPR e gestione dati sensibili  
- Competizione con piattaforme già affermate  
- Necessità di alta sicurezza e affidabilità  
- Complessità tecnica per videochiamate integrate  
- Adozione lenta da parte dei professionisti

---

# 1. Introduzione

### **Scopo del documento**  
Definire la fattibilità tecnologica, economica e organizzativa del progetto PsyPlatform.

### **Contesto del progetto**  
Aumento della domanda di servizi psicologici online, crescita della telemedicina e necessità di strumenti digitali per la gestione terapeutica.

### **Stakeholder coinvolti**
- Psicologi e psicoterapeuti  
- Pazienti  
- Sviluppatori e designer  
- Provider hosting/cloud  
- Enti regolatori (GDPR)

### **Attività economica**  
Attività di *servizi digitali* basata su abbonamenti SaaS.

---

# 2. Descrizione del Progetto

## 2.1 Obiettivi del Progetto

### **Obiettivi principali**
- Facilitare comunicazione sicura tra psicologo e paziente  
- Gestire agenda, sedute e promemoria  
- Archiviare documentazione clinica  
- Garantire elevata sicurezza dei dati  

### **Obiettivi secondari**
- Integrare videochiamate protette  
- Fornire analisi e statistiche sui progressi  
- Disponibilità app mobile

### **KPI di successo**
- Numero psicologi iscritti  
- Tasso di prenotazioni mensili  
- Retention a 90 giorni  
- Affidabilità del servizio (SLA > 99%)

---

## 2.2 Caratteristiche Principali

### **Funzionalità chiave**
- Prenotazione sedute  
- Messaggistica sicura  
- Videochiamate crittografate  
- Appunti clinici e storico del paziente  
- Notifiche e reminder  
- Questionari e esercizi assegnabili  
- Dashboard per psicologi

---

## 2.3 Requisiti Fondamentali

### **Tecnici**
- Backend: Java/Spring o Python/Django  
- Database cifrato (PostgreSQL/MongoDB)  
- Hosting cloud (AWS, Google Cloud, Azure)  
- Crittografia end-to-end per comunicazioni

### **Operativi**
- Supporto utenti  
- Monitoraggio 24/7  
- Aggiornamenti e manutenzione regolare

### **Normativi**
- GDPR  
- Gestione dati sanitari  
- Doppio consenso informato digitale  
- Crittografia a riposo e in transito

---

# 3. Analisi di Mercato

## 3.1 Analisi della Domanda

### **Clienti di riferimento**
- Psicologi e psicoterapeuti  
- Centri psicologici  
- Pazienti in terapia  

### **Dimensione del mercato**
Mercato telepsicologia in forte crescita (+20% annuo).

### **Tendenze**
- Aumento richiesta di psicoterapia online  
- Digitalizzazione dei servizi sanitari  
- Maggior attenzione al benessere mentale  

---

## 3.2 Analisi della Concorrenza

| Concorrente | Punti di Forza | Punti di Debolezza | Quota di Mercato |
|-------------|----------------|---------------------|------------------|
| Serenis     | Forte marketing e brand | Costi elevati | Alta |
| Unobravo    | Grande network psicologi | Poco personalizzabile | Alta |
| Theraplatform | Funzionalità complete | Interfaccia complessa | Media |

---

## 3.3 Analisi SWOT

| Forze (Strengths) | Debolezze (Weaknesses) |
|-------------------|-------------------------|
| Interfaccia semplice, esperienza fluida | Risorse limitate, nuova nel mercato |
| Opportunità (Opportunities) | Minacce (Threats) |
| Crescita telemedicina | Concorrenza già affermata |

---

## 3.4 Valore per il Cliente

### **Proposta di Valore Unica (UVP)**
Una piattaforma semplice, veloce, economica e realmente orientata alla pratica quotidiana degli psicologi.

### **Benefici**
- Risparmio di tempo  
- Maggior organizzazione  
- Comunicazione più immediata  
- Accesso rapido ai dati clinici  
- Migliore esperienza per i pazienti

---

# 4. Analisi Tecnica

## 4.1 Soluzione Tecnica Proposta
Architettura cloud, backend scalabile, frontend moderno, videochiamate tramite WebRTC e database cifrato.

---

## 4.2 Requisiti Tecnici

### **Infrastruttura**
- Cloud AWS/Azure/Google Cloud 

### **Software**
- Backend: Java/Spring (opzione consigliata)  
- Frontend: React  
- App mobile (futuro): Flutter  

### **Hardware**
- Nessun hardware locale richiesto  
- Server cloud dedicati

### **Sicurezza**
- Crittografia AES-256  
- Backup giornalieri  
- 2FA  
- Audit log  

### **Scalabilità**
- Load balancing  
- Possibile futuro passaggio a microservizi

### **Manutenzione**
- Aggiornamenti semestrali  
- Monitoraggio h24 con alert automatici

---

## 4.3 Fattibilità Tecnica

### **Tecnologie disponibili**
Ampia disponibilità di soluzioni open-source mature.

### **Competenze del team**
- Full-stack developer  
- Security engineer  
- UI/UX designer

### **Fornitori e partner**
- AWS / Google Cloud / Azure  
- Provider servizi di videochiamate WebRTC

### **Rischi tecnici**
- Instabilità videochiamate  
- Costi cloud variabili  
- Rigidità normativa

### **Prototipi e test**
Un MVP può essere realizzato in 6–8 settimane.

---

# 5. Analisi Economica Finanziaria

## 5.1 Stima dei Costi

| Categoria        | Investimento Iniziale | Costi annuali (€) |
|------------------|-----------------------|--------------------|
| Personale        | €5.000–15.000         | €3.000            |
| Hosting          | €300                  | €300              |
| Software         | €0–200                | €200              |
| Marketing        | €500–1.000            | €500              |
| Altro            | €200                  | €100              |
| **Totale**       | **€6.000–17.000**     | **€4.000**        |

---

## 5.2 Stima dei Ricavi

| Fonte di Ricavo  | Descrizione | Ricavi annuali (€) |
|------------------|-------------|--------------------|
| Abbonamenti      | Psicologi (€10–€25/mese) | €5.000–15.000 |
| Funzionalità premium | Videochiamate extra | €1.000 |
| **Totale**       |             | **€6.000–16.000** |

---

## 5.3 Indicatori di Redditività

### ROI  
30–60% entro 2–3 anni

### Payback Period  
~2 anni

### VAL/NPV  
Positivi in scenari moderati

---

## 5.4 Break-even Analysis

### **Punto di Pareggio**
Circa **40 psicologi paganti** a 15€/mese.

---

# 6. Analisi Organizzativa

## 6.1 Struttura Interna

### **Ruoli e Responsabilità**
- Project Manager  
- Full-stack developer  
- Security specialist  
- UI/UX designer  

### **Nuove figure professionali**
Supporto clienti (helpdesk).

### **Formazione**
Formazione su sicurezza e privacy.

---

## 6.2 Project Management

### Responsabile di Progetto  
Giorgio Cominelli

### Team di Progetto  
1–3 sviluppatori

### Metodologia  
Agile – Scrum

### Strumenti  
Trello, GitHub, Discord

---

# 7. Analisi dei Rischi

| Rischio                | Descrizione                   | Probabilità (1–5) |
|------------------------|-------------------------------|--------------------|
| GDPR                  | Violazione dati sensibili      | 4 |
| Tecnico               | Downtime o bug critici         | 3 |
| Adozione lenta        | Pochi psicologi che adottano   | 2 |
| Costi cloud           | Aumento imprevisto costi       | 3 |

---

# 8. Piano di Implementazione

## 8.1 Fasi del Progetto

1. **Fase 1 – Analisi**: 2 settimane  
2. **Fase 2 – Sviluppo MVP**: 4–6 settimane  
3. **Fase 3 – Testing**: 2 settimane  
4. **Fase 4 – Rilascio**: 1 settimana  

---

## 8.2 Tempistiche

### Durata Totale
**2–3 mesi**

### Milestone Principali
- Prototipo grafico  
- MVP funzionante  
- Beta testing  
- Versione 1.0 pubblica  

---

# 9. Conclusioni e Raccomandazioni

## 9.1 Sintesi della Valutazione

**Vantaggi principali**
- Domanda crescente  
- Prodotto utile e richiesto  
- Scalabile nel tempo

**Svantaggi**
- Competizione alta  
- Rigidità normativa  
- Costi iniziali da sostenere

---

## 9.2 Raccomandazione Finale
**FATTIBILE CON CONDIZIONI**, soprattutto sul rispetto delle normative GDPR e sulla sicurezza.

---

# Allegati (se richiesti)
- Diagramma di Gantt  
- Analisi costi dettagliata  
- Analisi competitor estesa  
- Mockup UI/UX  