<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->setForm('i3npyc09@gmail.com', 'I3NPYC');

	$mail->addAddress('i3npyc09@gmail.com');

	$mail->Subject = 'Йоу итс письмо на емаил';

	$body = '<h1>Кайф письмо</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
	}

	$mail->Body = $body;

	if (!$mail->send()) {
		$message = 'Ошибка!!!';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['massage' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
	
?>