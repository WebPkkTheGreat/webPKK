<?php
include ('koneksi.php');
include ('function.php');
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
<title>Menampilkan data </title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php
//memanggi function
$result = tampil_data();
 //mengeksekusi function didalam percabangan
 if($result){
 //jika data di tabel lebih besar dari 0 atau memiliki data maka
// eksekusi perulangan atau looping
 if(mysqli_num_rows($result)>0){
 echo "<table border='1' width='500' class='mt-4'>";
 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>NIM</th>";
 echo "<th>NAMA MAHASISWA</th>";
 echo "<th>AKSI</th>";
 echo "</tr>";
 //loping data
 while($row=mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nim']."</td>";
    echo "<td>".$row['nama_mahasiswa']."</td>";
    echo "<td>";
    echo "<a class='btn btn-outline-danger' href='delete.php?id=".$row['id']."' 'title = 'delete'> DELETE </a>";
    echo "   |   ";
    echo "<a class='btn btn-outline-secondary' href='detail.php?id=".$row['id']."' 'title = 'detail'> DETAIL </a>";
    echo " | ";
    echo "<a class='btn btn-outline-success' href='update.php?id=".$row['id']."' 'title = 'update'> UPDATE </a>";
    echo "</td>";
    echo "</tr>";
    }
    echo "</table><br>";
    echo "<a class='btn btn-secondary' href='input.php' role='button'>Input Data</a>";
 //free result
 mysqli_free_result($result);
//namun jika tidak lebih besar dari pada > 0 atau tidak
// ditemukan data maka jalan perintah berikut
}else{
echo "<h2 class='text-white '>Data Masih Kosong</h2>";
}
//percabangan result ketika function tidak bisa mengeksekusi
// perintah
}else{
echo "Terjadi kesalahan. Coba lagi
nanti".mysqli_error($koneksi);
}
//close koneksi
mysqli_close($koneksi);
?>
</body>
</html>