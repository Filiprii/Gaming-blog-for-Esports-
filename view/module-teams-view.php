<page-teams>
	<?php foreach($data AS $i => $d): ?>
	<list>
		<h2>
			<a href="<?= FILE_INDEX ?>?module=teams&action=view&id=<?= $d['teams_id'] ?>"><?= $d['teams_title'] ?></a>
			<?php if (is_admin()): ?>
			<admin>
				<a href="<?= FILE_INDEX ?>?module=teams&action=edit&id=<?= $d['teams_id'] ?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				</a>
				<a href="<?= FILE_INDEX ?>?module=teams&action=delete&id=<?= $d['teams_id'] ?>">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a>
			</admin>
			<?php endif; ?>
		</h2>
		<div class="date"><?= $d['teams_date'] ?></div>
		<div class="short"><?= $d['teams_short']?></div>
	</list>
	<?php endforeach; ?>
</page-teams>





