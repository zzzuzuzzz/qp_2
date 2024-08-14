<?php

use ProjectApp\Contracts\Services\FlashMessagesContract;

$title = $title ?? 'QSOFT учебный сайт';
?>
    <!doctype html>
    <html class="antialiased" lang="ru">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/assets/css/form.min.css" rel="stylesheet">
        <link href="/assets/css/tailwind.css" rel="stylesheet">
        <link href="/assets/css/base.css" rel="stylesheet">

        <title><?= htmlspecialchars($pageTitle ?? $title) ?></title>
        <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
    </head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base
tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col bg-gray-100">
    <header class="bg-white">
        <div class="border-b">
            <div class="container mx-auto block overflow-hidden px-4 sm:px-6 sm:flex sm:justify-between sm:items-center py-4 space-y-4 sm:space-y-0">
                <div class="flex justify-center">
                    <a href="/" class="w-36" rel="nofollow" title="QSOFT учебный сайт">
                        <img src="/assets/images/qsoft_logo.svg" class="w-full" alt="QSOFT учебный сайт">
                    </a>
                </div>
                <?php if (auth()->isAuthorized()) { ?>
                    <div>
                        <ul class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
                            <li>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-red-600 h-4 w-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-bold"><?= htmlspecialchars(auth()->user()?->name ?? auth()->user()?->email) ?></span>
                                </div>
                            </li>
                            <li>
                                <a class="text-gray-500 hover:text-red-600 flex items-center space-x-2" href="/logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-red-600 h-4 w-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>Выйти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div>
                        <ul class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
                            <li>
                                <a class="text-gray-500 hover:text-red-600 flex items-center space-x-2"
                                   href="/register">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-red-600 h-4 w-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    <span>Регистрация</span>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-500 hover:text-red-600 flex items-center space-x-2" href="/login">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-red-600 h-4 w-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>Авторизация</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php \ProjectApp\View::includeTemplate('blocks/menu.php', ['currentPage' => $currentPage ?? null, 'isAuthorised' => auth()->isAuthorized()]) ?>
    </header>
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
    <div class="py-4 pb-8">
    <h1 class="text-black text-3xl font-bold
mb-4"><?= htmlspecialchars($title) ?></h1>
<?php \ProjectApp\View::includeTemplate('blocks/messages/error_message.php', ['messages' => container()->get(FlashMessagesContract::class)->getErrors()]) ?>
<?php \ProjectApp\View::includeTemplate('blocks/messages/success_message.php', ['messages' => container()->get(FlashMessagesContract::class)->getSuccess()]) ?>