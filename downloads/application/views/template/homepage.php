
<?php if (count($allItem) > 0) { ?>
	<?php foreach ($allItem as $item): ?>
	<div class="row" style="padding-bottom: 10px;">
		<div class="col-md-1">
			<a href="<?php echo base_url(); ?>index.php/item/<?php echo $item->pid; ?>">
				<img src="<?php echo base_url() . $item->image_url; ?>" class="image-thumb" style="max-width: 120px; max-height: 100px;" />
			</a>
		</div>
		<div class="col-md-11">
			<h3>
				<a href="<?php echo base_url(); ?>index.php/item/<?php echo $item->pid; ?>">
					<?php echo $item->title; ?>
				</a>
			</h3>
			<p>
				Chuyên mục: <b><?php echo $item->name ?></b> -
				Đăng bởi: <b><?php echo $item->username ?></b> -
				Vào lúc: <b><?php echo date('d/m/Y H:i', $item->created_date) ?></b>
			</p>
			<p>
				<?php
					if (strlen($item->content) >= 100)
						echo substr(strip_tags($item->content), 0, 100) . "...";
					else
						echo strip_tags($item->content);
				?>
			</p>
		</div>
	</div>
	<?php endforeach; ?>

	<div class="text-center">
		<?php echo $pagination; ?>
	</div>
<?php } else { ?>
	<div class="row">
		<p>Chưa có sản phẩm nào cả :D</p>
	</div>
<?php } ?>
