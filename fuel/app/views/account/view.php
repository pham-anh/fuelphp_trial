<h2>Viewing #<?php echo $account->id; ?></h2>

<p>
	<strong>Account name:</strong>
	<?php echo $account->account_name; ?></p>
<p>
	<strong>Account no:</strong>
	<?php echo $account->account_no; ?></p>
<p>
	<strong>Bank:</strong>
	<?php echo $account->bank; ?></p>
<p>
	<strong>Province:</strong>
	<?php echo $account->province; ?></p>

<?php echo Html::anchor('account/edit/'.$account->id, 'Edit'); ?> |
<?php echo Html::anchor('account', 'Back'); ?>