<?php include(ROOT.'/views/layouts/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Каталог товаров</h2>
					<div class="panel-group category-products">

						<?php foreach($categories as $categoryItem): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a></h4>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Последние новости</h2>

					<?php foreach ($newsList as $newsItem): ?>
						<div class="post">
							<h2 class="title title_news"><a href="/news/<?php echo $newsItem['id']; ?>"><?php echo $newsItem['title']; ?></a></h2>
							<p class="byline"><?php echo $newsItem['date']; ?></p>
							<div class="entry">
								<p><?php echo $newsItem['short_content']; ?></p>
							</div>
							<div class="meta">
								<p class="links"><a href="/news/<?php echo $newsItem['id']; ?>" class="comments">Read More</a></p>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>