<?php
/*****************************
* function.php ���������ļ�
*****************************/

// ��ȡ�ͻ���IP��ַ
function get_client_ip(){
   
  $ip = getenv("REMOTE_ADDR");
   
  return($ip);
}

?>