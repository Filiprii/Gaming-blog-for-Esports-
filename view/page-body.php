	<article>
		<?php if (!empty($_page_output['breadcrumbs'])):  ?>
		<breadcrumbs>
			<?php foreach($_page_output['breadcrumbs'] AS $bc_url => $bc_title): ?>
			<a href="<?= $bc_url ?>"><?= $bc_title ?></a>
			<!-- ► <a href="#">Gallery</a> ► <a href="#">...</a> -->
			<?php endforeach; ?>
		</breadcrumbs>
		<?php endif; ?>
		<?php if (($_page_output['page_title'] ?? '') != ''): ?>	
		<h1>
			<?= $_page_output['page_title'] ?? '' ?>
			<?php if (is_admin()&& $_action == '' && $_module != ''): ?>
					<a href="<?= FILE_INDEX ?>?module=<?= $_module ?>&action=submit">
						<i class="fa fa-plus-circle" aria-hidden="true"></i></h1>
					</a>
			<?php endif; ?>
		</h1>
		<?php endif; ?>
		<content>
			<?php if (!empty($_error)): ?>
			<error>
				<h3>Greška</h3>
				<?= implode ('<br>', $_error); ?>
			</error>
			<?php endif; ?>
			<?php if (!empty($_message)): ?>
			<message>
				<?= implode ('<br>', $_message); ?>
			</message>
			<?php endif; ?>
			<?php include_once(DIR_VIEW . $_page_output['view']); ?>
		</content>
	</article>