# TP8DPBO2025C1

## Janji

*Saya, **Hafsah Hamidah** dengan NIM **2311474**, mengerjakan **Tugas Praktikum 8** dalam mata kuliah **DPBO** dengan sebaik-baiknya demi keberkahan-Nya.
Saya berjanji tidak melakukan kecurangan sebagaimana yang telah dispesifikasikan. **Aamiin.***

---

## Deskripsi Program

**TP8DPBO2025C1 - Manajemen Ekskul** adalah aplikasi berbasis PHP native yang mengimplementasikan pola arsitektur **MVC (Model-View-Controller)** untuk mengelola kegiatan ekstrakurikuler di sekolah.

Aplikasi ini terdiri dari 4 modul utama:

* **Siswa**
* **Ekskul**
* **Anggota Ekskul**
* **Acara Ekskul**

---

## Fitur

1. **Manajemen Siswa (CRUD)** – Tambah, edit, hapus, dan lihat data siswa.
2. **Manajemen Ekskul (CRUD)** – Tambah, edit, hapus, dan lihat data ekstrakurikuler.
3. **Manajemen Acara Ekskul (CRUD)** – Tambah, edit, hapus, dan lihat data acara ekskul.
4. **Manajemen Anggota Ekskul (CRD)** – Tambah, hapus, dan lihat data keanggotaan siswa dalam ekskul.

---

## Struktur Folder

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

## Alur Navigasi Halaman

| Halaman           | Fungsi                                                                                                                                        |
| ----------------- | --------------------------------------------------------------------------------------------------------------------------------------------- |
| `index.php`       | Halaman utama yang menampilkan **form tambah siswa** dan **daftar siswa** dalam tabel. Bisa tambah, edit, dan hapus.                          |
| `club.php`        | Mengelola data **ekskul**: tambah ekskul baru, edit, dan hapus ekskul.                                                                     |
| `club_member.php` | Menghubungkan **siswa** ke **ekskul**. Tampilkan tabel keanggotaan dan bisa **menambah atau menghapus anggota ekskul**. Tidak ada fitur edit. |
| `club_event.php`  | Menampilkan dan mengelola **acara ekskul**: tambah acara, edit, dan hapus. Ekskul dipilih melalui dropdown.                                   |

> **Catatan:** Modul *Anggota Ekskul* tidak memiliki fitur update/edit karena relasi many-to-many cukup dimodifikasi dengan hapus dan tambah ulang.

---

## Relasi Tabel MySQL

**Database: `db_ekskul`**
![image](https://github.com/user-attachments/assets/69a887d8-db7c-4db5-a329-699c9cc21481)


* `students(id, name, nim, phone, email, join_date, gender)`
* `clubs(id, name, description, coach)`
* `club_members(student_id, club_id, join_date)` ← many-to-many
* `club_events(id, club_id, event_name, event_date, location)` ← one-to-many

---

## Komponen Sistem

### Model (`models/`)

* **DB.class.php**
  Kelas dasar untuk koneksi database menggunakan `mysqli`. Semua model lain mewarisi dari kelas ini.

* **Student.class.php**
  Mengelola data siswa.
  Metode: `getStudents()`, `getStudentById()`, `add()`, `update()`, `delete()`

* **Club.class.php**
  Mengelola data ekstrakurikuler.
  Metode: `getAll()`, `getById()`, `add()`, `update()`, `delete()`

* **ClubMember.class.php**
  Mengelola relasi siswa dan ekskul (many-to-many).
  Metode: `getAll()`, `add()`, `delete()`

* **ClubEvent.class.php**
  Mengelola data acara ekskul.
  Metode: `getAll()`, `getById()`, `add()`, `update()`, `delete()`, `getAllClubs()`

---

### View (`views/`)

* **Template.class.php**
  Engine parser HTML template. Menggunakan `replace()` dan `write()`.

* **student.view\.php**
  Menampilkan form tambah/edit siswa dan tabel daftar siswa.

* **Club.view\.php**
  Menampilkan form tambah/edit ekskul dan tabel daftar ekskul.

* **ClubMember.view\.php**
  Dropdown daftar siswa dan ekskul, serta tabel anggota ekskul.

* **ClubEvent.view\.php**
  Form tambah/edit acara ekskul (dengan dropdown ekskul) dan tabel acara.

---

### Controller (`controllers/`)

* **Student.controller.php**
  Menangani request data siswa: `index()`, `add()`, `edit()`, `update()`, `delete()`

* **Club.controller.php**
  Menangani request data ekskul: `index()`, `add()`, `edit()`, `update()`, `delete()`

* **ClubMember.controller.php**
  Menangani request data anggota ekskul: `index()`, `add()`, `delete()`
  Tidak tersedia fitur edit/update karena hanya menambah dan menghapus relasi.

* **ClubEvent.controller.php**
  Menangani request data acara ekskul: `index()`, `add()`, `edit()`, `update()`, `delete()`

---

## Dokumentasi

https://github.com/user-attachments/assets/688c7961-34e9-46de-afb6-78b50f94c391


| Halaman                      | Preview                                                  |
| ---------------------------- | -------------------------------------------------------- |
| **Manajemen Siswa**          | ![Siswa](Screenshot/Management%20Siswa.png)              |
| **Manajemen Ekskul**         | ![Ekskul](Screenshot/Management%20Ekskul.png)            |
| **Manajemen Anggota Ekskul** | ![Anggota](Screenshot/Management%20Anggota%20Ekskul.png) |
| **Manajemen Acara Ekskul**   | ![Acara](Screenshot/Management%20Acara%20Ekskul.png)     |

