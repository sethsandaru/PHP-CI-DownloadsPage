
<div class="row">

	<?php if (isset($error)): ?>
		<div class="alert alert-danger">
			<p><?php echo $error; ?></p>
		</div>
	<?php endif; ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-user"></i> Quản lý chuyên mục
		</div>
		<div class="panel-body">

			<p>
				<a href="<?php echo base_url(); ?>index.php/admincp/category/edit/0" class="btn btn-success">
					<i class="fa fa-plus"></i> Thêm mới
				</a>
			</p>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tên</th>
						<th class="text-center">Số thứ tự</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($allCate) > 0): ?>
						<?php foreach ($allCate as $item): ?>
							<tr>
								<td><?php echo $item->name ?></td>
								<td class="text-center"><?php echo $item->position ?></td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>index.php/admincp/category/edit/<?php echo $item->id; ?>">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo base_url(); ?>index.php/admincp/category/delete/<?php echo $item->id; ?>">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="3" class="text-center">Chưa có chuyên mục nào cả :D!</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
