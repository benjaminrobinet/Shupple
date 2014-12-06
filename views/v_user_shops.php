<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php 
			foreach ($shopsList as $shop) { 
			?>
				<div class="panel panel-default">
					<div class="panel-heading"><?=$shop['name']?></div>
					<div class="panel-body">
						<?=$shop['description']?>
						<div class="pull-right">
							<a href="<?=WEBROOT."index.php?shop=".$shop['shop_id']?>" class="btn btn-info"><?=$lang['user']['go_to_shop']?></a>
							<?php /* href="http://<?=$createdShop['id'].'.'.HTTP_HOST?>"*/ ?>
							<?php if($me){ ?>
							<button data-toggle="modal" data-target="#modal-<?=$shop['id']?>" class="btn btn-danger"><?=$lang['user']['delete']?></button>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modal-<?=$shop['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false">
					<form action="" method="post">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title"><?=$lang['user']['delete']?></h4>
								</div>
								<div class="modal-body">
									<div class="shopForm form-group">
										<label for="name">Veuillez écrire le nom de votre boutique pour confirmer la suppression</label>
										<input type="text" autocomplete="off" class="form-control" id="shopNameInput" placeholder="Entrez le nom de la boutique">
										<input type="hidden" id="shopNameVal" value="<?=$shop['name']?>">
										<input type="hidden" id="shop_id" name="shop_id" value="<?=$shop['id']?>">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
									<button type="submit" id="deleteButton" name="delete" class="btn btn-danger" disabled>Confirmer</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			<?php }
			if(count($shopsList) == 0) { ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= ($me) ? $lang['user']['you_have_no_shop'] : $lang['user']['no_shop']?></div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<script src="<?=WEBROOT?>style/js/user.js"></script>