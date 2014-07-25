<?php
// 禁止非 POST 方式访问
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
// 表单信息处理
$nickname = addslashes(htmlspecialchars(trim($_POST['nickname'])));
$email = addslashes(htmlspecialchars(trim($_POST['email'])));
$content = addslashes(htmlspecialchars(trim($_POST['content'])));
if(strlen($nickname)>16){
	exit('昵称不得超过16个字符串 [ <a href="javascript:history.back()">返 回</a> ]');
}
if(strlen($nickname)>60){
	exit('邮箱不得超过60个字符串 [ <a href="javascript:history.back()">返 回</a> ]');
}

require("conn.php");
require("function.php");

date_default_timezone_set('PRC');
$createtime = date("Y-m-d H:i:s");
$ip = get_client_ip();
$userid = mt_rand();
// 数据写入库表
$insert_sql = "insert into leaveword(username,userid,email,content,createtime,avatar,ip)VALUES";
$insert_sql .= "('$nickname','$userid','$email','$content','$createtime','avatar5','$ip')";

if(mysql_query($insert_sql)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
		<meta http-equiv="Refresh" content="2;url=guessbook.php">
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<title>留言成功</title>
	</head>
<body>
	<div class="refresh">
		<p>留言成功！&nbsp;请稍后，页面正在返回...</p>
	</div>
</body>
</html>
<?php
} else {
	echo '留言失败：',mysql_error(),'[ <a href="javascript:history.back()">返 回</a> ]';
}
?>