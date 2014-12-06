<div class="container">
	<?php if(isset($errorMsg)) { ?>
	<div class="jumbotron">
		<h1><span class="text-danger"><?=$lang['error']['error']?></span></h1>
		<p><?=$errorMsg?></p>
		<p><a href="<?=WEBROOT?>" class="btn btn-primary btn-lg" role="button"><?=$lang['error']['go_back']?></a></p>
	</div>
	<?php } else { ?>
	<div class="row">
		<?php
		if($userData['type'] == 0) { ?>
		<div class="col-xs-12">
			<div class="alert alert-info"><?= ($me) ? $lang['user']['your_profile_is_private'] : $lang['user']['profile_is_private']?></div>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-md-4 col-md-push-8">
			<div class="panel panel-default">
			<div class="panel-heading"><?=$lang['user']['informations']?></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-7 col-xs-7">
							<ul class="list-group no-margin">
								<li class="list-group-item">
									<h4 class="list-group-item-heading"><?=$lang['user']['username']?>:</h4>
									<p><?=ucfirst($userData['username']).' '.$badge?></p>
								</li>
								<li class="list-group-item">
									<h4 class="list-group-item-heading"><?=$lang['user']['email']?>:</h4>
									<p><?=$userData['email']?></p>
								</li>
							</ul>
						</div>
						<div class="col-md-5 col-xs-5">
							<img class="img-responsive img-rounded float-right pp" src="http://www.gravatar.com/avatar/<?=md5($userData['email'])?>?s=150&d=http://shupple.com/images/thumb.png" title="<?=$userData['username']?>" alt="<?=$userData['username']?>">
						</div>
						<div class="col-xs-12 col-md-12">
							<ul class="list-group no-margin">
								<li class="list-group-item">
									<h4 class="list-group-item-heading"><?=$lang['user']['description']?>:</h4>
									<p><?=(empty($userData['description'])) ? '<i>'.$lang['user']['no_description'].'</i>' : $userData['description'] ?></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-8 col-md-pull-4">
			<div class="panel panel-default">
			<div class="panel-heading">Title</div>
				<div class="panel-body">
					Content
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>