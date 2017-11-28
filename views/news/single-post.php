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

      <div class="col-sm-7 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Новость в категории: <?php echo $news_category['name']; ?></h2>

          <div class="post">
            <h2 class="title title_news"><a href="#"><?php echo $newsList['title']; ?></a></h2>
            <p class="byline">Posted by: <strong style='font-size:20px; color:#FE980F; padding-right:25px;'><?php echo $newsList['author_name']; ?></strong> in: <?php echo $newsList['date']; ?></p>
            <div class="entry">
              <p><?php echo $newsList['content']; ?></p>
            </div>
            <div class="meta">
              <p class="links"><a href="/news/" class="comments">Back to all news</a></p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<?php include(ROOT.'/views/layouts/footer.php'); ?>