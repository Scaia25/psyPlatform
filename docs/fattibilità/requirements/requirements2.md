# Requirements
[TOC]

v1.0.0 – 17/11/2025 – Giorgio Cominelli, Simone Scainelli

---

# Requirement 2 — Scenari e Casi d'Uso

Questa sezione descrive scenari reali di utilizzo della piattaforma PsyPlatform e i relativi casi d’uso da cui derivano requisiti funzionali.

---

## Scenario 1 — Prenotazione di una seduta
**Attore:** Paziente

### Caso d’Uso UC1 — Prenotare una seduta
**Flusso:**
1. Il paziente accede.
2. Visualizza le disponibilità dello psicologo.
3. Seleziona data e ora.
4. Conferma la prenotazione.

**Requisiti generati:**
- Calendario sincronizzato.  
- Notifiche automatiche.  
- Sistema di prenotazione semplice.

---

## Scenario 2 — Messaggistica sicura
**Attore:** Paziente / Psicologo

### Caso d’Uso UC2 — Utilizzare la chat interna
**Flusso:**
1. Lo psicologo seleziona un paziente.
2. Apre la chat.
3. Invia messaggio o file.
4. Il paziente riceve notifica.

**Requisiti generati:**
- Chat crittografata E2E.  
- Notifiche push/email.

---

## Scenario 3 — Scrittura delle note cliniche
**Attore:** Psicologo

### Caso d’Uso UC3 — Inserire note cliniche
**Flusso:**
1. Lo psicologo apre il profilo del paziente.
2. Scrive le note.
3. Salva i contenuti.

**Requisiti generati:**
- Archiviazione cifrata.  
- Struttura note personalizzabile.  
- Ricerca interna avanzata.

---

## Scenario 4 — Seduta online
**Attore:** Paziente / Psicologo

### Caso d’Uso UC4 — Avviare videochiamata
**Flusso:**
1. Gli utenti cliccano “Avvia sessione”.
2. Si apre la videochiamata.
3. Timer visibile.
4. Possibilità di prendere appunti.

**Requisiti generati:**
- Videochiamata stabile.  
- Timer integrato.  
- Compatibilità mobile.

---

## Scenario 5 — Promemoria automatici
**Attore:** Sistema

### Caso d’Uso UC5 — Invio dei promemoria
**Flusso:**
1. Il sistema rileva un appuntamento.
2. Invia promemoria 24 ore prima.
3. Invia promemoria finale 1 ora prima.

**Requisiti generati:**
- Scheduling notifiche.  
- Template personalizzabili.

---

## Scenario 6 — Consultazione dello storico
**Attore:** Psicologo

### Caso d’Uso UC6 — Visualizzare lo storico
**Requisiti generati:**
- Archivio note cliniche.  
- Lista sedute passate.  
- Motore di ricerca interno.
