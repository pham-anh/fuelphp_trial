
<?php echo Form::open(array("class" => "center-block")); ?>

<fieldset>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Account name', 'account_name', array('class' => 'control-label')); ?>
		
			<?php echo Form::input('account_name', Input::post('account_name', isset($account) ? $account->account_name : ''), array('class' => 'form-control ', 'placeholder' => 'Account name')); ?>
		
	</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Account no', 'account_no', array('class' => 'control-label col-sm-4')); ?>
		
			<?php echo Form::input('account_no', Input::post('account_no', isset($account) ? $account->account_no : ''), array('class' => 'form-control col-sm-8', 'placeholder' => 'Account no')); ?>

	</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Bank', 'bank', array('class' => 'control-label text-overflow')); ?>

			<?php echo Form::input('bank', Input::post('bank', isset($account) ? $account->bank : ''), array('class' => 'form-control', 'placeholder' => 'Bank', '')); ?>

		</div>
	<div class="form-group col-sm-6">
		<?php echo Form::label('Province', 'province', array('class'=>'control-label')); ?>

			<?php echo Form::input('province', Input::post('province', isset($account) ? $account->province : ''), array('class' => 'form-control', 'placeholder' => 'Province')); ?>

		</div>
		<div class="form-group col-sm-6 text-right">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
		<div class="form-group col-sm-3">
			<?php echo Html::anchor('account', 'Cancel', array('class' => 'btn btn-default')); ?>
		</div>
</fieldset>
<?php echo Form::close(); ?>
