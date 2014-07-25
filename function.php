<?php
/*****************************
* function.php 公共函数文件
*****************************/

// 获取客户端IP地址
function get_client_ip(){
   
  $ip = getenv("REMOTE_ADDR");
   
  return($ip);
}

?>