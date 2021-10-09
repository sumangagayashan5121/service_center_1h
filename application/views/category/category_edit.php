<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Category</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/CategoryController/update_category" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Description
					<input type="text" class="form-control" value="<?= $category['description'] ?>" required autocomplete="off"
						   name="description">
					<input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="category_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var action = "Edit";
	var module = "Category";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>

