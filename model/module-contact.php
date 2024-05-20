<?php

if ($_POST) {
	$name = $_POST['name'] ?? '';
	$email = $_POST['email'] ?? '';
	$message = $_POST['message'] ?? '';
	
	$message = strip_tags($message);
	
	if ($name == '')
		$_error[] = 'Unesite ime';
	if ($email == '')
		$_error[] = 'Unesite email';
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		$_error[]= 'Email adresa nije validna.';
	if ($message == '')
		$_error[] = 'Unesite poruku';

	if (empty($_error)) {
		$headers =  "From: $name <$email>\r\n".
					"Reply-to: $email\r\n".
					"X-Mailer: PHP mailer web programiranje";
					
		if (true)
		//if (@mail('filip.ristic.191@singimsil.rs', 'Poruka sa web sajta', $message, $headers))
			$_message[] = 'Vaša poruka je poslata. Odgovorićemo u roku od 24h.';
		else
			$_error[] = 'Došlo je do greške.';
	}		
}

$_page_output = [
	'page_title' => 'Kontakt stranica',
	'view' => 'module-contact.php'	
];

?>


