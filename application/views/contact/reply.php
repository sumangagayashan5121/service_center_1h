<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Reply to Contact</h5>
		</div>
	</div>
	<form action="reply_contact" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<input type="hidden" class="form-control" value="<?= $id_list['id'] ?>"  name="contact_id">
				<div class="col-md-12">
					Subject
					<input type="text" class="form-control" name="subject" required autocomplete="off">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					Reply
					<textarea id="reply" name="reply" rows="10" cols="220" required autocomplete="off"></textarea>
				</div>
			</div>


			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<button type="submit" class="btn btn-primary">create</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var action = "Reply to";
	var module = "Contact";
	var type = "info";
	var action_progress = "Replying to";
	var action_past = "replied to";
</script>

