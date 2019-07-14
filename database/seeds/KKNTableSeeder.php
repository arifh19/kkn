<?php

use Illuminate\Database\Seeder;
use App\Jenis;
use App\Klaster;
use App\Role;
class KKNTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = new Jenis;
        $jenis->nama = 'Pokok Tema';
        $jenis->save();

        $jenis = new Jenis;
        $jenis->nama = 'Pokok Non Tema';
        $jenis->save();

        $jenis = new Jenis;
        $jenis->nama = 'Bantu Tema';
        $jenis->save();

        $jenis = new Jenis;
        $jenis->nama = 'Bantu Non Tema';
        $jenis->save();

        $klaster = new Klaster;
        $klaster->nama = 'Saintek';
        $klaster->save();

        $klaster = new Klaster;
        $klaster->nama = 'Agro';
        $klaster->save();

        $klaster = new Klaster;
        $klaster->nama = 'Soshum';
        $klaster->save();

        $klaster = new Klaster;
        $klaster->nama = 'Medika';
        $klaster->save();

        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'Admin';
        $role->save();

        $role = new Role;
        $role->name = 'mahasiswa';
        $role->display_name = 'Mahasiswa';
        $role->save();
    }
}
