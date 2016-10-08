<h2>Editing Account</h2>
<br>

<?php echo render('account/_form'); ?>
<p>
	<?php echo Html::anchor('account/view/'.$account->id, 'View'); ?> |
	<?php echo Html::anchor('account', 'Back'); ?></p>
