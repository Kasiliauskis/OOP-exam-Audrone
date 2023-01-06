<?php

namespace Manta\OopExam\Container;

use Alfred\MvcProject\Models\Car;
use Manta\OopExam\Controllers\HomePageController;
use Manta\OopExam\Controllers\InputController;
use Manta\OopExam\Framework\Router;
use Manta\OopExam\ElData\Input;
use Manta\OopExam\Repositories\InputRepository;
use RuntimeException;

class DIContainer
{
    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . 'not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function loadDependencies()
    {
        $this->set(
            InputController::class,
            function (DIContainer $container) {
                return new InputController(
                    $container->get(InputRepository::class)
                );
            }
        );

        $this->set(
            Router::class,
            function (DIContainer $container) {
                return new Router(
                $container->get(HomePageController::class),
                $container->get(InputController::class)
                );
            }
        );

        $this->set(
            Input::class,
            function (DIContainer $container) {
                return new Input();
            }
        );

        $this->set(
            InputRepository::class,
            function (DIContainer $container) {
                return new InputRepository();

            }
        );

        $this->set(
            HomePageController::class,
            function (DIContainer $container) {
                return new HomePageController();
            }
        );
    }
}