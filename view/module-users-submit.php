<page-users>
	<?php if (!empty($_message)): ?>
		<?php if ($_action == 'submit'): ?> 
			<a href="./index.php?module=login">Uloguj se</a>
		<?php elseif ($_action == 'edit'): ?>
			<a href="./index.php?module=users">Vrati se na stranicu korisnici</a>
		<?php endif; ?>
	<?php else:	?>
		<form method="post">
			Korisničko ime
			<input type="text" name="username" value="<?= $username ?? '' ?>">
			Lozinka 
			<input type="password" name="password" value="<?= $password ?? '' ?>" >
			Potvrdi lozinku 
			<input type="password" name="password-confirm" >
			Unesi pol
			<input type="text" name="gender" value="<?= $gender ?? '' ?>">
			<button>Pošalji</button>
		</form>
	<?php endif; ?>
</page-users>





