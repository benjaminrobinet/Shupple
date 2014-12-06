<div class="container">
	<?php if(isset($createdShop)) { ?>
	<div class="jumbotron">
		<h1><span class="text-success"><?=$lang['create']['well_done']?></span></h1>
		<p><?=$lang['create']['shop_created']?></p>
		<p><a href="<?=WEBROOT.'index.php?shop='.$createdShop['id'].'&'?>" class="btn btn-primary btn-lg" role="button"><?=$lang['create']['go_to'].' <strong>'.$createdShop['name']?></strong></a></p>
	<?php /* href="http://<?=$createdShop['id'].'.'.HTTP_HOST?>"*/ ?>
	</div>	
	<?php } else { ?>
	<div class="panel panel-default">
		<div class="panel-heading"><?=$lang['create']['create_my_shop']?></div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal">
				<fieldset>
					<?php if(isset($errorMsgs)) { ?>
						<div class="fade in alert alert-dismissable alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?=$errorMsgs?>
						</div>
					<?php } ?>
					<legend><?=$lang['create']['create_my_shop']?></legend>
					<div class="form-group">
						<label for="name" class="col-md-2 control-label"><?=$lang['create']['name_of_the_shop']?></label>
						<div class="col-md-10">
							<input autocomplete="off" type="text" class="form-control" id="name" name="name" placeholder="Enter a name">
							<span style="display:none" id="name_help" class="help-block"><?=$lang['create']['will_be_accesible_to']?> <strong id=""><span id="name_val_help">name</span>.ndd.tld</strong></span>
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-md-2 control-label"><?=$lang['create']['description']?></label>
						<div class="col-md-10">
							<textarea class="form-control" rows="3" id="description" name="description" required placeholder="<?=$lang['create']['placeholder_description']?>"></textarea>
							<span class="help-block"><?=$lang['create']['help_description']?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?=$lang['create']['type_of_shop']?></label>
						<div class="col-md-10">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary active">
									<input type="radio" name="type" id="public" value="public" checked> <?=$lang['create']['public_shop']?>
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="type" id="private" value="private"> <?=$lang['create']['private_shop']?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button onclick="history.go(-1);return false;" class="btn btn-default"><?=$lang['create']['cancel']?></button>
							<button type="submit" name="create" id="create" class="btn btn-primary" disabled><?=$lang['create']['create']?></button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<?php } ?>
</div>
<script src="<?=WEBROOT?>style/js/create.js"></script>