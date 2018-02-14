  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php echo $site->copyright()->kirbytext() ?>
        </div>
        <div class="col-md-6">
          <nav>
            <ul class="list-inline">
              <?php if($pages->find('contact')): ?>
                <li><a href="<?php echo $pages->find('contact')->url() ?>"><i class="fa fa-map" aria-hidden="true"></i> <?php echo l::get('approach') ?></a></li>
              <?php endif ?>
              <?php if($site->phone() != ''): ?>
                <li><a href="tel:<?php echo $phone ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $site->phone() ?></a></li>
              <?php endif ?>
              <?php if($site->mail() != ''): ?>
                <li><a href="mailto:<?php echo $site->mail() ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $site->mail() ?></a></li>
              <?php endif ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </footer>
  <?php echo js('assets/dist/main.js') ?>

</body>
</html>
