<page-tours>
	<?php foreach($data AS $i => $d): ?>
	<list>
		<h2>
			<a href="<?= FILE_INDEX ?>?module=tours&action=view&id=<?= $d['tours_id'] ?>"><?= $d['tours_title'] ?></a>
			<?php if (is_admin()): ?>
			<admin>
				<a href="<?= FILE_INDEX ?>?module=tours&action=edit&id=<?= $d['tours_id'] ?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				</a>
				<a href="<?= FILE_INDEX ?>?module=tours&action=delete&id=<?= $d['tours_id'] ?>">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a>
			</admin>
			<?php endif; ?>
		</h2>
		<img src="<?= DIR_PUBLIC_TOURS ?><?= $d['tours_id'] ?>th.jpg">
		<date><?= $d['tours_date'] ?></date>
	</list>
	<?php endforeach; ?>
</page-tours>





