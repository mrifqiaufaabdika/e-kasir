<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = [
            'user',
            'role',
            'pegawai',
            'kategori-pegawai',
            'kategori-produk',
            'produk',
            'pelanggan',
            'satuan',
            'transaksi',
            'keuangan',
            'komisi',
            'kasbon',
            'inventaris',
            'barang',
        ];
        $actions = [
            'list',
            'create',
            'edit',
            'delete',
        ];

//        $permissions = [];
        $permissions= ['home','kasir'];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissions[] = $model . '-' . $action;
            }
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
