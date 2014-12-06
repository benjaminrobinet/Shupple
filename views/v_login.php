<div class="container">	
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="col-xs-12 well">
				<h1><?=$lang['login']['login']?></h1>
				<?php if(isset($login_error) && !empty($login_error)) { ?>
				<div class="fade in alert alert-dismissable alert-danger">
				  	<button type="button" class="close" data-dismiss="alert">×</button>
				  	<?=$login_error?>
				</div>
				<?php } ?>
				<?php if(isset($login_complete)) { ?>
				<div class="fade in alert alert-dismissable alert-success">
				  	<button type="button" class="close" data-dismiss="alert">×</button>
				  	
				</div>
				<?php } ?>
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="login_username"><?=$lang['login']['username']?></label>
						<input type="text" class="form-control" id="login_username" name="username" placeholder="<?=$lang['login']['placeholder_username']?>">
					</div>
					<div class="form-group">
						<label for="login_password"><?=$lang['login']['password']?></label>
						<input type="password" class="form-control" id="login_password" name="password" placeholder="<?=$lang['login']['placeholder_password']?>">
					</div>
					<div class="checkbox">
						<label>
							<input name="stay_connected" type="checkbox"> <?=$lang['login']['stay_connected']?>
						</label>
					</div>
					<button type="submit" name="login" class="col-xs-12 col-sm-4 btn btn-primary"><?=$lang['login']['login']?></button>
				</form>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="col-xs-12 well">
				<h1><?=$lang['login']['register']?></h1>
				<?php if(isset($register_error) && !empty($register_error)) { ?>
				<div class="alert alert-dismissable alert-danger">
				  	<button type="button" class="close" data-dismiss="alert">×</button>
				  	<?=$register_error?>
				</div>
				<?php } ?>
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="register_username"><?=$lang['login']['username']?></label>
						<input type="text" class="form-control" id="register_username" name="username" placeholder="<?=$lang['login']['placeholder_username']?>">
					</div>
					<div class="form-group">
						<label for="register_email"><?=$lang['login']['email']?></label>
						<input type="email" class="form-control" id="register_email" name="email" placeholder="<?=$lang['login']['placeholder_email']?>">
					</div>
					<div class="form-group">
						<label for="register_password"><?=$lang['login']['password']?></label>
						<input type="password" class="form-control" id="register_password" name="password" placeholder="<?=$lang['login']['placeholder_password']?>">
					</div>
					<div class="form-group">
						<label for="confirm_password"><?=$lang['login']['confirm_password']?></label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?=$lang['login']['placeholder_password']?>">
					</div>
					<button type="submit" name="register" class="col-xs-12 col-sm-4 btn btn-primary"><?=$lang['login']['register']?></button>
				</form>
			</div>
		</div>
	</div>
</div>