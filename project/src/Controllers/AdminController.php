<?php

namespace ProjectApp\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use ProjectApp\Cars;
use ProjectApp\Contracts\Services\CarsRepositoryContract;
use ProjectApp\Contracts\Services\CategoriesRepositoryContract;
use ProjectApp\Contracts\Services\ColorsRepositoryContract;
use ProjectApp\Contracts\Services\FlashMessagesContract;
use ProjectApp\Exceptions\ValidateException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    const REDIRECT_URL = '/admin';

    public function __construct(
        private readonly FlashMessagesContract $flashMessages,
        private CarsRepositoryContract         $carRepository,
        private ColorsRepositoryContract       $colorsRepository,
        private CategoriesRepositoryContract   $categoriesRepository,
        private readonly Request               $request,
        private readonly Cars                  $car
    )
    {
    }

    public function admin(): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');
        $cars = $this->carRepository->getCars();
        return $this->view('pages/admin/admin.php', ['cars' => $cars]);
    }

    public function createPage(): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');

        $colors = $this->colorsRepository->getColors();
        $categories = $this->categoriesRepository->getCategories();
        return $this->view('pages/admin/createPage.php', ['colors' => $colors, 'categories' => $categories]);
    }

    public function store(): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');

        $fields = $this->request->request->all();
        try {
            $car = $this->car->validate(
                1,
                $fields['name'],
                $fields['price'],
                $fields['old_price'],
                $fields['category'],
                $fields['colors'],
                0
            );
            $this->car->store($car);
            $this->flashMessages->success(['Модель успешно создана']);

        } catch (ValidateException $exception) {
            $this->flashMessages->error(['Возникла ошибка при создании модели. Повторите попытку']);
        }

        return new RedirectResponse(self::REDIRECT_URL);
    }

    public function delete($id): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');

        $this->carRepository->delete($id);
        return new RedirectResponse(self::REDIRECT_URL);
    }

    public function edit($id): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');

        $car = $this->carRepository->load($id);
        $colors = $this->colorsRepository->getColors();
        $categories = $this->categoriesRepository->getCategories();
        $car_colors = Capsule::table('car_color')->where('car_id', $id)->get();
        $array = [];
        foreach ($car_colors->toArray() as $i) {
            $array[] = $i->color_id;
        }
        return $this->view('pages/admin/edit.php', ['car' => $car, 'colors' => $colors, 'categories' => $categories, 'car_colors' => $car_colors, 'array' => $array]);
    }

    public function update($id): Response
    {
        $this->onlyAdmin('/');
        $this->onlyAuth('/');

        $fields = $this->request->request->all();
        try {
            $car = $this->car->validate(
                $id,
                $fields['name'],
                $fields['price'],
                $fields['old_price'],
                $fields['category'],
                $fields['colors'],
                $fields['is_published']
            );
            $this->car->update($car);
            $this->flashMessages->success(['Модель успешно обновлена']);

        } catch (ValidateException $exception) {
            $this->flashMessages->error(['Возникла ошибка при обновлении модели. Повторите попытку']);
        }

        return new RedirectResponse(self::REDIRECT_URL);
    }
}