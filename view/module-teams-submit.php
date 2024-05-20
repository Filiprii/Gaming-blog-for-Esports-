<page-users>
	<?php if (!empty($_message)): ?>
		<?php if (in_array($_action,['submit', 'edit'])): ?> 
			<a href="./index.php?module=teams">Vrati se na stranicu timova</a>
		<?php endif; ?>
	<?php else:	?>
		<form method="post">
			Ime tima
			<input type="text" name="title" value="<?= $title ?? '' ?>">
			Kratak opis 
			<input type="text" name="short" value="<?= $short ?? '' ?>" >
			Puni opis tima 
			<textarea name="desc"><?= $desc ?? ''?></textarea>
			<button>Pošalji</button>
		</form>
	<?php endif; ?>
</page-users>





