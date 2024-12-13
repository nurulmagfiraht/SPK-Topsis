# Sistem Penilaian Kinerja Karyawan Saoenk Cobek
Sistem ini dibuat untuk membantu proses penilaian kinerja karyawan di Saoenk Cobek dengan menggunakan metode TOPSIS.

## Pembaruan Versi 2.0

### Penambahan Metode TOPSIS
- **Implementasi TOPSIS**: Menambahkan metode TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution) untuk penilaian kinerja karyawan
- **Bobot Kriteria Dinamis**: Bobot kriteria dapat disesuaikan per divisi melalui KPI
- **Perangkingan Otomatis**: Sistem dapat mengurutkan karyawan berdasarkan hasil perhitungan TOPSIS
- **Visualisasi Hasil**: Menampilkan hasil penilaian dalam bentuk tabel dan progress bar

### Fitur Sistem
- **Multi-Outlet**: Mendukung pengelolaan data untuk multiple outlet Saoenk Cobek
- **Manajemen Departemen**: Pengelolaan data departemen dan divisi
- **Manajemen KPI**: Pengaturan KPI (Key Performance Indicator) per divisi
- **Penilaian Karyawan**: Input dan edit penilaian kinerja karyawan
- **Manajemen Absensi**: Pencatatan dan monitoring kehadiran karyawan
- **Dashboard Admin**: Tampilan dashboard untuk monitoring keseluruhan sistem

### Pembaruan Teknis
- **Optimasi Database**: Struktur database yang dioptimalkan untuk performa lebih baik
- **Validasi Data**: Penambahan validasi data untuk meningkatkan akurasi input
- **Interface yang Responsif**: Tampilan yang dapat menyesuaikan dengan berbagai ukuran layar
- **Keamanan**: Peningkatan aspek keamanan sistem

### Struktur Sistem
- Manajemen User
  - Admin
  - Manager
- Manajemen Data Master
  - Data Karyawan
  - Data Departemen
  - Data Divisi
  - Data Outlet
  - Data Jabatan
- Manajemen KPI
  - Setup KPI per Divisi
  - Bobot Kriteria
- Sistem Penilaian
  - Input Penilaian
  - Perhitungan TOPSIS
  - Hasil Perangkingan
- Manajemen Absensi
  - Input Absensi
  - Rekap Absensi

### Kriteria Penilaian
1. Kehadiran Full
2. Izin
3. Alfa
4. Melaksanakan Perintah Atasan
5. Membantah Perintah Atasan
6. Kriteria Khusus Divisi
7. Kecepatan Kerja
8. Ketepatan Kerja
9. Kualitas Kerja
10. Komentar Negatif
