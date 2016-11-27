<?php $error_message = (null !== (Session::get_flash('error')) ? (e((array) Session::get_flash('error'))) : NULL); ?>

<?php echo Form::open(array("class" => "center-block")); ?>

<fieldset>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Account name', 'account_name', array('class' => 'control-label')); ?>
		
		<?php echo Form::input('account_name', Input::post('account_name', isset($account) ? $account->account_name : ''), array('class' => 'form-control ', 'placeholder' => 'Account name')); ?>
		<span><?php echo (isset($error_message['account_name']) ? $error_message['account_name'] : '') ?></span>
	</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Account number', 'account_no', array('class' => 'control-label')); ?>
		
		<?php echo Form::input('account_no', Input::post('account_no', isset($account) ? $account->account_no : ''), array('class' => 'form-control', 'placeholder' => 'Account no')); ?>
		<span><?php echo (isset($error_message['account_no']) ? $error_message['account_no'] : '') ?></span>
	</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Bank', 'bank', array('class' => 'control-label')); ?>

		<?php echo Form::input('bank', Input::post('bank', isset($account) ? $account->bank : ''), array('class' => 'form-control', 'placeholder' => 'Bank', '')); ?>
		<span><?php echo (isset($error_message['bank']) ? $error_message['bank'] : '') ?></span>
	</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Province', 'province', array('class'=>'control-label')); ?>

		<?php echo Form::input('province', Input::post('province', isset($account) ? $account->province : ''), array('class' => 'form-control', 'placeholder' => 'Province')); ?>
		<span><?php echo (isset($error_message['province']) ? $error_message['province'] : '') ?></span>
	</div>
		<div class="form-group col-sm-6 text-right">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
		<div class="form-group col-sm-3">
			<?php echo Html::anchor('account/index', 'Cancel', array('class' => 'btn btn-default')); ?>
		</div>
</fieldset>
<?php echo Form::close(); ?>
