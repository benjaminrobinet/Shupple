<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><?=$lang['user']['settings']?></div>
		<div class="panel-body">
			<form method="post" action="#" class="form-horizontal">
				<fieldset>
					<legend class="settings-border-bottom">Gestion du profil <span class="help-block"><?=$lang['user']['help_manage_profile']?></span></legend>
					<?php if(isset($error_updateMsgs)) { ?>
						<div class="fade in alert alert-dismissable alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?=$error_updateMsgs?>
						</div>
					<?php } elseif(isset($success_updateMsg)) { ?>
						<div class="fade in alert alert-dismissable alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?=$success_updateMsg?>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="username" class="col-md-2 control-label"><?=$lang['user']['username']?></label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="username" name="username" value="<?=ucfirst($userData['username'])?>" placeholder="<?=$lang['user']['placeholder_username']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-2 control-label"><?=$lang['user']['email']?></label>
						<div class="col-md-8">
							<input type="email" class="form-control" id="email" name="email" value="<?=$userData['email']?>" placeholder="<?=$lang['user']['placeholder_email']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-md-2 control-label"><?=$lang['user']['description']?></label>
						<div class="col-md-8">
							<textarea placeholder="<?=$lang['user']['placeholder_description']?>" class="form-control" rows="2" id="description" name="description"><?=$userData['description']?></textarea>
							<span class="help-block"><?=$lang['user']['help_description']?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?=$lang['user']['type']?></label>
						<div class="col-md-10">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary <?php if($userData['type']==1) echo'active'?>">
									<input type="radio" name="type" id="public" value="public" <?php if($userData['type']==1) echo'checked';?>> <?=$lang['user']['public']?>
								</label>
								<label class="btn btn-primary <?php if($userData['type']==0) echo'active';?>">
									<input type="radio" name="type" id="private" value="private" <?php if($userData['type']==0) echo'checked';?>> <?=$lang['user']['private']?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-10 col-md-offset-2">
							<button type="submit" name="update" class="col-xs-12 col-sm-10 col-md-2 btn btn-primary"><?=$lang['user']['update']?></button>
						</div>
					</div>
				</fieldset>
			</form>
			<form id="pseudos" method="post" action="#pseudos" class="form-horizontal">
				<fieldset>
					<legend class="settings-border-bottom"><?=$lang['user']['manage_pseudo']?> <span class="help-block"><?=$lang['user']['help_manage_pseudo']?></span></legend>
					<?php if(isset($error_pseudosMsgs)) { ?>
					<div class="fade in alert alert-dismissable alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?=$error_pseudosMsgs?>
					</div>
					<?php } elseif(isset($success_pseudoMsg)) { ?>
						<div class="fade in alert alert-dismissable alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?=$success_pseudoMsg?>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="pseudo" class="col-md-2 control-label"><?=$lang['user']['add_pseudo']?></label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="<?=$lang['user']['placeholder_pseudo']?>">
						</div>
						<br class="hidden-md hidden-lg"/>
						<div class="col-xs-12 col-sm-3 col-md-2">
							<button type="submit" name="add" class="col-xs-12 col-sm-10 col-md-10 btn btn-success"><?=$lang['user']['add']?></button>
						</div>
					</div>
					<div class="form-group">
						<label for="remove_pseudo" class="col-md-2 control-label"><?=$lang['user']['remove_pseudo']?></label>
						<div class="col-md-8">
							<?php

							if(!empty($userData['pseudos'])) {
								$pseudos = explode(',', $userData['pseudos']);

								sort($pseudos);
								
								echo '<select class="form-control" name="remove_pseudo" id="remove_pseudo">';
								
								foreach($pseudos as $id => $pseudo) {
									if(!empty($pseudo)) echo '<option value="'.$id.'">'.$pseudo.'</option>';
								}
							}
							else {
								echo '<select class="form-control" name="remove_pseudo" id="remove_pseudo" disabled>';
								echo '<option value="-1">'.$lang['user']['no_pseudos'].'</option>';
							}

							?>
							</select>
						</div>
						<br class="hidden-md hidden-lg"/>
						<div class="col-xs-12 col-sm-3 col-md-2">
							<button type="submit" name="remove" class="col-xs-12 col-sm-10 col-md-10 btn btn-danger" <?php if(empty($userData['pseudos'])) echo 'disabled'; ?>><?=$lang['user']['remove']?></button>
						</div>
					</div>
				</fieldset>
			</form>
			<form method="post" id="pwd" action="#pwd" class="form-horizontal">
				<fieldset>
					<legend class="settings-border-bottom"><?=$lang['user']['change_password']?> <span class="help-block"><?=$lang['user']['help_change_password']?></span></legend>
					<?php if(isset($error_updatePwdMsgs)) { ?>
					<div class="fade in alert alert-dismissable alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?=$error_updatePwdMsgs?>
					</div>
					<?php } elseif(isset($success_updatePwdMsg)) { ?>
						<div class="fade in alert alert-dismissable alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?=$success_updatePwdMsg?>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="old_password" class="col-md-2 control-label"><?=$lang['user']['old_password']?></label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="old_password" name="old_password" placeholder="<?=$lang['user']['placeholder_password']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-2 control-label"><?=$lang['user']['password']?></label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="password" name="password" placeholder="<?=$lang['user']['placeholder_password']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="confirm_password" class="col-md-2 control-label"><?=$lang['user']['confirm_password']?></label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?=$lang['user']['placeholder_password']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-5 col-md-10 col-md-offset-2">
							<button type="submit" name="update_pwd" class="col-xs-12 col-sm-10 col-md-4 btn btn-primary"><?=$lang['user']['update_password']?></button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>