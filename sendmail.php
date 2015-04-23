<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网页制作大赛邮件发送</title>
<link rel="stylesheet" type="text/css" href="./css/main.css" />
</head>
<body>
<?php 
    header("Content-type: text/html; charset=utf-8");
	require_once "email.class.php";
	require_once "filter.php";
	$smtpserver = "smtp.exmail.qq.com";
	$smtpserverport =25;
	$smtpusermail = "fangdong@ldustu.com";//用户邮箱
	$smtpuser = "fangdong@ldustu.com";//用户名
	$smtppass = "xxxxxxxxx";//密码
	$mailtitle =fliter_script($_POST['title']);
	$mailcontent = fliter_script($_POST['content']);
	$mailtype = "HTML";
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->debug = false;
    require "conn.php";
    $sql=mysql_query("select email,user from baoming ");
    while($row = mysql_fetch_array($sql)){ 
      $smtpemailto = $row['email'];
      $user=$row['user'];
	  $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
      static $i=1; 
      echo "<div style='width:700px; margin:36px auto;'>";
	  if($state==""){
		  echo "正在发送第".$i++."封邮件给$user......"."对不起，邮件发送失败！请检查邮箱填写是否有误。";
		  echo "<a href='mail.html'>点此返回</a>";
		  exit();
	  }
	   echo "正在发送第".$i++."封邮件给$user......"."恭喜！邮件发送成功！！";
	   echo "<a href='mail.html'>点此返回</a>";
	   echo "</div>";
   }*/
?>

</body>
</html>