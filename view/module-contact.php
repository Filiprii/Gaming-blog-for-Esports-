<page-contact>
	<?php if (!empty($_message)): ?>
		<a href="./index.php">Vrati se na pocetnu stranu</a>
	<?php else:	?>
	<form method="post">
		<label>Ime *</label>
		<input name="name" value="<?= $_POST['name'] ?? '' ?>">
		<label>Mail adresa *</label>
		<input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
		<label>Komentar *</label>
		<textarea name= "message"><?= $_POST['message'] ?? '' ?></textarea>
		<button>Posalji</button>
	</form>
	<?php endif; ?>
</page-contact>