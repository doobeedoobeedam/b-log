# Blog App

Ini aplikasi bikinnya pake niat untuk nuntasin belajar laravel, dengan tetep mempertimbangkan tampilan supaya ketjeh, alhasil pengerjaannya jadi lama di tampilan.

## Daftar isi

- [Teknologi yang digunakan](#teknologi-yang-digunakan)
- [Panduan install](#panduan-install)
- [Database](#database)
- [Screenshots](#screenshots)

## Teknologi yang digunakan

- **[PHP >= 8.0 ](https://www.php.net/)** - Bahasa yang dipake
- **[Laravel >= 9.0](https://laravel.com/docs/9.x)** - Framework PHP
- **[Bootstrap 5](https://getbootstrap.com/)** - Framework CSS
- **[FontAwesome](https://fontawesome.com/)** - Ikon-ikon yang digunakan
- **[VSCode](https://code.visualstudio.com/)** - Text editor
- **[Faker](https://fakerphp.github.io/)** - Untuk bikin data palsu
- **[Trix Editor](https://trix-editor.org/)** - Untuk bikin text editor

## Screenshots

![home](./.pict/index.png)

I hope you will await another pictures 😊😊😊

## Panduan install

### Clone repo
    git clone https://github.com/doobeedoobeedam/b-log.git

### Switch ke folder repo

    cd b-log

### Install semua dependencies pakai composer

    composer install

### Copy file **.env.example** dan atur konfigurasi yang diperlukan di file **.env**

    cp .env.example .env

### Generate application key baru

    php artisan key:generate

### Jalanin migration dan seeder

    php artisan migrate --seed

### Jalanin local development server

    php artisan serve

## Database

Masih dikembangkan :>