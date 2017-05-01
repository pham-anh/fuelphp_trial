/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function ()
{
    // Checkbox synchronization
    $('#todo_list input[type=checbox]').change(function ()
    {
	var $this = $(this);
	$.post(
		uriBase + 'project/change_task_status',
		{
		    'task_id': $this.data('task_id'),
		    'new_status': $this.is(':checked') ? 1 : 0
		}

	);
    });
});
