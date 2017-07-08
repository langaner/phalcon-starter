## Phalcon starter

[![Latest Stable Version](https://poser.pugx.org/langaner/phalcon-starter/v/stable)](https://packagist.org/packages/langaner/phalcon-starter)
[![Total Downloads](https://poser.pugx.org/langaner/phalcon-starter/downloads)](https://packagist.org/packages/langaner/phalcon-starter)
[![Latest Unstable Version](https://poser.pugx.org/langaner/phalcon-starter/v/unstable)](https://packagist.org/packages/langaner/phalcon-starter)
[![License](https://poser.pugx.org/langaner/phalcon-starter/license)](https://packagist.org/packages/langaner/phalcon-starter)

A Skeleton project.

## How to install

Run `composer create-project langaner/phalcon-starter project-directory --prefer-source` or download zip.

## Folders

Api and Backend - modules. You can identify modules in module config

Controllers - all your app controllers

Models - models folder

Presenters - presenters. You can use it by call it from model $this->userRepository->getModel()->getPresenter()->test

Repositories - all repositoreis. You can use it by call $this->userRepository->test()

Services - all app services. You can use it by call $this->userService->test()

routes - all routes

## Bindings

To use repositories, services, presenters you must register binding in ModulesProvider or in you module.

Examples:

Repository - $this->bindRepository('userRepository', UserRepository::class, [new UserModel]);

Service - $this->bindService('userService', UserService::class, [$this->getDi()->get('userRepository')]);

Presenter - $this->bindRepository('userPresenter', UserPresenter::class, [new UserModel]);
