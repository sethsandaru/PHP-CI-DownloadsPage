
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-paperclip"></i> Thông tin bài viết
		</div>
		<div class="panel-body">
			<h3>
				<img src="<?php echo base_url() . $item->image_url; ?>" class="img-responsive" style="max-width: 120px; max-height: 100px; display: inline;" />
				<?php echo $item->title; ?>
			</h3>

			<table class="table table-bordered">
				<tr>
					<td width="20%">Ngày đăng</td>
					<td>
						<?php echo date('d/m/Y H:i', $item->created_date) ?>
					</td>
					<td rowspan="3" class="text-center">
						<a href="<?php echo $item->download_url; ?>" class="btn btn-success btn-lg">
							<i class="fa fa-download"></i> Tải về/Download
						</a>
					</td>
				</tr>
				<tr>
					<td width="20%">Đăng bởi</td>
					<td>
						<b><?php echo $item->username ?></b>
					</td>
				</tr>
				<tr>
					<td width="20%">Chuyên mục</td>
					<td>
						<b><?php echo $item->name ?></b>
					</td>
				</tr>
			</table>

			<div>
				<?php echo $item->content; ?>
			</div>
		</div>
	</div>
</div>
