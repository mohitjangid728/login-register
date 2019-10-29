<?php  if (count($errors) > 0) : ?>
	<div class="alert alert-light alert-dismissible fade show">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<button type="button" class="close" data-dismissible="alert">&times;</button>
		<?php endforeach ?>
	</div>
<?php  endif ?>
