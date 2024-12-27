<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HakAkses extends Seeder
{

    public function run(): void
    {
        //membersihkan cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions=[
            "Membuat Task",
            "Melihat Task",
            "Mengubah Task",
            "Menghapus Task"
        ];
        foreach($permissions as $nilai){
            Permission::create(["name"=>$nilai]);
        }

        $pengguna = Role::create(["name"=>"Super Admin"]);
        $pengguna -> givePermissionTo(Permission::all());

        $pengguna = Role::create(["name"=>"pengguna"]);
        $pengguna -> givePermissionTo([$permissions[1]]);
    }
}
