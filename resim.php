<?
include 'config.php';
include 'function.php';

$res = firewall($_GET['res']);
$res  = str_replace(' ', '+',$res );
$res=decrypt($res);

$resim="http://i4.ytimg.com/vi/".$res."/default.jpg";
header("Location: $resim");
?>

