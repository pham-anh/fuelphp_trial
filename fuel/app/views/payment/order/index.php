<h2>Listing Payment_orders</h2>
<br>
<?php if ($payment_orders): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Beneficiary</th>
			<th>Amount</th>
			<th>Amnt in words</th>
			<th>Details</th>
			<th>Payment request</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($payment_orders as $item): ?>		<tr>

			<td><?php echo $item->beneficiary; ?></td>
			<td><?php echo $item->amount; ?></td>
			<td><?php echo $item->amnt_in_words; ?></td>
			<td><?php echo $item->details; ?></td>
			<td><?php echo $item->payment_request; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<?php echo Html::anchor('payment/order/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('payment/order/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('payment/order/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Payment_orders.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('payment/order/create', 'Add new Payment order', array('class' => 'btn btn-success')); ?>

</p>
