<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 14-02-18
 * Time: 15:24
 */

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.general.home'), route('frontend.index'));
});