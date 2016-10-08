<h2>Editing Payment_order</h2>
<br>

<?php echo render('payment/order/_form'); ?>
<p>
	<?php echo Html::anchor('payment/order/view/'.$payment_order->id, 'View'); ?> |
	<?php echo Html::anchor('payment/order', 'Back'); ?></p>
