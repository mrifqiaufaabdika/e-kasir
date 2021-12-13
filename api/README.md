## Documentation

Membuat Migration untuk membuat tabel
```shell
php artisan make:migration CreateJenisSuratTable
```

Run Migration untuk membuat tabel
```shell
php artisan migrate --path=/database/migrations/2021_06_16_085044_create_jenis_surat_table.php
```

Membuat Model berdasarkan tabel
```shell
php artisan krlove:generate:model JenisSurat --table-name=jenis_surat
```

Membuat Controller
```shell
php artisan make:controller SuratKeluarController --resource --role=surat-keluar --title="Surat Keluar" --model=SuratKeluar --force
```

## Membuat link storage
```shell
ln -rs ./storage/app/public ./public/storage
```
