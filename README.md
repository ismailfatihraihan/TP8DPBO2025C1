Saya Ismail Fatih Raihan dengan NIM 2307840 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.  

# Sistem Manajemen Mahasiswa

Sistem manajemen mahasiswa berbasis MVC sederhana untuk mengelola mahasiswa, mata kuliah, dan pendaftaran mata kuliah.

## Desain Program

### Skema Database

Sistem ini menggunakan database relasional dengan tiga tabel utama:

1. **students**
   - student_id (PK)
   - nim (Nomor Induk Mahasiswa)
   - name (Nama)
   - email
   - phone (Telepon)
   - address (Alamat)
   - created_at (Tanggal Dibuat)

2. **courses**
   - course_id (PK)
   - course_code (Kode Mata Kuliah)
   - course_name (Nama Mata Kuliah)
   - credits (Jumlah SKS)
   - instructor (Dosen Pengajar)
   - created_at (Tanggal Dibuat)

3. **enrollments**
   - enrollment_id (PK)
   - student_id (FK)
   - course_id (FK)
   - enrollment_date (Tanggal Pendaftaran)
   - created_at (Tanggal Dibuat)

### Arsitektur MVC

Aplikasi ini mengikuti pola Model-View-Controller (MVC):

- **Model**: Menangani logika data dan interaksi database
  - Student.php
  - Course.php
  - Enrollment.php

- **View**: Menampilkan data kepada pengguna
  - students/ (daftar, tambah, edit, lihat)
  - courses/ (daftar, tambah, edit, lihat)
  - enrollments/ (daftar, tambah, edit, lihat)
  - layout/ (header, footer)

- **Controller**: Memproses input pengguna dan mengoordinasikan antara model dan view
  - StudentController.php
  - CourseController.php
  - EnrollmentController.php

## Alur Program

1. **Penanganan Permintaan**:
   - Semua permintaan melalui `index.php`
   - Parameter URL menentukan controller dan aksi
   - Format: `index.php?action=controller&method=action`

2. **Pemrosesan Controller**:
   - Controller menerima permintaan
   - Memproses data input
   - Berinteraksi dengan model yang sesuai

3. **Aliran Data**:
   - Model berinteraksi dengan database
   - Controller menerima data dari model
   - Controller meneruskan data ke view

4. **Respons**:
   - View merender HTML dengan data
   - Respons dikirim kembali ke pengguna

## Penggunaan Dasar

- **Lihat Data**: Navigasi ke bagian yang sesuai (mahasiswa, mata kuliah, pendaftaran)
- **Tambah Data**: Klik tombol "Tambah Baru" dan isi formulir
- **Edit Data**: Klik tombol "Edit" di samping data
- **Hapus Data**: Klik tombol "Hapus" di samping data

## Dokumentasi Video


https://github.com/user-attachments/assets/796058fe-0f13-4df1-b1dc-a5593adf5f72


