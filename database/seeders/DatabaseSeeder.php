<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Kepala Bidang',
            'username' => 'kepalabidang',
            'email' => 'kepalabidang@hotmail.com',
            'telp' => '081208120812',
            'roles' => 'kepalabidang',
            'status' => 'Aktif',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Sekretaris',
            'username' => 'sekretaris',
            'email' => 'sekretaris@hotmail.com',
            'telp' => '081208120812',
            'roles' => 'sekretaris',
            'status' => 'Aktif',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@hotmail.com',
            'telp' => '081208120812',
            'roles' => 'admin',
            'status' => 'Aktif',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Ketua P3MP',
            'username' => 'p3mp',
            'email' => 'p3mp@hotmail.com',
            'telp' => '081208120812',
            'roles' => 'p3mp',
            'status' => 'Aktif',
            'password' => bcrypt('secret'),
        ]);

        Jabatan::create([
            'name' => 'Kepala Prodi',
            'status' => 'Aktif',
        ]);
        Jabatan::create([
            'name' => 'Ketua Jurusan',
            'status' => 'Aktif',
        ]);
        Jabatan::create([
            'name' => 'Staff',
            'status' => 'Aktif',
        ]);
        Jabatan::create([
            'name' => 'Sekretaris',
            'status' => 'Aktif',
        ]);
        Jabatan::create([
            'name' => 'Bendahara',
            'status' => 'Aktif',
        ]);
        Jabatan::create([
            'name' => 'Cleaning Service',
            'status' => 'Tidak Aktif',
        ]);

        Divisi::create([
            'name' => 'Humas',
            'kode' => '001',
            'desc' => '',
            'status' => 'Aktif',
        ]);
        Divisi::create([
            'name' => 'Keagamaan',
            'kode' => '002',
            'desc' => '',
            'status' => 'Aktif',
        ]);
        Divisi::create([
            'name' => 'Minat dan Bakat',
            'kode' => '003',
            'desc' => '',
            'status' => 'Aktif',
        ]);
        Divisi::create([
            'name' => 'Media dan informasi',
            'kode' => '004',
            'desc' => '',
            'status' => 'Aktif',
        ]);
        Divisi::create([
            'name' => 'Bimbingan Pendidikan',
            'kode' => '005',
            'desc' => '',
            'status' => 'Aktif',
        ]);
    }
}
