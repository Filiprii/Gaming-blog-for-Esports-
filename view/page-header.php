<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta description="Upoznavanje sa esportom">
<title><?= $_page_output['page_title'] ?> | <?= _CONFIG['site_name'] ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="<?= DIR_PUBLIC_JS ?>script.js"></script>
<link rel="stylesheet" href="<?= DIR_PUBLIC_CSS ?>style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<above-header>
				<?php if(($_SESSION['loggedin'] ?? '') == 1): ?>
				<?php if (is_admin()): ?>
					<a href="<?= FILE_INDEX ?>?module=users">Korisnici</a> |
				<?php endif; ?>
				<?= $_SESSION['username'] ?>
				<a href="<?= FILE_INDEX ?>?module=login&action=logout" title="Odjavi se"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
			<?php else: ?>
				<a href="<?= FILE_INDEX ?>?module=login" title="Prijavi se"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
				<a href="<?= FILE_INDEX ?>?module=users&action=submit" title="Registruj se"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
			<?php endif; ?>
			<form method="post" action="<?= FILE_INDEX ?>?module=login">
		</form>
	</above-header>
	<header>
		Esports blog
	</header>