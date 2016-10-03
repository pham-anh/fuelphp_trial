<h2>Listing Accounts</h2>
<br>
<?php if ($accounts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Account name</th>
			<th>Account no</th>
			<th>Bank</th>
			<th>Province</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($accounts as $item): ?>		<tr>

			<td><?php echo $item->account_name; ?></td>
			<td><?php echo $item->account_no; ?></td>
			<td><?php echo $item->bank; ?></td>
			<td><?php echo $item->province; ?></td>
			<td>
				<?php echo Html::anchor('account/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('account/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('account/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Accounts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('account/create', 'Add new Account', array('class' => 'btn btn-success')); ?>

</p>
