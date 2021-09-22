<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $project): void {
    $trail->parent('users.index');

    $trail->push($user->name, route('users.show', $user));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $project): void {
    $trail->parent('users.show');

    $trail->push('Edit', route('users.edit', $user));
});