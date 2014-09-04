<form class="form-horizontal" id="js-form" action="#" method="POST">

	<div class="control-group">
		<label class="control-label" for="inputName">Name</label>
		<div class="controls">
			<input type="text" name="userName" id="inputName">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputPosition">Position</label>
		<div class="controls">
			<input type="text" name="userPosition" id="inputPosition">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputNick">Nick</label>
		<div class="controls">
			<input type="text" name="userNick" id="inputNick">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="selectStatus">Status</label>
		<div class="controls">
			<select id="selectStatus">
				<option data="default">Select an option</option>
				<option value="active">Active</option>
				<option value="not_active">Not Active</option>

			</select>
		</div>
	</div>


	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success btn-block" style="margin-top:20px;">Confirm</button>
		</div>
	</div>

</form>