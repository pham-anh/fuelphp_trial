<h2>Viewing #<?php echo $payment_order->id; ?></h2>

<p>
	<strong>Beneficiary:</strong>
	<?php echo $payment_order->beneficiary; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $payment_order->amount; ?></p>
<p>
	<strong>Amnt in words:</strong>
	<?php echo $payment_order->amnt_in_words; ?></p>
<p>
	<strong>Details:</strong>
	<?php echo $payment_order->details; ?></p>
<p>
	<strong>Deadline:</strong>
	<?php echo $payment_order->deadline; ?></p>
<p>
	<strong>Payment request:</strong>
	<?php echo $payment_order->payment_request; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $payment_order->status; ?></p>

<?php echo Html::anchor('payment/order/edit/'.$payment_order->id, 'Edit'); ?> |
<?php echo Html::anchor('payment/order', 'Back'); ?>