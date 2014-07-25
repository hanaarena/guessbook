<?php 
	$conn = mysql_connect("localhost:3306","root","516400") or die("数据库链接错误");
	mysql_select_db("db_leaveword", $conn);
	mysql_query("set name gb2312");
 ?>

<?php
 if($conn) {
 	
}
?>