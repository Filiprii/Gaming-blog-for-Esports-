<page-users>
	<table>
	<tr>
		<th>#</th>
		<th>Korisnik</th>
		<th>Lozinka</th>
		<th>Datum kreiranja</th>
		<?php if (is_admin()): ?>
		<th></th>
		<?php endif; ?>
		
	</tr>
	<?php foreach($data AS $i => $d): ?>
	<tr>
		<td><?= $i + 1 ?></td>
		<td><a href="<?= FILE_INDEX ?>?module=users&action=view&id=<?= $d['users_id'] ?>"><?= $d['users_username'] ?></a></td>
		<td><?= $d['users_password'] ?></td>
		<td><?= $d['users_date'] ?></td>
		<?php if (is_admin()): ?>
		<td>
		<a href="<?= FILE_INDEX ?>?module=users&action=edit&id=<?= $d['users_id'] ?>">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		</a>
		<a href="<?= FILE_INDEX ?>?module=users&action=delete&id=<?= $d['users_id'] ?>">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
		</td>
		<?php endif; ?>
	</tr> 
	<?php endforeach; ?>
	</table>
</page-users>





