<?php snippet('header') ?>

<div class="page-fullscreen big-header" >
  <div class="page-fullscreen_wrap">
    <div class="container">
      <?php if($page->imagetitle() != '' || $page->slider()  != ''): ?>
      <div class="page-fullscreen_headline load-headline">
        <?php if($page->imagetitle() != ''): ?>
          <?php echo $page->imagetitle() ?><br />
        <?php endif ?>
        <?php if($page->slider() != ''): ?>
          <span class="text-slide" data-slogans='<?php echo $slider ?>'>
            <?php echo $first_slide ?>
          </span>
        <?php endif ?>
      </div>
    <?php endif ?>
      <div class="row teaser-fullscreen">
        <?php if($page->teaser_1() != ''): ?>
          <div class="col-md-4 col-xs-12">
            <div class="page-fullscreen_box load-box1">
              <div class="row">
                <?php if ($page->teaser_1_icon() != ''): ?>
                  <div class="col-md-3">
                    <i class="fa fa-<?php echo $page->teaser_1_icon() ?> fa-4x" aria-hidden="true"></i>
                  </div>
                <?php endif ?>
                <div class="<?php e($page->teaser_1_icon() != '', 'col-md-9', 'col-md-12') ?>">
                  <h3><?php echo $pages->find($page->teaser_1())->title() ?></h3>
                  <?php echo $pages->find($page->teaser_1())->intro()->kirbytext() ?>
                  <p>
                    <a href="<?php echo $pages->find($page->teaser_1())->uri() ?>"><?php echo l::get('continue') ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        <?php endif ?>
          
        <?php if($page->teaser_2() != ''): ?>
          <div class="col-md-4 col-xs-12">
            <div class="page-fullscreen_box load-box1">
              <div class="row">
                <?php if ($page->teaser_2_icon() != ''): ?>
                  <div class="col-md-3">
                    <i class="fa fa-<?php echo $page->teaser_2_icon() ?> fa-4x" aria-hidden="true"></i>
                  </div>
                <?php endif ?>
                <div class="<?php e($page->teaser_2_icon() != '', 'col-md-9', 'col-md-12') ?>">
                  <h3><?php echo $pages->find($page->teaser_2())->title() ?></h3>
                  <?php echo $pages->find($page->teaser_2())->intro()->kirbytext() ?>
                  <p>
                    <a href="<?php echo $pages->find($page->teaser_2())->uri() ?>"><?php echo l::get('continue') ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
        <?php if($page->teaser_3() != ''): ?>
          <div class="col-md-4 col-xs-12">
            <div class="page-fullscreen_box load-box1">
              <div class="row">
                <?php if ($page->teaser_3_icon() != ''): ?>
                  <div class="col-md-3">
                    <i class="fa fa-<?php echo $page->teaser_3_icon() ?> fa-4x" aria-hidden="true"></i>
                  </div>
                <?php endif ?>
                <div class="<?php e($page->teaser_3_icon() != '', 'col-md-9', 'col-md-12') ?>">
                  <h3><?php echo $pages->find($page->teaser_3())->title() ?></h3>
                  <?php echo $pages->find($page->teaser_3())->intro()->kirbytext() ?>
                  <p>
                    <a href="<?php echo $pages->find($page->teaser_3())->uri() ?>"><?php echo l::get('continue') ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<main class="page-main">

  <?php if($page->text_blocks() != ''): ?>

  <div class="page-quad">
    <div class="container">
      <?php $i=0; foreach($page->text_blocks()->toStructure() as $block): ?>

      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-1 col-xs-1">
              <i class="fa fa-<?php echo $page->font_icon() ?> fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-md-10 col-xs-11">
              <h4><?php echo $block->text_a_title() ?></h4>
              <?php echo $block->text_a()->kirbytext() ?>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-1 col-xs-1">
              <i class="fa fa-<?php echo $page->font_icon() ?> fa-2x" aria-hidden="true"></i>
            </div>
            <div class="col-md-10 col-xs-11">
              <h4><?php echo $block->text_b_title() ?></h4>
              <?php echo $block->text_b()->kirbytext() ?>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
      </div>
      <?php $i++; endforeach ?>

    </div>
  </div>
<?php endif ?>

    <?php if($page->gallery() != ''): ?>
        <div class="page-gallery">
            <div class="grid">
                <?php foreach($page->gallery()->toStructure() as $galleryItem): $image = $galleryItem->picture()->toFile(); ?>
                   <?php if ($image): ?>
                    <div class="grid-item" style="background-image:url('<?php echo thumb($image, array('width' => 400, 'height' => 200, 'crop' => true))->url() ?>')">
                        <a class="grid-item_link lightbox" href="<?php echo $image->url() ?>" rel="gallery" title="<?php echo $galleryItem->title() ?>">
                            <strong><?php echo $galleryItem->title()->excerpt(35) ?></strong><br />
                            <?php echo $galleryItem->subtitle() ?>
                        </a>
                    </div>
                  <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>

<?php if($page->feedback() != ''): ?>
  <div class="page-feedback">
    <div class="container">
      <?php if($page->feedback_headline() != ''): ?>
        <div class="row">
          <div class="col-md-12 text-center">
            <h3><?php echo $page->feedback_headline()->text() ?></h3>
          </div>
        </div>
      <?php endif ?>
      <div id="carousel-feedback" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php $i=0; foreach($page->feedback()->toStructure() as $item): ?>
            <div class="item <?php e($i == 0, 'active') ?>">
              <div class="carousel-caption">
                &raquo;<?php echo $item->text() ?>&laquo;
              </div>
            </div>
          <?php $i++; endforeach ?>
        </div>

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php $i=0; foreach($page->feedback()->toStructure() as $item): ?>
            <li data-target="#carousel-feedback" data-slide-to="<?php echo $i ?>" class="<?php e($i == 0, 'active') ?>"></li>
          <?php $i++; endforeach ?>
        </ol>

        <!-- Controls -->
        <div class="text-center">
          <a class="left carousel-control" href="#carousel-feedback" role="button" data-slide="prev">
            <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
            <span class="sr-only"><?php echo l::get('previous') ?></span>
          </a>
          <a class="right carousel-control" href="#carousel-feedback" role="button" data-slide="next">
            <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
            <span class="sr-only"><?php echo l::get('next') ?></span>
          </a>
        </div>

      </div>
    </div>
  </div>
<?php endif ?>


</main>

<?php snippet('footer') ?>
