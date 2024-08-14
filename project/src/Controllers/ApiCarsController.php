<?php

namespace ProjectApp\Controllers;

use ProjectApp\Contracts\Services\CarsRepositoryContract;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiCarsController extends Controller
{
    public function __construct(private CarsRepositoryContract $carRepository)
    {
    }

    public function cars(): Response
    {
        return new JsonResponse($this->carRepository->getCars()->toArray());
    }
}