import './../styles/main.scss';

// vendor
var jquery = require('jquery')
window.$ = window.jQuery = jquery;

require('../../node_modules/fancybox/dist/js/jquery.fancybox.pack');

require('jquery-bridget');
require('ev-emitter');
require('bootstrap-sass');
require('imagesloaded');
require('masonry-layout');

function checkTop() {
  $(window).scroll(function() {
    if(!$(window).scrollTop()) {
      $('.navbar-default').removeClass('navbar-scrolled');
    } else {
      $('.navbar-default').addClass('navbar-scrolled');
    }
  })
}

function loadBoxes() {
  $('.load-headline').delay(300).fadeIn(500);
  $('.load-box1').delay(1000).fadeIn(1200);
  $('.load-box2').delay(2000).fadeIn(1200);
  $('.load-box3').delay(3000).fadeIn(1200);
}

function carouselSettings() {
  $('.carousel').carousel({
    interval: 10000
  })
}

function loadGallery() {
  $('.grid').masonry({
    itemSelector: '.grid-item',
      columnWidth: '.grid-item',
      percentPosition: true
  })
}

function loadBlogPosts() {
  $('.page-blog_list').imagesLoaded(function() {
    $('.page-blog_list .row').masonry({
      itemSelector: '.page-blog_list .col-md-4',
      columnWidth: '.page-blog_list .col-md-4',
      percentPosition: true
    })
  })
}

function loadLightbox() {
  $('.lightbox').fancybox({
    helpers: {
      overlay: {
        locked: false
      }
    }
  });
}

function textSlide() {
  var items = $('.text-slide').data('slogans'),
      $text = $('.text-slide'),
      delay = 8;

  function loop (delay) {
    $.each(items, function (i, elm) {
      if (i != 0) {
        $text.delay(delay*1E3).fadeOut(800);
        $text.queue(function() {
          $text.html(items[i]);
          $text.dequeue();
        });
        $text.fadeIn(800);
        $text.queue(function() {
          if (i == items.length -1) {
            loop(delay);
          }
          $text.dequeue();
        });
      }
    });
  }

  loop(delay);
}

function checkForm() {
  $('#form-message').empty();

  $('input, textarea, select').on('change', function() {
    $(this).removeClass('error');
  });

  $('#submit').on('click', function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var mail = $('#mail').val();
    var subject = $('#subject').val();
    var area = $('#area').val();
    var message = $('#message').val();

    $('#form-message').empty();

    if(name == '' ||
       mail == '') {
      if(name == '') {
        $('#name').addClass('error');
      }
      if(mail == '') {
        $('#mail').addClass('error');
      }

      $('#form-message').append('Fehler: Bitte füllen Sie alle Felder vollständig aus.').removeClass().addClass('form-error');
    } else {
      $.post('/contact', {
        php_name: name,
        php_mail: mail,
        php_subject: subject,
        php_area: area,
        php_message: message,
        php_sendmail: 'sendmail'
      }, function(data) {
        if(data == 'Success') {
          $('#form-message').append('Ihre Nachricht wurde erfolgreich verschickt.').removeClass().addClass('form-success');
          $('#submit').hide();
          $('#form')[0].reset();
        } else {
          $('#form-message').append('Die E-Mail konnte nicht verschickt werden.').removeClass().addClass('form-error');
        }
      });
    }
  });
}

$(document).ready(function() {
  checkTop(),
  loadBoxes(),
  carouselSettings(),
  loadGallery(),
  loadBlogPosts(),
  loadLightbox(),
  textSlide(),
  checkForm()
});
