<?php

session_start();
// 未登录则重定向到登陆页面
if(!isset($_SESSION['username'])){
  header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");
  exit;
}
if($_GET['action'] == 'logout'){
  session_unregister("username");
  exit('<script language="javascript">alert("退出成功！");self.location = "index.php";</script>');
}
else if(isset($_SESSION['username'])) { ?>
  <script type="text/javascript">
    function temp(form2) {
      form2.nickname.value="<?php echo $_SESSION['username'];?>";
    }
  </script>
<?php }
	include_once("conn.php");
  $sql = mysql_query("select count(*) as total from leaveword",$conn);
  $infos = mysql_fetch_array($sql);
  $total = $infos['total'];/* Total leaveword */
  function unhtml($content) {                   //定义自定义函数的名称
    $content=htmlspecialchars($content);            //转换文本中的特殊字符
    $content=str_replace("@","",$content);            //替换文本中的换行符
    return trim($content);                   //删除文本中首尾的空格
  }
?>

<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Guess Book Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript">
          function checkEditbox(form2) {
            if(form2.nickname.value=="") {
              alert("User Name could not be NULL");
              form2.nickname.focus();
              return(false);
            }
            else if(form2.nickname.value.length<5) {
              alert("User Name's length must larger than 5");
              form2.nickname.focus();
              return(false);
            }
            else if(form2.email.value=="") {
              alert("Please enter your E-mail");
              form2.email.focus();
              return(false);
            }
            else if(form2.content.value==""||form2.content.value.length<7) {
              alert("Content's length must larger than 7");
              form2.content.focus();
              return(false);
            }
            return(true);
          }
        </script>
    </head>
<body>
	<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  	<div id="container">
      
  		<div id="wrapper">
  			<li id="leaveword">
          <?php
            if($total==0) {
              echo "<div align=center class=''>No Leaveword!</div>";
            } else {
              if(!isset($_GET["page"]) || !is_numeric($_GET["page"])) {
                $page = 1;
              } else {
                $page = intval($_GET["page"]);
              }
              $pagesize = 3; /* Leave Num per page */
              if($total%$pagesize==0) {
                $pagecount = intval($total/$pagesize);   
              } else {
                $pagecount = ceil($total/$pagesize);
              }
              $sql = mysql_query("select * from leaveword order by createtime desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
              while($info = mysql_fetch_array($sql)) {
                
          ?>
          <div  class="list_leaveword">
            <ul>
              <li class="list_avatar"><?php echo "<img src='imgs/".$info["avatar"].".svg' width='100' height='100'>"; ?></li>
              <li class="list_username"><?php echo "<p>".$info["username"]."</p>"?></li>
              <li class="list_content"><?php echo "<span>".unhtml($info["content"])."</span>";?></li>
              <li class="list_createtime"><?php echo "<span class='createtime'><a href='detail.php?id=".$info["id"]."'>".$info["createtime"]."</a>"; ?></span>&nbsp;<a href="index.php?ed=<?php echo $info['id'];?> & id=<?php echo urlencode("回复留言");?>">回复</a></li>
              
            </ul>
          </div>
          <?php
              }
          ?>
          <div align="center">共有留言&nbsp;<?php echo $total;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount;?>&nbsp;页</div>
          <div align="center">
            <?php if($page!=1) { ?>
            <a href="<?php echo $_SERVER["PHP_SELF"]?>?page=1" class="a1">首页</a>&nbsp;
            <a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php 
            if($page>1)         //判断当前页是否大于第一页，如果是则当用户单击“上一页”超级链接时，使变量$page的值减1，从而实现向前翻页的功能
                echo $page-1; 
           ?>" class="a1">上一页</a>&nbsp;
            <?php }?> 
            <?php if($page!=$pagecount) { ?>     
            <a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php 
            if($page<$pagecount)    //判断当前页码是否小于总的页数，如果是则当用户单击“下一页”超级链接时，使变量$page的值加1，从而实现向前翻页的功能
               echo $page+1;
           ?>" class="a1">下一页</a>&nbsp;
            <a href="<?php  echo $_SERVER["PHP_SELF"]?>?page=<?php echo $pagecount;?>" class="a1">尾页</a>
            <?php } }?>
          </div>
          <form id="form2" name="form2" method="post" action="submit.php"  onsubmit="return checkEditbox(this)">
          <div id="editbox">
            <ul>
              <li>Name:&nbsp;<input id="nickname" name="nickname" type="text" /><span class="must">&nbsp;*</span></li>
              <li>E-mail:&nbsp;<input id="email" name="email" type="text" /><span class="must">&nbsp;*</span></li>
              <li>Content:&nbsp;<textarea id="content" name="content" rows="5" cols="60%"></textarea></li>
            </ul>  
            <ul><input type="submit" class="submit" name="submit" value="OK"></ul>     
          </div>
          </form>
        </li>
  			<li id="right">
  				<a href="guessbook.php?action=logout">Logout</a>
  			</li>
  		</div>
      
  	</div>
    <script type="text/javascript">temp(form2);</script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>        
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    
</body>
</html>