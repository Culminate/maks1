<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta http-equiv="Refresh" content="4; URL=/index.html"> 
</head>
<body>

<?php 

$selform = 0;
$sendto   = "bum033@yandex.ru"; // почта, на которую будет приходить письмо
$regexphone = '/^\+?[0-9]?[0-9]{10}$/';
if (isset($_POST['InputName'])){
	$username = $_POST['InputName'];   // сохраняем в переменную данные полученные из поля c именем
	$usertel = $_POST['InputPhone']; // сохраняем в переменную данные полученные из поля c телефонным номером
	$clean_number = str_replace(array(' ', '-', '(', ')', '+'), '', $usertel);
	if (preg_match($regexphone, $clean_number) && strlen($username) > 0 && strlen($username) < 30){
		$selform = 1;
}
}
if (isset($_POST['InputName1'])){
	$username = $_POST['InputName1'];
	$usertel = $_POST['InputPhone1'];
	$question = $_POST['Question'];
	$clean_number = str_replace(array(' ', '-', '(', ')', '+'), '', $usertel);
	if (preg_match($regexphone, $clean_number) && strlen($username) > 0 && strlen($username) < 30){
		$selform = 2;
	}
}
$usermail = "request@sunnyglade.msk.ru";

// Формирование заголовка письма

switch ($selform) {
	case 1:
		$subject  = "Заявка на звонок";
		$mailheader = "Заявка на звонок с сайта sunnyglade";
		break;
	
	case 2:
		$subject  = "Вопрос";
		$mailheader = "Вопрос с сайта sunnyglade";
		break;
}


$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>".$mailheader."</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
if (isset($_POST['Question']))
	$msg .= "<p>".$question."</p>\r\n";
$msg .= "</body></html>";

if ($selform){
	if(@mail($sendto, $subject, $msg, $headers)) {
		echo "<center><img src='img/spasibo.png'></center>";
	} else {
		echo "<center><img src='img/ne-otpravleno.png'></center>";
	}
} else {
	echo "<center><img src='img/ne-otpravleno.png'></center>";
}

?>

</body>
</html>