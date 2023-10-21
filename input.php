<?php
include ('koneksi.php');
include ('function.php');
?>
<?php
//set variabel
$nim = $nama_mahasiswa = "";
$nim_err = $nama_mahasiswa_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(empty(trim($_POST['nim']))){
 $nim_err = "Nim tidak boleh kosong";
 }else{
 $nim=$_POST['nim'];
 $nim=mysqli_real_escape_string($koneksi, $nim);
 }
 //
 if(empty(trim($_POST['nama_mahasiswa']))){
 $nama_mahasiswa_err = "Nama mahasiswa tidak boleh
kosong";
 }else{
 $nama_mahasiswa = $_POST['nama_mahasiswa'];
 $nama_mahasiswa = mysqli_real_escape_string($koneksi,
$nama_mahasiswa);
 }
//cek pakah input masih ada error
 if(empty($nim_err) && empty($nama_mahasiswa_err)){
 /* Panggil function */
 if(simpan_mahasiswa($nim, $nama_mahasiswa)){
 echo 'Berhasil menyimpan data';
 echo "<a href='tampil_data.php'>Tampil data</a>";
 }else{
 echo 'Gagal menyimpan data';
 }

}
 mysqli_close($koneksi);
 //close koneksi
 //end POST
 }
?>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="1.css">
<title>Input Siswa </title>
</head>
<body>
<div class="kotak_login col-auto">

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<label class="text-center mx-auto" >Input Data Mahasiswa</label><br>
<label>Nim : </label><br>
<input type="text" name="nim" size="15" />
<p><br>
<label class="">Nama siswa : </label><br>
<input type="text" name="nama_mahasiswa" size="15" /><br><br>

    <button type="submit" class="btn btn-secondary mb-3">Submit</button>
  </div>
</form>
</div>

<?php echo $nim_err; ?>
<?php echo $nama_mahasiswa_err; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
