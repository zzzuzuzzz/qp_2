<?php

namespace ProjectApp\Controllers;

use ProjectApp\Exceptions\RedirectException;
use ProjectApp\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


abstract class Controller
{
    protected function view(string $template, array $data = []): Response
    {
        $view = new View($template);
        return new Response($view->render($data));
    }

    /**
     * @throws RedirectException
     */
    protected function onlyAuth(string $url): void
    {
        if (!auth()->isAuthorized()) {
            throw new RedirectException($url);
        }
    }

    /**
     * @throws RedirectException
     */
    protected function onlyNotAuth(string $url): void
    {
        if (auth()->isAuthorized()) {
            throw new RedirectException($url);
        }
    }

    /**
     * @throws RedirectException
     */
    protected function onlyAdmin(string $url): void
    {
        if (auth()->isNotAdmin()) {
            throw new RedirectException($url);
        }
    }
}