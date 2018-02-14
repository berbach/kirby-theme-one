<?php snippet('header') ?>

<main class="page-main">

  <div class="page-headline header">
    <div class="container">
      <h1 style="color:<?php echo $headline_color ?>"><?php echo $page->title() ?></h1>
    </div>
  </div>

  <div class="page-text">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php echo $page->text()->kirbytext() ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
          <?php echo $page->sidebar()->kirbytext() ?>
        </div>
      </div>
    </div>

    <?php if($page->hasSubpage()): ?>
      <?php foreach($subpage as $item): ?>

        <div class="container page-text_sub">
          <h2><?php echo $item->title() ?></h2>

          <div class="row">
            <div class="col-md-6">
              <?php echo $item->text()->kirbytext() ?>
            </div>
            <div class="col-md-5 col-md-offset-1">
              <?php echo $item->sidebar()->kirbytext() ?>
            </div>
          </div>
        </div>

      <?php endforeach ?>
    <?php endif ?>
  </div>

</main>

<?php snippet('footer') ?>
