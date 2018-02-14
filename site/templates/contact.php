<?php snippet('header') ?>

<div class="page-headline" style="<?php e($header, 'background-image:url(' . $header . ')', '') ?>">
    <div class="container">
        <h1 style="color:<?php echo $headline_color ?>"><?php echo $page->title() ?></h1>
    </div>
</div>

<div class="page-contact">
    <div class="page-contact_form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if(isset($contact_message)): ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo l::get($contact_message) ?>
                        </div>
                    <?php endif ?>

                    <?php echo $page->text()->kirbytext() ?>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name"><?php echo l::get('name') ?> <span>(<?php echo l::get('required') ?>
                                        )</span></label>
                                <input type="text" id="name" name="name" required/>
                            </div>
                            <div class="col-md-6">
                                <label for="mail"><?php echo l::get('email') ?> <span>(<?php echo l::get('required') ?>
                                        )</span></label>
                                <input type="text" id="mail" name="mail" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="message"><?php echo l::get('message') ?>
                                    <span>(<?php echo l::get('required') ?>)</span></label>
                                <textarea name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="hidden" name="submit-form" value="true" />
                                <div class="hidden">
                                    <input type="text" name="url" />
                                </div>
                                <button type="submit" name="submit">
                                    <?php echo l::get('send') ?>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php if ($page->optionalText() != ''): ?>
                        <div class="optional-text">
                            <?php echo $page->optionalText()->kirbytext() ?>
                        </div>
                    <?php endif ?>

                </div>

                <div class="col-md-4 sidebar">
                    <?php if ($page->headlineSidebar() != ''): ?>
                        <h4><?php echo $page->headlineSidebar()->kirbytext() ?></h4>
                    <?php endif ?>

                    <?php if ($page->address() != ''): ?>
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <strong><?php echo l::get('address') ?></strong><br/>
                                <?php echo $page->address()->kirbytext() ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($page->phone() != ''): ?>
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <strong><?php echo l::get('phone') ?></strong><br/>
                                <?php echo $page->phone() ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($page->mobile() != ''): ?>
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <strong><?php echo l::get('mobile') ?></strong><br/>
                                <?php echo $page->mobile() ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($page->opening() != ''): ?>
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <strong><?php echo l::get('opening') ?></strong><br/>
                                <?php echo $page->opening() ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($page->mail() != ''): ?>
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-10">
                                <strong><?php echo l::get('email') ?></strong><br/>
                                <a href="mailto:<?php echo $page->mail() ?>"><?php echo $page->mail() ?></a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($page->mapslink() != ''): ?>
        <div class="page-contact_spacer text-center">
            <i class="fa fa-map-o fa-2x" aria-hidden="true"></i><br/>
            <?php echo $page->mapslogan() ?>
        </div>

        <div class="page-contact_map">
            <iframe src="<?php echo $page->mapslink() ?>" style="width:100%" height="350" frameborder="0"
                    style="border:0" allowfullscreen></iframe>
        </div>
    <?php endif ?>
</div>

<?php snippet('footer') ?>
