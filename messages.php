<?php if ($messages = get_messages()) { ?>
	<div class="messages">
		<?php foreach ($messages as $message) { ?>
			<div class="single-message"><?php print $message; ?></div>
		<?php } ?>
	</div>
<?php } ?>