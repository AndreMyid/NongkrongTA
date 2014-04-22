<?php
function formInputMotor(){
?>
<?php
if(isset ($_SESSION['username'])&&($_SESSION['hakakses']=="admin")){
}
echo"<a href=\"?page=motor&tampil\"class=link>DATA MOTOR</a>";
echo"<a href=\"?page=motor\" class=link>FORM MOTOR</a>";
if(isset ($_GET['tampil'])){
tampilMotor();
if($_GET['aksi']=="hapus"){
deleteMotor();
}
else{
if ($_GET['aksi']=="edit"){
formEditMotor();
}else{
formInputMotor();
}
if(isset($_POST['updateMotor'])){
updateMotor();
}elseif(isset($_POST['inputMotor'])){
inputMotor();
}
}
}
elseif (isset($_SESSION['username'])&& ($_SESSION['hakakses']=="user")){
echo"<a href=\"?page=motor&tampil\" class=link>DATA MOTOR</a>";
if (isset($_GET['tampil'])){
tampilMotor();
}
}else{
echo"<a href=\"?page=motor&tampil\" class=link>DATA MOTOR</a>";
if (isset ($_GET['tampil'])){
tampilMotor();
}
}
?>
<center>
<form method="post" action="fmotor.php">
<div align="center">
<table width="200" border="1">
<tr>
<td colspan="3"><div align="center"><strong>FORM INPUT MOTOR </strong></div></td>
</tr>
<tr>
<td>Kode Motor </td>
<td>:</td>
<td><input type="text" name="kdmotor" value=""></td>
</tr>
<tr>
<td>Merk</td>
<td>:</td>
<td><input type="text" name="merk" value=""></td>
</tr>
<tr>
<td>Warna</td>
<td>:</td>
<td><input type="text" name="warna" value=""></td>
</tr>
<tr>
<td>Harga</td>
<td>:</td>
<td><input type="text" name="harga" value=""></td>
</tr>
<tr>
<td>Stok</td>
<td>:</td>
<td><input type="text" name="stok" value=""></td>
</tr>
<tr>
<td colspan="3"><div align="center">
<input type="submit" name="inputMotor" value="Input">
<input type="reset" name="resetMotor" value="Batal">
</div></td>
</tr>
</table>
</div>
</form>
</center>
<?php
}
function inputMotor(){
$query=mysql_query("insert into motor values('kdmotor','merk','warna','warna','harga','stok')");
echo"<script>window.location=\"?page=motor&tampil\"</script>";
}
function deleteMotor(){
$query=mysql_query("delete from motor where kdmotor='$_GET[idmotor]'") or die ("Gagal Menghapus Motor");
echo"<script>window.location="?page=motor&tampil\"</script>";
else if(isset($_GET['pilih'])){
cariMotor();
if(isset($_POST['cari']))
tampilCariMotor();
}
function formEditMotor(){
$query=mysql_query("select * from motor where kdmotor='$_GET[idmotor]'");
$data=mysql_fetch_array($query);
?>
<center>
<form method="post" action="fmotor.php">
<div align="center">
<table width="200" border="1" cellspacing= "10px">
<tr>
<td colspan="3"><div align="center"><strong>FORM UPDATE MOTOR </strong></div></td>
</tr>
<tr>
<td>Kode Motor</td>
<td>:</td>
<td><input type="text" name="kdmotor" value="<?php echo $data [0] ?>"></td>
</tr>
<tr>
<td>Merk</td>
<td>:</td>
<td><input type="text" name="merk" value="<?php echo $data[1] ?>"></td>
</tr>
<tr>
<td>Warna</td>
<td>:</td>
<td><input type="text" name="warna" value="<?php echo $data[2] ?>"></td>
</tr>
<tr>
<td>harga</td>
<td>:</td>
<td><input type="text" name="harga" value="<?php echo $data[3] ?>" readonly></td>
</tr>
<tr>
<td>Stok</td>
<td>:</td>
<td><input type="text" name="stok" value="<?php echo $data[4] ?>"></td>
</tr>
<tr>
<td colspan="3"><div align="center">
<input type="submit" name="updateMotor" value="update">
<input type="reset" name="resetMotor" value="reset">
</div></td>
</tr>
</table>
</div>
</form>
</center>
<?php
}
function updateMotor(){
$query=mysql_query("update motor set
kode= '$_POST[kdmotor]',
merk= '$_POST[merk]',
warna='$_POST[warna]',
harga='$_POST[harga]',
stok='$_POST[stok]',
where kode='$_POST[kdmotor]'");
echo"<script>window.location=\"?page=motor&tampil\"</script>";
}
function tampilMotor(){
echo"<center>";
echo"<table border=0 class=tabeldata>";
echo"<tr>
<td colspan=8 align=center><strong>DATA </strong></td>
</tr>
<tr>
<th>Kode Motor</th>
<th>Merk </th>
<th>Warna</th>
<th>Harga</th>
<th>Stok</th>";
echo"<th colspan=2> Tools </th>";
echo"</tr>";
$query=mysql_query("select*from motor ");
$no=1;
while($data=mysql_fetch_array($query)){
echo"<tr align=center >
<td>$no</td>
<td>$data[0]</td>
<td>$data[1]</td>
<td>$data[2]</td>
<td>$data[3]</td>
<td>$data[4]</td>
<td>$data[5]</td>
echo"<td><a href=\"?page=motor&tampil&aksi=hapus&id=$data[0]
\"><p class=hapus></p></a></td>
<td><a href=\"?page=motor&aksi=edit&idmotor=$data[0]\"><p class=edit></p></a></td>";
echo"</tr>";
$no++;
}
echo"</table>";
echo"</center>";
}
?>
