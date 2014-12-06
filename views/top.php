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
	<?php include('includes/analytics.php') ?>
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
					<li <?php if($GLOBALS['page'] == "home") echo 'class="active"'; ?>><a href="<?=WEBROOT?>"><span class="glyphicon glyphicon-home"></span><span class="spacer"><?=$lang['top']['home']?></span></a></li>
					<li <?php if($GLOBALS['page'] == "create") echo 'class="active"'; ?>><a href="<?=WEBROOT?>create"><span class="glyphicon glyphicon-plus"></span><span class="spacer"><?=$lang['top']['create']?></span></a></li>
					<li class="<?=($GLOBALS['page'] == "shops") ? 'dropdown active' : 'dropdown'?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span><span class="spacer"><?=$lang['top']['shops']?></span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header"><?=$lang['top']['order_by']?>:</li>
							<li><a href="<?=WEBROOT?>shops/mostsales"><span class="glyphicon glyphicon-usd"></span> <?=$lang['top']['most_sales']?></a></li>
							<li><a href="<?=WEBROOT?>shops/mostviews"><span class="glyphicon glyphicon-eye-open"></span> <?=$lang['top']['most_views']?></a></li>
							<li><a href="<?=WEBROOT?>shops/bestprogress"><span class="glyphicon glyphicon-arrow-up"></span> <?=$lang['top']['best_progress']?></a></li>
						</ul>
					</li>
					<li><a onclick="toggleSearch()" href="#"><span class="glyphicon glyphicon-search"></span><span class="spacer"><?=$lang['top']['search']?></span></a></li>
				</ul>			
				<ul class="login nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span><span class="spacer"><?=$lang['top']['language']?></span><b class="caret"></b></a>
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
						<li class="<?=($me) ? 'dropdown active' : 'dropdown'?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span class="spacer"><?=ucfirst($_SESSION['username'])?></span><b class="caret"></b></a>
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
	<div id="search-sm" class="container" style="display:none">
		<div class="panel panel-default">
		  	<div class="panel-body">
			    <form class="form-inline" method="GET" action="<?=WEBROOT?>search/">
		    		<div class="no-padding form-group col-sm-10">
		    			<label class="sr-only" for="search_sm"><?=$lang['top']['find_a_shop']?></label>
						<input type="text" id="search_sm" name="search" class="form-control full-width" placeholder="<?=$lang['top']['find_a_shop']?>">
					</div>
					<button type="submit" class="col-xs-12 col-sm-2 btn btn-primary"><?=$lang['top']['search']?></button>		
				</form>
		  	</div>
		</div>
	</div>
	<!-- CONTENT -->
	<div class="content">