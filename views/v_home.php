<div class="container">
	<?php if(isset($successMsg)) { ?>
	<div class="alert alert-dismissable alert-success">
  		<button type="button" class="close" data-dismiss="alert">×</button>
  		<?=$successMsg?>
	</div>
	<?php } ?>
	<div class="col-xs-12 jumbotron">
		<h1><?=SiteName?></h1>
		<p><?=$lang['home']['site_explanation']?></p>
		<p><a href="<?=WEBROOT?>create" class="col-xs-12 btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> <?=$lang['home']['create_my_shop']?></a></p>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<div class="equalHeight thumbnail">
				<div class="caption">
					<p class="hidden-xs text-center">
						<span class="glyphicon glyphicon-thumbs-up glyphicon-large"></span>
					</p>
					<h3><?=$lang['home']['easy_to_use']?></h3>
					<p><?=$lang['home']['easy_to_use_explanation']?></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="equalHeight thumbnail">
				<div class="caption">
					<p class="hidden-xs text-center">
						<span class="glyphicon glyphicon-usd glyphicon-large"></span>
					</p>
					<h3><?=$lang['home']['free']?></h3>
					<p><?=$lang['home']['free_explanation']?></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="equalHeight thumbnail">
				<div class="caption">
					<p class="hidden-xs text-center">
						<span class="glyphicon glyphicon-folder-open glyphicon-large"></span>
					</p>
					<h3><?=$lang['home']['open_source']?></h3>
					<p><?=$lang['home']['open_source_explanation']?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<div class="container">
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
			<li data-target="#carousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?=WEBROOT?>images/slider/1.jpg" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Example headline.</h1>
						<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="<?=WEBROOT?>images/slider/1.jpg" alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Another example headline.</h1>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="<?=WEBROOT?>images/slider/1.jpg" alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>One more for good measure.</h1>
						<p>KOUKOUUUUUUUUUU LAAAAAAAWL. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>-->
<script src="<?=WEBROOT?>style/js/equalHeight.js"></script>