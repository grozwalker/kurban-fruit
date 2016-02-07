<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 07.02.2016
 * Time: 17:46
 */

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('<span class="glyphicon glyphicon-home"></span>', '/');
});

// Home > About
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Панель управления', route('dashboard.main'));
});

// Home > Blog
Breadcrumbs::register('transportings', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Транспортировки', route('dashboard.transporting.index'));
});

Breadcrumbs::register('transporting_item', function($breadcrumbs, $transporting) {
    $breadcrumbs->parent('transportings');
    $breadcrumbs->push($transporting->name, route('dashboard.transporting.view', $transporting->id));
});

Breadcrumbs::register('transporting_create', function($breadcrumbs)
{
    $breadcrumbs->parent('transportings');
    $breadcrumbs->push('Добавить транспортировку', route('dashboard.transporting.create'));
});

Breadcrumbs::register('goods', function($breadcrumbs, $transporting)
{
    $breadcrumbs->parent('transporting_item', $transporting);
    $breadcrumbs->push('Товары', route('dashboard.good.index', $transporting->id));
});

Breadcrumbs::register('good_item', function($breadcrumbs, $transporting, $good)
{
    $breadcrumbs->parent('goods', $transporting);
    $breadcrumbs->push($good->name, route('dashboard.good.create', [$transporting->id, $good->id]));
});

Breadcrumbs::register('good_create', function($breadcrumbs, $transporting)
{
    $breadcrumbs->parent('goods', $transporting);
    $breadcrumbs->push('Добавить товар', route('dashboard.good.create', $transporting->id));
});
// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});