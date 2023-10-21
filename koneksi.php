<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME','kampus');
$koneksi = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,
DB_NAME);
if($koneksi == false){
die ("Gagal melakukan koneksi ke
database.".mysqli_connect_error());
}
?>