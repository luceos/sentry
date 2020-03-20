<?php

/*
 * This file is part of fof/sentry
 *
 * Copyright (c) 2020 FriendsOfFlarum.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace FoF\Sentry;

use Flarum\Extend as Native;
use Flarum\Foundation\Application;
use FoF\Components\Extend\AddFofComponents;

return [
    new AddFofComponents(),
    new Extend\HandleConsoleErrors(),
    new Extend\HandleHttpErrors(),
    (new Native\Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->content(Content\SentryJavaScript::class),
    (new Native\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),
    new Native\Locales(__DIR__.'/resources/locale'),
    new Native\Compat(function (Application $app) {
        $app->register(SentryServiceProvider::class);
    }),
];
