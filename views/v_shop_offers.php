<div class="container">
<?php if(isset($categoryError)):?>
	<div class="jumbotron">
		<h1><span class="text-danger"><?=$lang['404']['error']?></span></h1>
		<p>La catégorie <span class="text-info"><?=$req[0]?></span> n'existe pas ou plus.</p>
		<p><a href="<?=SHOPROOT?>offers" class="btn btn-primary btn-lg" role="button">Afficher toutes les offres</a></p>
	</div>
	<?php elseif(isset($offerError)): ?>
	<div class="jumbotron">
		<h1><span class="text-danger"><?=$lang['404']['error']?></span></h1>
		<p>L'offre <span class="text-info"><?=$req[1]?></span> n'existe pas ou plus.</p>
		<p><a href="<?=SHOPROOT?>offers" class="btn btn-primary btn-lg" role="button">Afficher toutes les offres</a></p>
	</div>
	<?php else: ?>
		<ul class="nav nav-tabs" role="tablist" id="categories">
	<?php
		$firstCategory = null;
		$categoriesOrderer = array();
		foreach($categories as $category) { ?>		
				<li><a id="<?=$category['id']?>" href="#c<?=$category['id']?>" role="tab" data-toggle="tab"><?=$category['name']?></a></li>
		<?php 
			if(!$askedCategory) $askedCategory = $category['id'];
			$categoriesOrderer[$category['id']] = $category;
		}
	?>
		</ul>
		<div class="tab-content">
	<?php

	$actualCategoryId = -1;
	$first = true;
	foreach ($offers as $offer) {
		if($actualCategoryId != $offer['category_id']) {
			if(!$first) echo '</div>';

			echo '<div class="tab-pane" id="c'.$offer['category_id'].'">';
			$actualCategoryId = $offer['category_id'];
		}
	?>
			<div><?=$categoriesOrderer[$offer['category_id']]['description']?></div>
			<div class="panel-group margin-bottom-5" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a id="tooltip" data-toggle="collapse" data-parent="#c<?=$offer['category_id']?>" href="#o<?=$offer['id']?>">
							 <?=$offer['name']?>
							</a>
						</h4>
					</div>
					<div id="o<?=$offer['id']?>" class="panel-collapse collapse">
						<div class="panel-body">
							<?=$offer['description']?>
						</div>
					</div>
				</div>
			</div>
		<?php
			$first = false;
		}
	?>
<?php endif; ?>
</div>
<script>
	$(document).ready(function(){
		$('a#tooltip').tooltip({
			placement: "top",
			trigger: 'hover',
			html: true,
			title: "Cliquez pour afficher l'offre"
		});

		$('#categories a[id=<?=$askedCategory?>]').tab('show');
	});
</script>