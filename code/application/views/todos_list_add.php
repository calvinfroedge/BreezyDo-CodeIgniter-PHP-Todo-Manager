<?php $this->load->view('common/head');?>
<?php $this->load->view('common/header');?>
<?php $this->load->view('common/nav');?>

<?php echo validation_errors(); ?>
<?php echo form_open('todos/add_list'); ?>
	<fieldset>
		<legend>List details</legend>
		<p>
			<label for="list_name">List name</label>
			<input type="text" class="text" name="list_name" />
		</p>
	</fieldset>
	<p>
		<input type="submit" />
	</p>
</form>
<?php $this->load->view('common/footer'); ?>