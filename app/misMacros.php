<?php

/* 
 * Mis Macros
 * 
 */

HTML::macro('nav_link', function($url, $text) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return '<li'.$class.'><a href="'.URL::to($url).'">'.$text.'</a></li>'. PHP_EOL;
});
