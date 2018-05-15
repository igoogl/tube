<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>Iletisim Formu</title>
</head>
<body>
<?php
include 'config.php';

$subject = $_POST["konu"];
$message .= "Iletisim formu islem sonucu\n\n";
$message .= "Adi soyadi: " . $_POST["ad"] . "\r\n";
$message .= "Email: " . $_POST["email"] . "\r\n";
$message .= "Konu: " . $_POST["konu"] . "\r\n";
$message .= "Mesaj: " . $_POST["mesaj"] . "\r\n";

mail($to,$subject, $message);
?>
<SCRIPT LANGUAGE="JavaScript">
var shant="/."
document.write('Thank you for message!')
function forPage()
{
location.href=shant
}
setTimeout ("forPage()", 5000);
</SCRIPT>
</body>
</html>