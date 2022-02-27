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
            'produk',
            'satuan_produk',
            'transaksi',
            'keuangan',
            'kasbon',
            'inventaris',
            'barang',
            'satuan_barang',
            'autowash',
            'coffeshop'
        ];
        $actions = [
            'list',
            'create',
            'edit',
            'delete',
        ];

        $permissions = [];
        $permissions[] = 'home';

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
