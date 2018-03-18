
<div class="row">

	<?php if (isset($error)): ?>
	<div class="alert alert-danger">
		<p><?php echo $error; ?></p>
	</div>
	<?php endif; ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-user"></i> Đăng nhập vào hệ thống
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>index.php/admincp/doLogin">
				<table class="table table-bordered">
					<tr>
						<td width="15%">Username</td>
						<td width="35%">
							<input class="form-control" type="text" name="username" required />
						</td>
						<td width="15%">Password</td>
						<td width="35%">
							<input class="form-control" type="password" name="password" required />
						</td>
					</tr>
					<tr>
						<td colspan="4" class="text-center">
							<button class="btn btn-primary">Đăng nhập</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
