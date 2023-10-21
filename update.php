<?php
include ('koneksi.php');
include ('function.php');
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style4.css">
<title>UPDATE DATA</title>
</head>
<body class="text-center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
<?php
if(!empty($_GET['id'])){
//memanggil fungsi detail data terlbeih dahulu
if(detail_data(trim($_GET['id']))){
 $row=mysqli_fetch_array($result);
}else{
 die ("Data tidak ditemukan");
}
}else{
 die("error");

}
?>
<?php
//jika ada request post maka jalankan percabangan
if($_SERVER["REQUEST_METHOD"]=="POST"){
//simpan semua nilai variabel yang akan dikirim
$var_id=trim($_POST['id']);
$nim=trim($_POST['nim']);
$nama_mahasiswa = trim($_POST['nama_mahasiswa']);
//kemudian eksekusi di function update data
if(update_data($var_id, $nim, $nama_mahasiswa)){
 echo "<h3 class='text-light'> berhasil update</h3>";
}else{
 die("Gagal update");
}
}

?>
<form action="<?php echo
htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="POST">
 
 <label class="text-light mt-4 mx-auto" for="">NAMA MAHASISWA</label>
  <br>
 <input class="text-dark" name="nama_mahasiswa" value="<?php echo
$row['nama_mahasiswa'];?>"><br>
 <label class="text-white mx-auto" for="">NIM</label><br>
 <input class="text-dark" type="text" name="nim" value="<?php echo
$row['nim'];?>"><br>
 <input type="hidden" name="id" value="<?php echo
$row['id'];?>">
<input class="btn btn-outline-danger mt-4" type="submit" name="kirim" value="Update">
 <a class='btn btn-outline-light mt-4 ms-3' href='javascript:history.back()'> Kembali </a>
</form>
</body>
</html>