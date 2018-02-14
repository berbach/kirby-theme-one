<?php snippet('header') ?>

    <main class="page-main">

        <div class="page-headline" style="<?php e($header, 'background-image:url('.$header.')', '') ?>">
            <div class="container">
                <h1 style="color:<?php echo $headline_color ?>">
                    <?php echo $page->title() ?> <small><?php e($tag, $tag) ?></small>
                </h1>
            </div>
        </div>

        <div class="page-blog page-blog_list">
            <div class="container">
                <div class="row">

                    <?php foreach($list as $item): ?>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="page-blog_list__item">
                <?php $image = $item->images()->first()->toFile(); ?>
              <?php if($image): ?>
                <img src="<?php echo thumb($item->images()->first(), array('width' => 400, 'height' => 250, 'crop' => true))->url() ?>" alt="" width="400" height="250" />
              <?php endif ?>
              <h3><a href="<?php echo $item->url() ?>"><?php echo $item->title() ?></a></h3>
              <p><?php echo $item->intro() ?> <a href="<?php echo $item->url ?>"><?php echo l::get('read') ?></a></p>
                                <div class="page-blog_about">
                                    <small class="page-blog_about__type">
                                        <i class="fa fa-<?php echo $item->type() ?>" aria-hidden="true"></i>
                                    </small>
                                    <small class="page-blog_about__group">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d.m.Y', $item->date()) ?>
                                        <?php foreach($item->tags()->split(',') as $tag): ?>
                                            <div class="page-blog_about__tag">
                                                <i class="fa fa-tag" aria-hidden="true"></i>
                                                <a href="<?php echo url($page->url() . '/') ?>tag:<?php echo $tag ?>">
                                                    <?php echo $tag ?>
                                                </a>
                                            </div>
                                        <?php endforeach ?>
                                    </small>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>
        </div>

        <div class="page-blog_pagination">
            <nav>
                <ul class="text-center">
                    <?php if($pagination->hasPrevPage()): ?>
                        <li><a href="<?php echo $pagination->prevPageURL() ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                    <?php endif ?>

                    <?php foreach($pagination->range(3) as $r): ?>
                        <li><a class="<?php e($pagination->page() == $r, 'active') ?>" href="<?php echo $pagination->pageURL($r) ?>"><?php echo $r ?></a></li>
                    <?php endforeach ?>

                    <?php if($pagination->hasNextPage()): ?>
                        <li><a href="<?php echo $pagination->nextPageURL() ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>

    </main>

<?php snippet('footer') ?>