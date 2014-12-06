<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-push-8 col-xs-12">
			<h1 class="no-margin-top"><?=($newsNbr == 1) ? $lang['shop_home']['a_news'] : $lang['shop_home']['news']?></h1>
			<?php 
			foreach($newsList as $news) {
			?>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-primary">
						<div class="panel-heading word-wrap"><?=$news['title']?></div>
						<div class="panel-body word-wrap">
							<?=$news['news']?>
						</div>

					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="col-md-8 col-md-pull-4 col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="no-margin-top"><?=($categoriesNbr == 1) ? $lang['shop_home']['category'] : $lang['shop_home']['categories']?></h1>
					<div class="row">
					<?php
					if($categoriesNbr == 0) {
					?>
						<div class="col-xs-12">
							<div class="well">
								<p>Cette boutique n'a aucune catégorie.</p>
							</div>
						</div>
					<?php
					}
					else {
						foreach ($categoriesList as $categorie) {
					?>
						<div class="<?php if($categoriesNbr > 2) echo 'col-md-6 '?>col-xs-12">
							<div class="thumbnail">
								<div class="caption">
									<div class="row">
										<div class="col-sm-4 hidden-xs hidden-sm"><img class="img-responsive" src="<?=WEBROOT?>images/thumb.png" alt="..."></div>
										<h3 class="col-xs-12 col-sm-8"><?=$categorie['name']?></h3>
									</div>
									<p class="word-wrap equalHeight"><?=$categorie['description']?></p>
									<a href="<?=SHOPROOT.'offers/'.$categorie['name']?>" class="full-width btn btn-info bottom" role="button">Aller dans la catégorie</a>
								</div>
							</div>
						</div>
					<?php
						}
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=WEBROOT?>style/js/equalHeight.js"></script>