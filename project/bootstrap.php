<?php

use Dotenv\Dotenv;
use Illuminate\Container\Container;
use ProjectApp\Auth;
use ProjectApp\Config;
use ProjectApp\Contracts\Services\CarsRepositoryContract;
use ProjectApp\Contracts\Services\CategoriesRepositoryContract;
use ProjectApp\Contracts\Services\ColorsRepositoryContract;
use ProjectApp\Contracts\Services\ConfigContract;
use ProjectApp\Contracts\Services\FlashMessagesContract;
use ProjectApp\FlashMessages;
use ProjectApp\Repositories\CarsRepository;
use ProjectApp\Repositories\CategoriesRepository;
use ProjectApp\Repositories\ColorsRepository;
use Symfony\Component\HttpFoundation\Session\Session;


function container(): Container
{
    return Container::getInstance();
}

function auth(): Auth
{
    return container()->get(Auth::class);
}

$dotenv = Dotenv::createImmutable(APP_DIR);
$dotenv->load();

container()->singleton(CarsRepositoryContract::class, CarsRepository::class);
container()->singleton(ColorsRepositoryContract::class, ColorsRepository::class);
container()->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
container()->singleton(ConfigContract::class, function () {
    return (new Config(APP_DIR . '/config'))->load();
});

container()->singleton(Session::class, function () {
    $session = new Session();
    $session->start();
    return $session;
});

container()->singleton(FlashMessagesContract::class, FlashMessages::class);
container()->singleton(Auth::class);
