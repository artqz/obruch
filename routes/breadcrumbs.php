<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', url('/'));
});

Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Панель управления', url('admin'));
});

Breadcrumbs::register('admin.users', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Пользователи', url('admin/users'));
});

Breadcrumbs::register('admin.users.show', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push($user->login, url('admin/users/{id}'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Добавить пользователя', url('admin/users/create'));
});

Breadcrumbs::register('admin.organizations', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Организации', url('admin/organizations'));
});

Breadcrumbs::register('admin.organizations.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.organizations');
    $breadcrumbs->push('Добавить организацию', url('admin/organizations/create'));
});

Breadcrumbs::register('admin.organizations.show', function($breadcrumbs, $organization)
{
    $breadcrumbs->parent('admin.organizations');
    $breadcrumbs->push($organization->short_name, url('admin/organizations/{id}'));
});