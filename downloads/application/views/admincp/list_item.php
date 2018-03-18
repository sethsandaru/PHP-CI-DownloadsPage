
<div class="row">

	<?php if (isset($error)): ?>
		<div class="alert alert-danger">
			<p><?php echo $error; ?></p>
		</div>
	<?php endif; ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-user"></i> Quản lý bài viết
		</div>
		<div class="panel-body">

			<p>
				<a href="<?php echo base_url(); ?>index.php/admincp/item/edit/0" class="btn btn-success">
					<i class="fa fa-plus"></i> Thêm mới
				</a>
			</p>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tiêu đề</th>
						<th class="text-center">Chuyên mục</th>
						<th class="text-center">Tạo vào ngày</th>
						<th class="text-center">Tạo bởi</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($allItem) > 0): ?>
						<?php foreach ($allItem as $item): ?>
							<tr>
								<td>
									<?php echo $item->title ?>
								</td>
								<td class="text-center"><?php echo $item->name ?></td>
								<td class="text-center"><?php echo date('d/m/Y H:i:s', $item->created_date) ?></td>
								<td class="text-center"><?php echo $item->username ?></td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>index.php/admincp/item/edit/<?php echo $item->pid; ?>">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo base_url(); ?>index.php/admincp/item/delete/<?php echo $item->pid; ?>">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">Chưa có bài viết nào cả :D!</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

			<div class="text-center">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</div>
