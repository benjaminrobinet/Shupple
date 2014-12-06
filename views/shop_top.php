<!DOCTYPE hl>
<html>
<head>
	<title><?=SiteName?></title>
	<link rel="stylesheet" href="<?=WEBROOT?>style/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=WEBROOT?>style/css/custom.css">
	<link rel="icon" type="image/png" href="<?=WEBROOT?>images/favicon.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
<!-- PAGE -->
<div class="page">
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="<?=WEBROOT?>"><?=SiteName?></a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($GLOBALS['page'] == "shop_home") echo 'class="active"'; ?>><a href="<?=SHOPROOT?>"><span class="glyphicon glyphicon-home"></span><span class="spacer"><?=$shop['name']?></span></a></li>
					<li <?php if($GLOBALS['page'] == "shop_offers") echo 'class="active"'; ?>><a href="<?=SHOPROOT?>offers"><span class="glyphicon glyphicon-list-alt"></span><span class="spacer"><?=$lang['shop_top']['offers']?></span></a></li>
					<li <?php if($GLOBALS['page'] == "shop_payments") echo 'class="active"'; ?>><a href="<?=SHOPROOT?>payements"><span class="glyphicon glyphicon-usd"></span><span class="spacer"><?=$lang['shop_top']['payments']?></span></a></li>
					<li class="<?=($GLOBALS['page'] == "shop_admin") ? 'dropdown active-administration' : 'dropdown administration'?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span><span class="spacer"><?=$lang['shop_top']['administration']?></span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header no-padding"><a href="<?=SHOPROOT?>admin/create_offer"><span class="glyphicon glyphicon-home"></span> <?=$lang['shop_top']['home']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/create_offer"><span class="glyphicon glyphicon-list-alt"></span><span class="spacer"><?=$lang['shop_top']['manage_offers']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/create_offer"><span class="glyphicon glyphicon-tag"></span><span class="spacer"><?=$lang['shop_top']['manage_categories']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/create_payment"><span class="glyphicon glyphicon-usd"></span><span class="spacer"><?=$lang['shop_top']['manage_payments']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/payments_history"><span class="glyphicon glyphicon-edit"></span><span class="spacer"><?=$lang['shop_top']['manage_news']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/sales_history"><span class="glyphicon glyphicon-list"></span><span class="spacer"><?=$lang['shop_top']['sales_history']?></span></a></li>
							<li><a href="<?=SHOPROOT?>admin/payments_history"><span class="glyphicon glyphicon-list"></span><span class="spacer"><?=$lang['shop_top']['payments_history']?></span></a></li>
						</ul>
					</li>
				</ul>			
				<ul class="login nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span><span class="spacer"><span class="hidden-sm"><?=$lang['top']['language']?></span></span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header"><?=$lang['top']['choose_your_language']?>:</li>
							<?php
								foreach($langs_list as $lang_code => $lang_name) {
									if($lang_code != $lang_id) echo '<li><a href="#" onclick="setLang(\''.$lang_code.'\');">'.$lang_name.'</a></li>';
								}
							?>
						</ul>
					</li>
					<?php if(!isConnected()) {
						echo '<li><a href="'.WEBROOT.'login"><span class="rotate glyphicon glyphicon-chevron-up"></span> '.$lang['top']['login'].' / '.$lang['top']['register'].'</a></li>';
						} else { ?>
						<li class="<?=($GLOBALS['page'] == "user" && $GLOBALS['req'][0] == "me") ? 'dropdown active' : 'dropdown'?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span class="spacer"><span class="hidden-sm"><?=ucfirst($_SESSION['username'])?></span></span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?=WEBROOT?>me"><span class="glyphicon glyphicon-user"></span> <?=$lang['top']['me']?></a></li>
								<li class="divider"></li>
								<li><a href="<?=WEBROOT?>me/settings"><span class="glyphicon glyphicon-cog"></span> <?=$lang['top']['settings']?></a></li>
								<li><a href="<?=WEBROOT?>me/shops"><span class="glyphicon glyphicon-shopping-cart"></span> <?=$lang['top']['shops']?></a></li>
								<li class="divider"></li>
								<li><a href="<?=WEBROOT?>logout"><span class="glyphicon glyphicon-off"></span> <?=$lang['top']['logout']?></a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- CONTENT -->
	<div class="content">