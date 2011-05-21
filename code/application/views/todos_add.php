<?php $this->load->view('common/head');?>
<?php $this->load->view('common/header');?>
<?php $this->load->view('common/nav');?>

<?php echo validation_errors(); ?>
<?php echo form_open('todos/add_todo'); ?>
	<fieldset>
		<legend>Todo details</legend>
		<p>
			<label for="description">Todo description</label>
			<textarea name="description"></textarea>
		</p>
		<p>
			<label for="list">Todo list</label>
			<select name="list">
				<?php foreach($lists as $list)
				{
				?>
					<option value="<?php echo $list->list_id;?>"><?php echo $list->list_name;?></option>
				<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="urgency">Todo urgency</label>
			<select name="urgency">
				<?php foreach($urgency as $time)
				{
				?>
					<option value="<?php echo $time->urgency_id;?>"><?php echo $time->urgency_name;?></option>
				<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="time_required">Time required to complete</label>
			<input type="text" class="text" name="time_required" />
		</p>
	</fieldset>
	<p>
		<input type="submit" />
	</p>
</form>
<?php $this->load->view('common/footer'); ?>