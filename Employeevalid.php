<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);

$mess.=Namespacevalid($content,"Enter Valid Name",3);
$mess.=EmailValid($content1,"Enter Valid Email,");
$mess.=DatbaseValid("employeetable","Eemail",$content1,"Email Allready Register,");
$mess.=PasswordStrengthValid($content2,"Enter Password,");
$mess.=phonevalid($content3,"Enter Valid Mob. No,",10);


if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>