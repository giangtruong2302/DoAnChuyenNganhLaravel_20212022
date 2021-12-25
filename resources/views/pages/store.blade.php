
<?php
$host ="localhost";
$dbName="sachtruyen";
$userName="root";
$password="";
$objPDO = new PDO("mysql:host=$host; dbname=$dbName", $userName, $password);
$objPDO->query('set names utf8');

$m = isset($_GET['hoten'])?$_GET['hoten']:'';
$t = isset($_GET['username'])?$_GET['username']:'';
$g = isset($_GET['password'])?$_GET['password']:'';
$mt = isset($_GET['phone'])?$_GET['phone']:'';
$em=isset($_GET['email'])?$_GET['email']:'';


$sql="insert into docgia(hoten,username,password,phone,email) values(?, ?, ?, ?,?) ";
$a =[$m, $t, $g, $mt,$em];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
?>
<h1>Đăng kí thành công</h1>
<a href="{{url('/')}}">Quay lại</a>