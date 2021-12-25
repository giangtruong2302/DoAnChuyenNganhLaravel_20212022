
<?php
$host ="localhost";
$dbName="sachtruyen";
$userName="root";
$password="";
$objPDO = new PDO("mysql:host=$host; dbname=$dbName", $userName, $password);
$objPDO->query('set names utf8');

$user=$_GET('username');
$password=$_GET('password');


$sql="select * from docgia where username=$user and password=$password";
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute();//ket qua truy van
?>
<h1>Đăng Nhập thành công</h1>
<a href="{{url('/')}}">Quay lại</a>