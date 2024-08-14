<?php

namespace ProjectApp;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;
use ProjectApp\Contracts\Services\ConfigContract;
use ProjectApp\Exceptions\HttpException;
use ProjectApp\Exceptions\PageNotFoundException;
use ProjectApp\Exceptions\RedirectException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Application
{
    public function __construct(
        private readonly Router         $router,
        private readonly Capsule        $database,
        private readonly ConfigContract $config
    )
    {
    }

    public function run(Request $request): Response
    {
        try {
            container()->instance(Request::class, $request);
            $this->database->addConnection($this->config->get('database'));
            $this->database->setAsGlobal();
            $this->database->bootEloquent();
            return $this->router->run($request);
        } catch (PageNotFoundException $exception) {
            return new Response(
                (new View('errors/404.php'))->render(),
                404
            );
        } catch (RedirectException $exception) {
            return new RedirectResponse($exception->url);
        } catch (HttpException $exception) {
            return new Response(
                (new View('errors/error.php'))->render(['message' =>
                    $exception->getMessage(), 'code' => $exception->getCode()]),
                $exception->getCode()
            );
        } catch (Exception $exception) {
            return new Response(
                (new View('errors/error.php'))->render(['message' =>
                    $exception->getMessage()]),
                500
            );
        }
    }
}