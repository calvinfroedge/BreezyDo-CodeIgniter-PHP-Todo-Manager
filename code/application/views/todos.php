<?php $this->load->view('common/head');?>
<?php $this->load->view('common/header');?>
<?php $this->load->view('common/nav');?>
<?php echo validation_errors(); ?>
<?php echo form_open('todos'); ?>
	<table>
		<thead>
			<tr>
				<th>
					Todo description
				</th>
				<th>
					List
				</th>
				<th>
					Urgency
				</th>
				<th>
					Time required
				</th>
				<th>
				</th>
				<th>
				</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($todos as $todo)
{
?>
	<tr>
			<td>
				<?php echo $todo->todo_description;?>
			</td>
			<td>
				<?php echo $todo->list_name;?>
			</td>
			<td>
				<?php echo $todo->urgency_name;?>
			</td>
			<td>
				<?php echo $todo->time_required;?>
			</td>
			<td>
				<input type="checkbox" class="checkbox" name="complete_<?php echo $todo->todo_id;?>" />
				Complete
			</td>
			<td>
				<input type="checkbox" class="checkbox" name="delete_<?php echo $todo->todo_id;?>" />
				Delete
			</td>
	</tr>
<?php
}
?>
		</tbody>
	</table>
	
	<p>
		<input type="submit" name="submit" />
	</p>
	
</form>
<?php $this->load->view('common/footer'); ?>