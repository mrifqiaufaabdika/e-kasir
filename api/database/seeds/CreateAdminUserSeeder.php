<?php

use App\Models\Base\KeyGen;
use App\Models\Base\Role;
use App\Models\Base\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domain = 'carwashandcoffeshop.com';
        /**
         * BUAT ROLE SUPER ADMIN
         */
        $create_user = User::create([
            'id' => KeyGen::randomKey(),
            'name' => 'Super Admin',
            'email' => 'superadmin@'.$domain,
            'password' => password_hash('adm@123', PASSWORD_BCRYPT)
        ]);

        /** @var User $user */
        $user = User::where('email', 'superadmin@'.$domain)->first();

        /** @var Role $superadmin */
        $superadmin = Role::create(['name' => 'Super Admin']);
        // atur permission yang akan diberikan
        $permissions = Permission::pluck('id', 'id')->all();
        // sinkronisasi role + permission
        $superadmin->syncPermissions($permissions);
        // berikan akses ke user
        $user->assignRole([$superadmin->id]);






        //create role kasir
        /** @var Role $supervisior */
        $kasir = Role::create(['name' => 'Kasir']);

        $permissions_kasir = Permission::whereIn('name',[
                "pegawai-list",
                "produk-list",
                "produk-edit",
                "pelanggan-create",
                "pelanggan-edit",
                "transaksi-list",
                "transaksi-edit",
                "transaksi-delete",
                "kasir",
                "home"
            ]
        )->pluck('id','id')->all();
        $kasir->syncPermissions($permissions_kasir);


    }
}
