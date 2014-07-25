<?php
session_start();

if($_POST){
  $username = $_POST['username'];
  session_register("username");
  header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/guessbook.php");
    exit;
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
        <title>Leave Word Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">   
        <link rel="stylesheet" type="text/css" href="css/style.css">     
        <script type="text/javascript">
            function checkInput(form1) {
              if(form1.username.value=="") {
                alert("用户名不能为空");
                form1.username.focus();
                return(false);
              }                   
              else if(form1.username.value.length<5) {
                alert("User Name's length must larger than 5");
                form1.username.focus();
                return(false);
              }
              console.log(username);
              return(true);
            }
        </script>
    </head>
<body>
	<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div style="width:200px;height:100px;margin:200px auto">   
      <form name="form1" action="index.php" method="post" onSubmit="return checkInput(this)">     
      	<input required='' class="" type="text" name="username" />
        <label alt='Enter Nickname' placeholder='Nickname'></label>
        <!-- <input type="submit" name="submit" value="Join" />	 -->
      </form>  
    </div>     
</body>
</html>