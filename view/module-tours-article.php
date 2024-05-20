<page-tours>
<?php if (!empty($row)): ?>
	<article>
	<full>
		<?php if(empty($_error)): ?>
			<img src="<?= DIR_PUBLIC_TOURS ?><?= $row['tours_id'] ?>.jpg">
		<?php endif; ?>
		<date><?= $row['tours_date'] ?></date>
		<?= $row['tours_desc'] ?>
	</full>
	</article>
</page-tours>
<?php endif; ?>




