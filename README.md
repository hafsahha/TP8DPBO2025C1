# TP8DPBO2025C1

## ✍️ Janji

*Saya, **Hafsah Hamidah** dengan NIM **2311474**, mengerjakan **Tugas Praktikum 8** dalam mata kuliah **DPBO** dengan sebaik-baiknya demi keberkahan-Nya.
Saya berjanji tidak melakukan kecurangan sebagaimana yang telah dispesifikasikan. **Aamiin.***

---

## 📌 Deskripsi Program

**TP8DPBO2025C1 - Manajemen Ekskul SOPA** adalah aplikasi berbasis PHP native yang mengimplementasikan pola arsitektur **MVC (Model-View-Controller)** untuk mengelola kegiatan ekstrakurikuler di sekolah.

Aplikasi ini terdiri dari 4 modul utama:

* **Siswa**
* **Ekskul**
* **Anggota Ekskul**
* **Acara Ekskul**

---

## 🚀 Fitur

| Fitur           | Deskripsi                                                         |
| --------------- | ----------------------------------------------------------------- |
| 🔄 CRUD Siswa   | Tambah, ubah, hapus, tampilkan data siswa                         |
| 🔄 CRUD Ekskul  | Kelola data ekskul: nama, deskripsi, pembina                      |
| 🔄 CRUD Anggota | Kelola hubungan siswa dan ekskul (many-to-many)                   |
| 🔄 CRUD Acara   | Kelola acara ekskul, dengan relasi ekskul (one-to-many)           |
| ✅ Prefill Edit  | Form akan otomatis terisi saat klik Edit                          |
| 🔗 Relasi       | Setiap anggota dan acara terkait ke data siswa & ekskul dengan FK |

---

## 🔧 Struktur Folder

```
TP8DPBO2025C1/
│
├── assets/
│   ├── bootstrap.min.css
│   ├── bootstrap.bundle.min.js
│   ├── jquery.min.js
│   └── popper.min.js
│
├── controllers/
│   ├── Student.controller.php
│   ├── Club.controller.php
│   ├── ClubMember.controller.php
│   └── ClubEvent.controller.php
│
├── models/
│   ├── DB.class.php
│   ├── Student.class.php
│   ├── Club.class.php
│   ├── ClubMember.class.php
│   └── ClubEvent.class.php
│
├── templates/
│   ├── index.html
│   ├── club.html
│   ├── club_member.html
│   └── club_event.html
│
├── views/
│   ├── Template.class.php
│   ├── student.view.php
│   ├── Club.view.php
│   ├── ClubMember.view.php
│   └── ClubEvent.view.php
│
├── db_ekskul.sql         ← struktur DB
├── index.php             ← halaman utama (siswa)
├── club.php              ← halaman manajemen ekskul
├── club_member.php       ← halaman anggota ekskul
├── club_event.php        ← halaman acara ekskul
└── conf.php              ← konfigurasi DB
```

---

## 🗂️ Alur Navigasi Halaman

| Halaman           | Fungsi                                                        |
| ----------------- | ------------------------------------------------------------- |
| `index.php`       | Form tambah siswa & tabel daftar siswa                        |
| `club.php`        | Form tambah/edit ekskul & tabel ekskul                        |
| `club_member.php` | Tambah anggota ke ekskul + lihat daftar relasi siswa ↔ ekskul |
| `club_event.php`  | Tambah/edit acara ekskul, relasi ke ekskul via dropdown       |

---

## 🧠 Relasi Tabel MySQL

**Database: `db_ekskul`**

* `students(id, name, nim, phone, email, join_date, gender)`
* `clubs(id, name, description, coach)`
* `club_members(student_id, club_id, join_date)` ← many-to-many
* `club_events(id, club_id, event_name, event_date, location)` ← one-to-many

---

## 📸 Dokumentasi

