<page-users>
	<?php if (!empty($_message)): ?>
		<?php if (in_array($_action,['submit', 'edit'])): ?> 
			<a href="./index.php?module=tours">Vrati se u galeriju turnira</a>
		<?php endif; ?>
	<?php else:	?>
		<form method="post" enctype="multipart/form-data">
			Naziv turnira
			<input type="text" name="title" value="<?= $title ?? '' ?>">
			Opis događaja
			<textarea name="desc"><?= $desc ?? ''?></textarea>
			Slika
			<input type="file" name="image">
			<button>Pošalji</button>
		</form>
	<?php endif; ?>
</page-users>





