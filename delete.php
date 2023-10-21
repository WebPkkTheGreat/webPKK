<?php
include ('koneksi.php');
include ('function.php');
?>
<html>
<head>
    <link rel="stylesheet" href="style3.css">
<title>DELETE DATA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

</head>
<body class="text-center">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
//panggil function delete data
if(delete_data(trim($_GET['id']))){
 echo "<h2 class='text-center'>data berhasil dihapus</h2>";
 echo "<a href='tampil_data.php'>Tampil data </a><br>";
}else{
 echo "Gagal mendelete data";
}
//close koneksi
mysqli_close($koneksi);
}else{
if(empty(trim($_GET["id"]))){
 header("location:error");
}
}
?>
<a class='btn btn-outline-secondary' href='javascript:history.back()'> Kembali </a>
</form>
</body>
</html>