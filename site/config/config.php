<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('debug', true);

c::set('languages', array(
    array(
        'code'    => 'en',
        'name'    => 'English',
        'default' => true,
        'locale'  => 'en_US',
        'url'     => '/',
    ),
    array(
        'code'    => 'de',
        'name'    => 'Deutsch',
        'locale'  => 'de_DE',
        'url'     => '/de',
    ),
));

c::set('berbach.adaptivebg.xs_max_width', 767);
c::set('berbach.adaptivebg.sm_max_width', 991);
c::set('berbach.adaptivebg.md_max_width', 1199);
c::set('berbach.adaptivebg.quality', 70);