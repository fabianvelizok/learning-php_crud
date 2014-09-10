<form action="/" class="form-horizontal" id="js-form" method="POST">

	<div class="control-group">
		<input type="hidden" id="action" name="action" required>
		<input type="hidden" id="userId" name="user_id" value="0" required>
	</div>

	<div class="control-group">
		<label class="control-label" for="userName">Name</label>
		<div class="controls">
			<input type="text" name="user_name" id="userName" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputPosition">Position</label>
		<div class="controls">
			<input type="text" name="user_position" id="userPosition" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputNick">Nick</label>
		<div class="controls">
			<input type="text" name="user_nick" id="userNick" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="selectStatus">Status</label>
		<div class="controls">
			<div class="algo">
				<select id="selectStatus" name="user_status" required>
					<option disabled="true">Select an option</option>
					<option value="active">Active</option>
					<option value="not_active">Not Active</option>
				</select>
				
			</div>
		</div>
	</div>


	<div class="control-group">
		<div class="controls">
			<input type="submit" class="js-btnForm btn btn-success btn-block" style="margin-top:20px;" value="Confirm">
		</div>
	</div>

</form>