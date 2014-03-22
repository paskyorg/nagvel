<?php

/* 
 * Mis Macros
 * 
 */

function mCC ($str, $suffix = null) {
    return ucwords(str_replace('_', ' ', $str)) . $suffix;
}


HTML::macro('form_checkbox', function($name, $errors = null) {
        $error = null;
        if ($errors->first($name)) {
                $error = '<div class="col-md-4 alert alert-danger">'. $errors->first($name) .'</div>';
        }
        return '
<div class="form-group row">
'. Form::label($name, mCC($name, ':'), array('class' => 'col-md-2 control-label')) .'
    <div class="col-md-5">
        '. Form::hidden($name, 0) .'
        '. Form::checkbox($name, 1, array('class' => 'form-control input-md')) .'
    </div>'.
    $error .'
</div>';
});


HTML::macro('form_select', function($name, $opts, $errors = null) {
        $error = null;
        if ($errors->first($name)) {
                $error = '<div class="col-md-4 alert alert-danger">'. $errors->first($name) .'</div>';
        }
        return '
<div class="form-group row">
'. Form::label($name, mCC($name, ':'), array('class' => 'col-md-2 control-label')) .'
    <div class="col-md-5">
    '. Form::select($name, $opts, null, array('class' => 'form-control input-md')) .'
    </div>'.
    $error .'
</div>';
});


HTML::macro('form_text', function($name, $errors = null) {
        $error = null;
        if ($errors->first($name)) {
                $error = '<div class="col-md-4 alert alert-danger">'. $errors->first($name) .'</div>';
        }
        return '
<div class="form-group row">
'. Form::label($name, mCC($name, ':'), array('class' => 'col-md-2 control-label')) .'
    <div class="col-md-5">
        '. Form::text($name, null, array('class' => 'form-control input-md')) .'
    </div>'.
    $error .'
</div>';
});


HTML::macro('nav_link', function($url, $text) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return '<li'.$class.'><a href="'.URL::to($url).'">'.$text.'</a></li>'. PHP_EOL;
});
