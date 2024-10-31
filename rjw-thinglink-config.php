<div class="wrap">
	<? if ($_GET['updated']) { ?>
		<div id="message" class="updated fade" style="margin: 15px 0 10px;"><p>Your settings have been <strong>saved</strong>.</p></div>
	<? } ?>

	<h2><?= $plugin_name ?></h2>
	
	<form id="rjwThinglinkOptions" method="post" action="options.php" autocomplete="off">
		<? settings_fields('rjw-thinglink-group'); ?>
		
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Thinglink ID</th>
				<td><input type="text" name="thinglink_id" value="<?= get_option('thinglink_id'); ?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
	</form>
</div>