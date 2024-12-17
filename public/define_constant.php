<?php
/** -------- DATABASE-------- */
DEFINE('DB_HOST','localhost');
DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_NAME','qltaisan');
DEFINE('DB_PREFIX','');

/** -------- CONFIG --------- **/
DEFINE('BASE_URL','http://quanlytaisan.com');//
//DEFINE('BASE_URL','http://localhost:8080');//
DEFINE('DEFAULT_LANGUAGE','vi');
DEFINE('PREFIX',MD5('DC_'));
DEFINE('COOKIE_EXPIRY',86400);
DEFINE('TIME_ZONE','Asia/Ho_Chi_Minh');
DEFINE('DEC_POINT',',');
DEFINE('THOUSANDS_SEP','.');
//DEFINE('RECAPTCHA_SITE_KEY','6LentRgqAAAAAA--7GMmNnmzB3AvA2yHc20n595i');
//DEFINE('RECAPTCHA_SECRET_KEY','6LentRgqAAAAAC6nqqB0zB_ECv0OdYd-Le1W5RF1');
DEFINE('RECAPTCHA_SITE_KEY','6LeS24IqAAAAACqd19KQjjvjyFY9espjhN4iIXbV');//
DEFINE('RECAPTCHA_SECRET_KEY','6LeS24IqAAAAAOZrb1o3VRuo4edtHVc_m3QBrZB3');//
/** Cau hinh Codeigniter4
 * 1. Chay php spark serve bao loi
 * Mo file Xampp\php\php.ini xoa dau ";" o dong extension=intl ;extension=fileinfo ;extension=gd ;extension=zip
 * 2. Tao virtualhost xampp\apache\conf\extra
 * - Them dong: LoadModule vhost_alias_module modules/mod_vhost_alias.so (file httpd.conf)
 * - Them dong:
 *      <VirtualHost *:80>
        * DocumentRoot "D:/xampp/htdocs/Codeigniter4/public"
        * ServerName quanlybaocao.local
         * <Directory D:/Soft/xampp/htdocs/QuanLyTaiSan/public>
         * DirectoryIndex index.php
         * AllowOverride All
         * Require all granted
         * </Directory>
 * </VirtualHost>
        * <VirtualHost *:80>
        * DocumentRoot "D:/xampp/htdocs"
        * ServerName localhost
        * </VirtualHost>
 *  file httpd-vhosts.conf
 * - Chinh sua trong file host may LAN
 * - Cau hinh lai folder icons trong file httpd-autoindex.conf
 *      Alias /icons/ "./icons/"
        * <Directory "./icons">
        * Options Indexes MultiViews
        * AllowOverride None
        * Require all granted
        * </Directory>
 *
 * cai dat php office
 * truoc het phai cai composer, vao thu muc chua web -> cmd
 * composer require "ext-gd:*" --ignore-platform-reqs
 * composer require "ext-fileinfo:*" --ignore-platform-reqs
 * composer require phpoffice/phpspreadsheet --ignore-platform-reqs
 *
 */