<?php snippet('header') ?>

<main class="page-main">

  <div class="page-headline" style="<?php e($header, 'background-image:url('.$header.')', '') ?>">
    <div class="container">
      <h1 style="color:<?php echo $headline_color ?>"><?php echo $page->title() ?></h1>
    </div>
  </div>

  <div class="page-blog page-blog_post">
    <div class="container">
      <div class="row">

        <div class="col-md-8">

          <?php echo $page->text()->kirbytext() ?>

        </div>
      </div>
    </div>

    <!-- space for gallery or else -->

    <div class="container">
      <div class="row">
        <div class="col-md-8">

            <div class="page-blog_about">
                <small class="page-blog_about__type">
                    <i class="fa fa-<?php echo $page->type() ?>" aria-hidden="true"></i>
                </small>
                <small class="page-blog_about__group">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d.m.Y', $page->date()) ?>
                    <?php foreach($page->tags()->split(',') as $tag): ?>
                        <div class="page-blog_about__tag">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <a href="<?php echo url($page->url() . '/') ?>../tag:<?php echo $tag ?>">
                                <?php echo $tag ?>
                            </a>
                        </div>
                    <?php endforeach ?>
                </small>
            </div>

        </div>
      </div>
    </div>
  </div>

</main>

<?php snippet('footer') ?>
