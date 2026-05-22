# Task Tracker

Aplikasi web pengelola tugas harian menggunakan PHP Native, MySQL, dan Quill JS.

## Features

- Tambah tugas
- Edit tugas
- Hapus tugas
- Update status tugas
- Rich Text Editor menggunakan Quill JS
- Auto Save Draft menggunakan Local Storage
- Draft tetap tersimpan setelah refresh halaman
- Hapus draft tanpa mempengaruhi database
- Timestamp waktu pembuatan tugas
- Timestamp waktu update tugas

---

## Technologies

- PHP Native
- MySQL
- HTML
- CSS
- JavaScript
- Quill JS

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/task-tracker.git
```

---

### 2. Pindahkan Project ke Folder Laragon

Contoh lokasi:

```txt
C:/laragon/www/task-tracker
```

---

### 3. Jalankan Laragon

Buka Laragon kemudian start:

- Apache
- MySQL

---

### 4. Buat Database

Buka phpMyAdmin melalui:

```txt
http://localhost/phpmyadmin
```

Buat database baru:

```sql
task_tracker
```

---

### 5. Import Database

Import file:

```txt
task_tracker.sql
```

---

### 6. Jalankan Aplikasi

Buka browser:

```txt
http://localhost/task-tracker
```

---

## Project Structure

```txt
task-tracker/
│
├── assets/
├── css/
├── js/
├── koneksi.php
├── index.php
├── tambah.php
├── edit.php
├── hapus.php
├── task_tracker.sql
└── README.md
```

---

## Rich Text Editor

Kolom deskripsi menggunakan Quill JS sebagai Rich Text Editor.

Data deskripsi disimpan ke database dalam format HTML sehingga format seperti:
- bold
- italic
- list

---

## Auto Save Draft Mechanism

Aplikasi menggunakan Local Storage browser untuk menyimpan draft deskripsi secara otomatis ketika pengguna mengetik.

Fitur:
- Draft tidak hilang saat halaman di-refresh
- Tombol "Hapus Draft" untuk membersihkan draft
- Draft otomatis dihapus setelah data berhasil disimpan ke database

---

## Author

Agung Ridho Artiasmoro  XI RPL 1
