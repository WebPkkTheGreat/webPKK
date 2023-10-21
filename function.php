<?php
//function simpan data
function simpan_mahasiswa($nim, $nama_mahasiswa){
 global $koneksi;
 $sql="INSERT INTO datamhs(nim, nama_mahasiswa) VALUES (?,?)";
 if($stmt=mysqli_prepare($koneksi, $sql)){
 mysqli_stmt_bind_param($stmt,"ss",$param_nim,
$param_nama_mahasiswa);
 $param_nim = $nim;
 $param_nama_mahasiswa = $nama_mahasiswa;

if(mysqli_stmt_execute($stmt)){
 return true;
}else{
 return false;
}
}
//Close statement
mysqli_stmt_close($koneksi);
//End function
}
//function tampil data
function tampil_data(){
global $koneksi;
$sql ="SELECT id, nim, nama_mahasiswa, tanggal_daftar FROM datamhs";
$result=mysqli_query($koneksi,$sql);
return $result;
}
//function delete data
function delete_data($var_id){
global $koneksi;
$sql = "DELETE FROM datamhs where id =?";
if($stmt=mysqli_prepare($koneksi, $sql)){
 mysqli_stmt_bind_param($stmt,"i", $param_id);
 $param_id = $var_id;

 if(mysqli_stmt_execute($stmt)){
 return true;
 }else{
 return false;
 }
}
mysqli_stmt_close($stmt);
}
function detail_data($var_id){
global $koneksi;
global $result;
$sql="SELECT id, nama_mahasiswa, nim, tanggal_daftar FROM
datamhs WHERE id=?";
if($stmt=mysqli_prepare($koneksi, $sql)){
 mysqli_stmt_bind_param($stmt,"i",$param_id);
 $param_id = $var_id;
 if(mysqli_stmt_execute($stmt)){
 $result=mysqli_stmt_get_result($stmt);
 if(mysqli_num_rows($result)==1){
 return true; //jika ada data nilai true
 }else{
 return false; //jika data tidak ditemukan nilai false
 }
 }else{
 echo "Terjadi kesalahan";
 }
}
mysqli_stmt_close($stmt);
}
function update_data($var_id, $nim, $nama_mahasiswa){
global $koneksi;
$sql ="UPDATE datamhs SET nim=?, nama_mahasiswa=? WHERE id=?";
if($stmt=mysqli_prepare($koneksi, $sql)){
 mysqli_stmt_bind_param($stmt,"ssi",$param_nim,
$param_nama_mahasiswa, $param_id);
 //set parameter
 $param_id = $var_id;
 $param_nim = $nim;
 $param_nama_mahasiswa = $nama_mahasiswa;
 if(mysqli_stmt_execute($stmt)){
 return true;
 }else{
 return false;
 }
}
}
?>