<ul class="nav">
	<li <?php if($this->current_method == 'index') echo 'class="current"'?>>
		<a href="/">Your To-dos</a>
	</li>
	<li <?php if($this->current_method == 'add_todo') echo 'class="current"'?>>
		<a href="/todos/add_todo">Add a to-do</a>
	</li>
	<li <?php if($this->current_method == 'add_list') echo 'class="current"'?>>
		<a href="/todos/add_list">Add a new list</a>
	</li>
	<li <?php if($this->current_method == 'add_urgency') echo 'class="current"'?>>
		<a href="/todos/add_urgency">Add urgency</a>
	</li>
</ul>