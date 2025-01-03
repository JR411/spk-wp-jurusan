<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kriteria;
use App\Models\Peminatan;
use App\Models\SubKriteria;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'Admin',
            'password' => 'admin',
        ]);

        $sekarang = Carbon::now();

        $peminatans = [
            ['peminatan_sekolah' => 'Agama', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_sekolah' => 'IPA', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_sekolah' => 'IPS', 'created_at' => $sekarang, 'updated_at' => $sekarang],
        ];

        Peminatan::insert($peminatans);

        $jurusans = [
            ['peminatan_id' => '1', 'jurusan_nama' => 'Aqidah dan Filsafat Islam', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '1', 'jurusan_nama' => 'Ekonomi Syariah', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '1', 'jurusan_nama' => 'Hukum Keluarga Islam', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '1', 'jurusan_nama' => "Ilmu Al-Qur'an dan Tafsir", 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '1', 'jurusan_nama' => 'Pendidikan Agama Islam', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '2', 'jurusan_nama' => 'Farmasi', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '2', 'jurusan_nama' => 'Kedokteran', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '2', 'jurusan_nama' => 'Matematika', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '2', 'jurusan_nama' => 'Sistem Informasi', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '2', 'jurusan_nama' => 'Teknik Informatika', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '3', 'jurusan_nama' => 'Hubungan Internasional', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '3', 'jurusan_nama' => 'Ilmu Hukum', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '3', 'jurusan_nama' => 'Ilmu Komunikasi', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '3', 'jurusan_nama' => 'Manajemen', 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['peminatan_id' => '3', 'jurusan_nama' => 'Pendidikan Guru Sekolah Dasar', 'created_at' => $sekarang, 'updated_at' => $sekarang],
        ];

        Jurusan::insert($jurusans);

        $kriterias = [
            ['kriteria_nama' => 'Nilai Rapor', 'kriteria_bobot' => 0.2, 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['kriteria_nama' => 'Minat dan Bakat', 'kriteria_bobot' => 0.4, 'created_at' => $sekarang, 'updated_at' => $sekarang],
            ['kriteria_nama' => 'Tujuan Karir', 'kriteria_bobot' => 0.4, 'created_at' => $sekarang, 'updated_at' => $sekarang],
        ];

        Kriteria::insert($kriterias);

        // Jurusan ID 1
        $satu = Jurusan::find(1);
        $satu_satu = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_satu as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $satu->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_satu = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Studi Filsafat Klasik', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemikiran Keagamaan Modern', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Aqidah dan Teologi', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Filsafat Islam Kontemporer', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penelitian Isu Sosial-Religius', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemahaman Ajaran Tauhid', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Logika dan Etika Islam', 'bobot' => 5],
        ];

        foreach ($dua_satu as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $satu->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_satu = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Guru Pendidikan Agama Islam', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Penulis atau Editor Buku Keislaman', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Akademisi dalam Bidang Aqidah dan Filsafat', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dai atau Penceramah', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti di Lembaga Keagamaan', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Spiritual', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pemimpin Organisasi Keagamaan', 'bobot' => 5],
        ];

        foreach ($tiga_satu as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $satu->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 2
        $dua = Jurusan::find(2);
        $satu_dua = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_dua as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $dua->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_dua = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Hukum Ekonomi Syariah', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Akuntansi Syariah', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kewirausahaan Islami', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Perbankan Syariah', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Manajemen Zakat dan Wakaf', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pengelolaan Keuangan Syariah', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemasaran Produk Halal', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Analisis Kebijakan Ekonomi Islami', 'bobot' => 5],
        ];

        foreach ($dua_dua as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $dua->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_dua = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pegawai Bank Syariah', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Auditor Syariah', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Ekonomi Islam', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Entrepreneur Islami', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Akademisi Ekonomi Islam', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengelola Lembaga Keuangan Syariah', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Ekonomi Syariah', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Direktur Operasional Keuangan Islami', 'bobot' => 5],
        ];

        foreach ($tiga_dua as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $dua->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 3
        $tiga = Jurusan::find(3);
        $satu_tiga = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_tiga as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tiga->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_tiga = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Fiqih Munakahat', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Studi Peradilan Islam', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian tentang Ahwal al-Syakhsiyyah', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pengelolaan Konflik dalam Keluarga', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Studi Hukum Waris Islam', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemahaman tentang Mediasi Islami', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Fatwa dan Pengambilan Keputusan', 'bobot' => 5],
        ];

        foreach ($dua_tiga as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tiga->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_tiga = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Hakim Pengadilan Agama', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Hukum Keluarga', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Mediator dalam Konflik Keluarga', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Penulis Buku Hukum Islam', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Akademisi Bidang Hukum Islam', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti di Bidang Hukum Keluarga', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengelola Lembaga Fatwa Islami', 'bobot' => 5],
        ];

        foreach ($tiga_tiga as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tiga->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 4
        $empat = Jurusan::find(4);
        $satu_empat = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_empat as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $empat->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_empat = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Studi Bahasa Arab', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Tafsir Klasik', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => "Pemahaman Sejarah Turunnya Al-Qur'an", 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => "Metodologi Tafsir Kontemporer", 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => "Tahfidzul Qur'an", 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => "Interpretasi Tema Sosial dalam Al-Qur'an", 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => "Penelitian tentang Naskah Al-Qur'an", 'bobot' => 5],
        ];

        foreach ($dua_empat as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $empat->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_empat = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Pengajar Tafsir Al-Qur'an", 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Dai/Daiyah", 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Peneliti Tafsir Al-Qur'an", 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Konsultasi Kajian Al-Qur'an", 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Editor Naskah Al-Qur'an dan Tafsir", 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Akademisi Studi Al-Qur'an", 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Penulis Buku Tafsir", 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => "Pemimpin Lembaga Studi Islam", 'bobot' => 5],
        ];

        foreach ($tiga_empat as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $empat->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 5
        $lima = Jurusan::find(5);
        $satu_lima = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_lima as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $lima->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_lima = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Studi Keislaman', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Retorika dan dakwah', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Literasi Islam', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kajian Tafsir', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pendidikan Karakter', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Teknologi dalam Pendidikan Agama', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Ilmu Fiqh dan Hukum Islam', 'bobot' => 5],
        ];

        foreach ($dua_lima as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $lima->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_lima = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Guru Agama Islam', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengajar Pesantren', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Penyuluh Agama Islam', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konselor Islami', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Penulis Buku Islami', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dosen Studi Islam', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Islam', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Ulama atau Pemimpin Agama', 'bobot' => 5],
        ];

        foreach ($tiga_lima as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $lima->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 6
        $enam = Jurusan::find(6);
        $satu_enam = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_enam as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $enam->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_enam = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kimia Organik', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Biologi Molukuler', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Teknologi Nano di Farmasi', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Farmakokinetik', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Formulasi dan Pencampuran Obat', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Sistem Pengantaran Obat', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Fitofarmaka dan Obat Herbal', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Farmasi Klinis', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Farmasi Rumah Sakit', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penelitian Pengembangan Obat Baru', 'bobot' => 5],
        ];

        foreach ($dua_enam as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $enam->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_enam = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Apoteker Komunitas di Apotek', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Staf Produksi di Industri Farmasi', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Analisis Laboratorium Kesehatan', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Regulatory Affairs di Industri Farmasi', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Quality Control dan Quality Assurance', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Pengembangan Formulasi Obat', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Farmasi Klinis di Rumah Sakit', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Spesialis Fitofarmaka dan Produk Herbal', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dosen atau Akademisi Farmasi', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Farmasi', 'bobot' => 5],
        ];

        foreach ($tiga_enam as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $enam->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 7
        $tujuh = Jurusan::find(7);
        $satu_tujuh = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_tujuh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tujuh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_tujuh = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Biologi Sel dan Molukuler', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Anatomi Manusia', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Fisiologi', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Patalogi', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Farmakologi', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Bedah Umum', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penyakit Dalam', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pediatri', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Psikiatri', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penelitian Klinis', 'bobot' => 5],
        ];

        foreach ($dua_tujuh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tujuh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_tujuh = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Umum', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Keluarga', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Penyakit Dalam', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Bedah', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Anak', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Kandungan (Obgyn)', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti atau Akademisi Medis', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Jantung', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dokter Spesialis Onkologi', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Ahli Bedah Saraf', 'bobot' => 5],
        ];

        foreach ($tiga_tujuh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $tujuh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 8
        $delapan = Jurusan::find(8);
        $satu_delapan = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_delapan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $delapan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_delapan = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Statistika dan Probabilitas', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Matematika Diskrit', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Aljabar Linear', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kalkulus', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Teori Bilangan', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Analisis Real dan Kompleks', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Optimasi', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemodelan Matematika', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Ilmu Data dan Komputasi', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Matematika Terapan', 'bobot' => 5],
        ];

        foreach ($dua_delapan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $delapan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_delapan = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengajar Matematika', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Aktuaris', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Matematika', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Data Analyst', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Statistika', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Data Scientist', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Software Engineer', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengembang Algoritma', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Matematika Industri', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Keuangan', 'bobot' => 5],
        ];

        foreach ($tiga_delapan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $delapan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 9
        $sembilan = Jurusan::find(9);
        $satu_sembilan = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_sembilan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sembilan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_sembilan = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'User Experience (UX) Design', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Cloud Computing', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Enterprise Resource Planning (ERP)', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Software Development', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Information Security', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Data Analytics', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'IT Project Management', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'System Design', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Business Analysis', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Database Management', 'bobot' => 5],
        ];

        foreach ($dua_sembilan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sembilan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_sembilan = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'UX/UI Designer', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'ERP Consultant', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Cybersecurity Specialist', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Network Administrator', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Software Developer', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'IT Project Manager', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Business Intelligence Analyst', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Database Administrator', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'IT Consultant', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Systems Analyst', 'bobot' => 5],
        ];

        foreach ($tiga_sembilan as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sembilan->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 10
        $sepuluh = Jurusan::find(10);
        $satu_sepuluh = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_sepuluh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sepuluh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_sepuluh = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hardware Development', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Web Development', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Big Data Analytics', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Mobile App Development', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Computer Networks', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Cyber Security', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Software Development', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Artificial Intelligence (AI) dan machine learning', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Algoritma dan struktur data', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Programming', 'bobot' => 5],
        ];

        foreach ($dua_sepuluh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sepuluh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_sepuluh = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'System Administrator', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Database Administrator', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'UX/UI Designer', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'IT Project Manager', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'IT Consultant', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Cybersecurity Specialist', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Network Engineer', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'AI/ML Engineer', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Data Scientist', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Software Developer/Engineer', 'bobot' => 5],
        ];

        foreach ($tiga_sepuluh as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sepuluh->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 11
        $sebelas = Jurusan::find(11);
        $satu_sebelas = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_sebelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sebelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_sebelas = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penguasaan Dasar Bahasa Asing', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Bahasa Asing (Seperti Inggris, Prancis, Arab)', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Diplomasi dan Negosiasi', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Analisis Geopolitik', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Organisasi dan Manajemen Internasional', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Isu-isu Global (Seperti Perubahan iklim, HAM)', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kebijakan Luar Negeri', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Ekonomi Politik Internasional', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Resolusi Konflik dan Perdamaian', 'bobot' => 5],
        ];

        foreach ($dua_sebelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                    'kriteria_id' => $data['kriteria_id'],
                    'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                    'created_at' => $sekarang,
                    'updated_at' => $sekarang,
                ]
            );

            $sebelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_sebelas = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Translator atau Interpreter', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Diplomat', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Staf Organisasi Internasional (PBB, ASEAN)', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Hubungan Internasional', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Wartawan Internasional', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Akademisi/Dosen', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Spesialis Kebijakan Luar Negeri', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Aktivis Lembaga Non-Pemerintah', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pejabat Pemerintah di Bidang Hubungan Internasional', 'bobot' => 5],
        ];

        foreach ($tiga_sebelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $sebelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 12
        $duabelas = Jurusan::find(12);
        $satu_duabelas = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_duabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $duabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_duabelas = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Penguasaan Bahasa', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Logika dan Pemikiran Analitis', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Argumentasi dan Debat', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kepemimpinan', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Advokasi dan Resolusi Konflik', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hukum Perdata', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hukum Pidana', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hukum Internasional', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hak Asasi Manusia', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Hukum Tata Negara', 'bobot' => 5],
        ];

        foreach ($dua_duabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $duabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_duabelas = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Legal Officer', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Hukum', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Mediator', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Jaksa', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Hakim', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Advokat', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Notaris', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pakar Hukum Internasional', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Akademisi atau Dosen Hukum', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Aktivis Hak Asasi Manusia', 'bobot' => 5],
        ];

        foreach ($tiga_duabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $duabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 13
        $tigabelas = Jurusan::find(13);
        $satu_tigabelas = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_tigabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $tigabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_tigabelas = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Public Speaking', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Fotografi', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Copywriting', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Produksi Media', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Jurnalistik', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Media Sosial', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Manajemen Komunikasi', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Branding dan Pemasaran Digital', 'bobot' => 5],
        ];

        foreach ($dua_tigabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $tigabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_tigabelas = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Content Creator', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Fotografer Profesional', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Reporter', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Social Media Specialist', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Digital Marketer', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'TV/Radio Broadcaster', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Strategist Media Komunikasi', 'bobot' => 5],
        ];

        foreach ($tiga_tigabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $tigabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 14
        $empatbelas = Jurusan::find(14);
        $satu_empatbelas = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_empatbelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $empatbelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_empatbelas = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kepemimpinan', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Komunikasi Bisnis', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Manajemen Proyek', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pengelolaan SDM', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pemasaran Digital', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Manajemen Risiko', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pengelolaan Keuangan Internasional', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Strategi Bisnis', 'bobot' => 5],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Analisis Data Bisnis', 'bobot' => 5],
        ];

        foreach ($dua_empatbelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $empatbelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_empatbelas = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Staf Administrasi', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Manajer SDM', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Konsultan Bisnis', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Manajer Keuangan', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Enterpreneur', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Business Analyst', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Direktur Operasional', 'bobot' => 5],
        ];

        foreach ($tiga_empatbelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $empatbelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        // Jurusan ID 15
        $limabelas = Jurusan::find(15);
        $satu_limabelas = [
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '0-59', 'bobot' => 1],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '60-69', 'bobot' => 2],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '70-79', 'bobot' => 3],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '80-89', 'bobot' => 4],
            ['kriteria_id' => '1', 'sub_kriteria_nama' => '90-100', 'bobot' => 5],
        ];

        foreach ($satu_limabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $limabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $dua_limabelas = [
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Psikologi Anak', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Keterampilan Komunikasi', 'bobot' => 2],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Pedagogik', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Seni dan Kreativitas', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Inovasi Pengajaran', 'bobot' => 3],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Literasi', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Kemampuan Menulis dan Membaca', 'bobot' => 4],
            ['kriteria_id' => '2', 'sub_kriteria_nama' => 'Teknologi dalam Pendidikan', 'bobot' => 5],
        ];

        foreach ($dua_limabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $limabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }

        $tiga_limabelas = [
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Lain-lain', 'bobot' => 1],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Asisten Pengajar', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengajar Bimbel', 'bobot' => 2],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Guru SD', 'bobot' => 3],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Kepala Sekolah', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Dosen Pendidikan Guru', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pengembangan Kurikulum', 'bobot' => 4],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Peneliti Pendidikan', 'bobot' => 5],
            ['kriteria_id' => '3', 'sub_kriteria_nama' => 'Pakar Psikologi Anak', 'bobot' => 5],
        ];

        foreach ($tiga_limabelas as $data) {
            $subKriteria = SubKriteria::firstOrCreate(
                [
                'kriteria_id' => $data['kriteria_id'],
                'sub_kriteria_nama' => $data['sub_kriteria_nama'],
                'created_at' => $sekarang,
                'updated_at' => $sekarang,
            ]
            );

            $limabelas->subKriterias()->attach($subKriteria->id, ['bobot' => $data['bobot']]);
        }
    }
}
