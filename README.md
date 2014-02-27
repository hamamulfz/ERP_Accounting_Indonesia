ERP Accounting Indonesia
========================

Repository asli disini https://github.com/peterjkambey/ERP_Accounting_Indonesia


How to install
------------------------

1. Download [composer](http://getcomposer.org/composer.phar) bila belum punya.
   Info mengenai composer lihat di http://getcomposer.org

2. Jalankan `composer install`

3. Konfigurasi database pada `protected/config/main.php`

4. Migrate database `./vendor/bin/yiic migrate` <sup>[1]</sup>


TODO
------------------------

[ ] Cari cara untuk install dan menggunakan aplikasi ini :|

[ ] Database schema tidak diketahui :|

[ ] Buang file yang tidak terlalu penting seperti `.log`

[ ] Replace library yang umum digunakan dengan menggunakan package manager

[ ] Periksa dan bersihkan semua file yang campur aduk

[ ] After investigate this application, let ask a question to myself. Should I use this application instead of create the new one? :/


***
*[Note]:*

<sup>[1]</sup> Tidak bisa jalan. Harus langsung dari folder protected? :/
