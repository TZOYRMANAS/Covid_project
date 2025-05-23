# 🦠 Covid\_project

## 🔖 Περιγραφή

Το **Covid\_project** είναι μια PHP εφαρμογή που συλλέγει, αποθηκεύει και προβάλλει δεδομένα για την πανδημία Covid-19 από την Ευρωπαϊκή Ένωση (ECDC). Οι πληροφορίες καλύπτουν εβδομαδιαία και ημερήσια δεδομένα για τεστ, κρούσματα και θανάτους, τα οποία αποθηκεύονται σε βάση δεδομένων MySQL.

---

## 🔍 Στόχοι του Project

* Εξαγωγή δεδομένων από ECDC σε μορφή JSON.
* Εισαγωγή των δεδομένων σε τοπική MySQL βάση (ergasia).
* Δυναμική προβολή στατιστικών ανά χώρα, εβδομάδα, και ημερομηνία.
* Ανάλυση σχέσης τεστ/θανάτων/κρούσματα.
* Εξαγωγή δεδομένων σε PDF.

---

## 📊 Βάση Δεδομένων

**Database:** `ergasia`

### 📁 Πίνακες:

#### `testing_data`

| 🔹 Πεδίο              | 🔹 Τύπος     |
| --------------------- | ------------ |
| id                    | INT (PK)     |
| country               | VARCHAR(50)  |
| week                  | VARCHAR(10)  |
| new\_cases            | INT          |
| tests\_done           | INT          |
| population            | INT          |
| testing\_rate         | FLOAT        |
| positivity\_rate      | FLOAT        |
| testing\_data\_source | VARCHAR(255) |

#### `death_data`

| 🔹 Πεδίο   | 🔹 Τύπος    |
| ---------- | ----------- |
| id         | INT (PK)    |
| country    | VARCHAR(50) |
| year       | INT         |
| month      | INT         |
| day        | INT         |
| date       | VARCHAR(10) |
| cases      | INT         |
| deaths     | INT         |
| population | INT         |

---

## 📂 Δομή Φακέλων & Αρχείων

**Root Directory:** `Covid_project/xampp/htdocs/`

### ✏️ Εισαγωγή Δεδομένων

* `import.php` – Κατεβάζει και εισάγει αυτόματα δεδομένα από ECDC
* `inserttestdataform.php` – Φόρμα χειροκίνητης εισαγωγής testing data
* `insertdeathdataform.php` – Φόρμα χειροκίνητης εισαγωγής death data

### 🌐 Προβολή Στατιστικών

* `main.php` – Κεντρική σελίδα/Πίνακας ελέγχου
* `top10weekscases.php` – Εμφανίζει τις 10 χειρότερες εβδομάδες σε αριθμό κρουσμάτων
* `deathcasesdate.php` – Θάνατοι ανά ημερομηνία
* `deathcasestests.php` – Ανάλυση σχέσης θανάτων και αριθμού τεστ
* `closecasesdeaths.php` – Σύγκριση κρουσμάτων/θανάτων ανά περίοδο
* `limitcasesdate` – Περιορισμός εμφάνισης ημερομηνιών

### 📄 PDF & Αρχεία

* `showPDF` – Προβολή PDF στατιστικών
* `download.php` – Κατέβασμα δεδομένων
* `file-functions.php` – Συναρτήσεις για χειρισμό αρχείων

### 🕺 Δοκιμαστικά Scripts

* `test.php`, `Empty.php` – Δοκιμαστικά scripts

---

## 🚀 Οδηγίες Εκτέλεσης

1. 🌐 Άνοιξε το XAMPP και ξεκίνησε MySQL & Apache.
2. 📂 Δημιούργησε βάση `ergasia` στο phpMyAdmin.
3. ⚒️ Τρέξε τα SQL scripts για δημιουργία πινάκων (δες `import.php`).
4. 📃 Άνοιξε τον browser σου και πληκτρολόγησε:

```
http://localhost/ergasia/import.php
```

5. 📈 Στη συνέχεια, επισκέψου το `main.php` για να δεις τα στατιστικά.

---

## 🎓 Τεχνολογίες

* PHP (Procedural)
* MySQL (μέσω XAMPP)
* HTML/CSS (απλό frontend)
* JSON API από ECDC

---

## 🌟 Δημιουργός

> 👤 Όνομα: \[Δημητρης Τζουρμανάς]ομαδική εργασία 
---

