<?php
include ('koneksi.php');
include ('function.php');
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
<title>DETAIL DATA </title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
<?php
if(!empty($_GET['id'])){
if(detail_data(trim($_GET['id']))){
 $row=mysqli_fetch_array($result);
}else{
 die ("Data tidak ditemukan");
}
}else{
 die("error");
}
mysqli_close($koneksi);
?>

<table class="table caption-top bg-secondary">
  <caption class="text-center mb-4 ">DATA MAHASISWA </caption>
  <thead>
    <tr class="mt-4">
      <th scope="col" >ID</th>
      <th scope="col">NAMA MAHASISWA</th>
      <th scope="col">NIM</th>
      <th scope="col">TANGGAL DAFTAR</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['nama_mahasiswa'];?></td>
<td><?php echo $row['nim'];?></td>
<td><?php echo $row['tanggal_daftar'];?></td>
</tr>
<a class='btn btn-secondary mt-4 ms-2' href='javascript:history.back()'> BACK </a>
  </tbody>
</table>
</body>
</html>
