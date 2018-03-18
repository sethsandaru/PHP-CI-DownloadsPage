
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js" type="application/javascript"></script>

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
			<i class="fa fa-user"></i> Thông tin bài viết
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>index.php/admincp/item/addOrUpdate" enctype="multipart/form-data">
				<div class="form-group">
					<label for="category_id">Chuyên mục bài viết</label>
					<select name="category_id" id="category_id" class="form-control">
						<?php foreach ($allCate as $cate): ?>
							<option value="<?php echo $cate->id; ?>" <?php echo (isset($item) ? ($item->category_id == $cate->id ? "selected" : "") : ""); ?>><?php echo $cate->name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="title">Tiêu đề</label>
					<input type="text" name="title" id="title" class="form-control" value="<?php echo (isset($item) ? $item->title : "") ?>" />
				</div>

				<div class="form-group">
					<label for="content">Nội dung</label>
					<textarea name="content" id="content"><?php echo (isset($item) ? $item->content : "") ?></textarea>
				</div>

				<div class="form-group">
					<label for="download_url">Đường dẫn tải về/Link download</label>
					<input type="text" name="download_url" id="download_url" class="form-control" value="<?php echo (isset($item) ? $item->download_url : "") ?>">
				</div>

				<div class="form-group">
					<label for="image">Hình ảnh đại diện</label>
					<img src="<?php echo (isset($item) ? base_url() . $item->image_url : "") ?>" class="img-responsive" style="max-width: 120px; max-height: 100px;" /> <br/>
					<input type="file" name="image" id="image" class="form-control" accept="image/*">
				</div>

				<?php if (isset($item)): ?>
					<input type="hidden" name="id" value="<?php echo $item->pid; ?>">
				<?php endif; ?>

				<button class="btn btn-success">Lưu lại</button>
			</form>
		</div>
	</div>
</div>

<script>
	CKEDITOR.replace( 'content' );
</script>
