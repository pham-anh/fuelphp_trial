<ul id="todo_list" data-project_id="<?php echo $project->id ?>"
	<?php foreach ($project->tasks as $task): ?>
		<?php $input_id = 'todo_item_'.$task->id; ?>
	<li>
		<input
			type="checkbox"
			autocomplete="off"
			id="<?php echo $task->id; ?>"
			data-task_id="<?php echo $task->id; ?>"
			<?php echo $task->status ? 'check' : ''; ?>
		>
		<label for="<?php echo $input_id; ?>">
			<?php echo $task->name; ?>
		</label>
	</li>
	<?php endforeach; ?>
</ul>
<?php echo render('task/create', array('project' => $project)); ?>