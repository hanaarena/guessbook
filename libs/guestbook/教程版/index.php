<?php
/***********************************************************
* ����˵��
* 5idev ���԰�̳̰�
* �����԰����Ϊ www.5idev.com �ṩ�������԰�̳�ʹ��
* ��վ�Ըó��򲻱����κ�Ȩ�����������޸Ĵ���ʹ��
* �����԰�̵̳�ַ��http://www.5idev.com/p-php_guestbook.shtml
***********************************************************/
/***********************************************************
* index.php ���԰���ҳ���ļ�
***********************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������</title>
<script language="JavaScript">
function InputCheck(form1)
{
  if (form1.nickname.value == "")
  {
    alert("�����������ǳơ�");
    form1.nickname.focus();
    return (false);
  }
  if (form1.content.value == "")
  {
    alert("�������ݲ���Ϊ�ա�");
    form1.content.focus();
    return (false);
  }
}
</script>
</head>
<body>
<h3>�����б�</h3>
<?php
/*****************************
*index.php ��ҳ���ļ�
*****************************/
// ��������ļ�
require("./conn.php");
require("./config.php");

// ȷ����ǰҳ�� $p ����
$p = $_GET['p']?$_GET['p']:1;
// ����ָ��
$offset = ($p-1)*$pagesize;

$query_sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT  $offset , $pagesize";
$result = mysql_query($query_sql);
// ������ִ����˳�
if(!$result) exit('��ѯ���ݴ���'.mysql_error());

// ѭ�����
while($gb_array = mysql_fetch_array($result)){
	$content = nl2br($gb_array['content']);
	echo $gb_array['nickname'],'&nbsp;';
	echo '�����ڣ�'.date("Y-m-d H:i", $gb_array['createtime']).'<br />';
	echo '���ݣ�',nl2br($gb_array['content']),'<br /><br />';
	
	if(!empty($gb_array['replytime'])) {
		echo '----------------------------<br />';
		echo '����Ա�ظ��ڣ�',date("Y-m-d H:i", $gb_array['replytime']),'<br />';
		echo nl2br($gb_array['reply']),'<br /><br />';
	}
	echo '<hr />';
}

//��������ҳ��
$count_result = mysql_query("SELECT count(*) FROM guestbook");
$count_array = mysql_fetch_array($count_result);
$pagenum=ceil($count_array['count(*)']/$pagesize);
echo '�� ',$count_array['count(*)'],' ������';
if ($pagenum > 1) {
	for($i=1;$i<=$pagenum;$i++) {
		if($i==$p) {
			echo '&nbsp;[',$i,']';
		} else {
			echo '&nbsp;<a href="index.php?p=',$i,'">'.$i.'</a>';
		}
	}
}
?>
<div class="form">
<form id="form1" name="form1" method="post" action="submiting.php" onSubmit="return InputCheck(this)">
<h3>��������</h3>
<p>
<label for="title">��&nbsp;&nbsp;&nbsp;&nbsp;��:</label>
<input id="nickname" name="nickname" type="text" /><span>(������д��������16���ַ���)</span>
</p>
<p>
<label for="title">�����ʼ�:</label>
<input id="email" name="email" type="text" /><span>(�Ǳ��룬������60���ַ���)</span>
</p>
<p>
<label for="title">��������:</label>
<textarea id="content" name="content" cols="50" rows="8"></textarea>
</p>
<input type="submit" name="submit" value="  ȷ ��  " />
</form>
</div>
</body>
</html>