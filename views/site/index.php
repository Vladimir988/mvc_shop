<?php include(ROOT.'/views/layouts/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Каталог</h2>
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
					<h2 class="title text-center">Последние товары</h2>

					<?php foreach($latestProduct as $product): ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
										<h2>$<?php echo $product['price'] ?></h2>
										<p><a href="/product/<?php echo $product['id'] ?>"><?php echo $product['name']; ?></a></p>
										<a href="/cart/add/<?php echo $product['id']; ?>" data-id="<?php echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
									</div>
									<?php if( $product['is_new']): ?>
										<img src="/template/images/home/new.png" class="new" alt="new">
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div><!--features_items-->

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Рекомендуемые товары</h2>

					<div class="cycle-slideshow" 
							 data-cycle-fx=carousel
							 data-cycle-timeout=5000
							 data-cycle-carousel-visible=4
							 data-cycle-carousel-fluid=true
							 data-cycle-slides="div.item"
							 data-cycle-prev="#prev"
							 data-cycle-next="#next">

							<?php foreach($recomendedProducts as $recomendedProduct): ?>
								<div class="item">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
												<h2>$<?php echo $recomendedProduct['price']; ?></h2>
												<p><a href="/product/<?php echo $recomendedProduct['id']; ?>"><?php echo $recomendedProduct['name']; ?></a></p>
												<a href="/cart/add/<?php echo $recomendedProduct['id']; ?>" data-id="<?php echo $recomendedProduct['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
											</div>
											<?php if($recomendedProduct['is_new']): ?>
												<img src="/template/images/home/new.png" class="new" alt="new">
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						</div><!-- /cycle-slideshow -->
						<a class="left recommended-item-control" id="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" id="next">
							<i class="fa fa-angle-right"></i>
						</a>
				</div><!--/recommended_items-->

			</div>
		</div>
	</div>
</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>