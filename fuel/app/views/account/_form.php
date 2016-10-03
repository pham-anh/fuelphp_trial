<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Account name', 'account_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('account_name', Input::post('account_name', isset($account) ? $account->account_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Account name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Account no', 'account_no', array('class'=>'control-label')); ?>

				<?php echo Form::input('account_no', Input::post('account_no', isset($account) ? $account->account_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Account no')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank', 'bank', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank', Input::post('bank', isset($account) ? $account->bank : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Province', 'province', array('class'=>'control-label')); ?>

				<?php echo Form::input('province', Input::post('province', isset($account) ? $account->province : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Province')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>