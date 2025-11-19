# Requirements  
[TOC]

v1.0.0 – 17/11/2025 – Giorgio Cominelli, Simone Scainelli

---

# Requirement 2 — Scenarios and Use Cases

This section describes real usage scenarios of the PsyPlatform system.  
Each scenario is associated with a use case from which functional requirements are derived.

---

## Scenario 1 — Booking a Session
**Actor:** Patient

### Use Case UC1 — Book a Session
**Flow:**
1. The patient logs into the platform.
2. Views the therapist’s availability.
3. Selects date and time.
4. Confirms the booking.

**Generated Requirements:**
- Synchronized calendar.  
- Automatic notifications.  
- Simple booking interface.

---

## Scenario 2 — Secure Messaging
**Actor:** Patient / Psychologist

### Use Case UC2 — Use the Secure Chat
**Flow:**
1. The psychologist selects a patient.
2. Opens the internal chat.
3. Sends a message or file.
4. The patient receives a notification.

**Generated Requirements:**
- End-to-end encrypted chat.  
- Push/email notifications.

---

## Scenario 3 — Writing Clinical Notes
**Actor:** Psychologist

### Use Case UC3 — Add Clinical Notes
**Flow:**
1. The psychologist opens the patient’s profile.
2. Writes the notes.
3. Saves the content.

**Generated Requirements:**
- Encrypted storage.  
- Customizable note structure.  
- Advanced search function.

---

## Scenario 4 — Online Session
**Actor:** Patient / Psychologist

### Use Case UC4 — Start a Videocall
**Flow:**
1. Both users click “Start Session”.
2. The integrated videocall opens.
3. A session timer is displayed.
4. The psychologist can take quick notes.

**Generated Requirements:**
- Stable videocall connection.  
- Built-in timer.  
- Mobile compatibility.

---

## Scenario 5 — Automatic Reminders
**Actor:** System

### Use Case UC5 — Send Reminders
**Flow:**
1. The system detects an upcoming appointment.
2. Sends a reminder 24 hours before.
3. Sends a final reminder 1 hour before.

**Generated Requirements:**
- Notification scheduling.  
- Customizable templates.

---

## Scenario 6 — Viewing Patient History
**Actor:** Psychologist

### Use Case UC6 — View Patient History
**Generated Requirements:**
- Clinical notes archive.  
- List of past sessions.  
- Internal search engine.

