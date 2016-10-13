<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Beneficiary', 'beneficiary', array('class'=>'control-label')); ?>

				<?php echo Form::input('beneficiary', Input::post('beneficiary', isset($payment_order) ? $payment_order->beneficiary : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Beneficiary')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($payment_order) ? $payment_order->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amnt in words', 'amnt_in_words', array('class'=>'control-label')); ?>

				<?php echo Form::input('amnt_in_words', Input::post('amnt_in_words', isset($payment_order) ? $payment_order->amnt_in_words : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amnt in words')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Details', 'details', array('class'=>'control-label')); ?>

				<?php echo Form::input('details', Input::post('details', isset($payment_order) ? $payment_order->details : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Details')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deadline', 'deadline', array('class'=>'control-label')); ?>

				<?php echo Form::input('deadline', Input::post('deadline', isset($payment_order) ? $payment_order->deadline : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deadline')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Payment request', 'payment_request', array('class'=>'control-label')); ?>

				<?php echo Form::input('payment_request', Input::post('payment_request', isset($payment_order) ? $payment_order->payment_request : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Payment request')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($payment_order) ? $payment_order->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>