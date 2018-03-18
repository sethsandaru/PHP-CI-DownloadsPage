
<div class="row">

	<?php if (isset($error)): ?>
		<div class="alert alert-danger">
			<p><?php echo $error; ?></p>
		</div>
	<?php endif; ?>

	<?php if (isset($success)): ?>
		<div class="alert alert-success">
			<p><?php echo $success; ?></p>
		</div>
	<?php endif; ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-user"></i> Thông tin chuyên mục
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>index.php/admincp/category/addOrUpdate">
				<div class="form-group">
					<label for="name">Tên chuyên mục</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo (isset($item) ? $item->name : "") ?>" />
				</div>
				<div class="form-group">
					<label for="position">Số thứ tự</label>
					<input type="number" name="position" id="position" class="form-control" value="<?php echo (isset($item) ? $item->position : 0) ?>" />
				</div>

				<?php if (isset($item)): ?>
					<input type="hidden" name="id" value="<?php echo $item->id; ?>">
				<?php endif; ?>

				<button class="btn btn-success">Lưu lại</button>
			</form>
		</div>
	</div>
</div>
