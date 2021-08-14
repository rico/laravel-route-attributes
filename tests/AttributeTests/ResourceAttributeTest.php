<?php

namespace Spatie\RouteAttributes\Tests\AttributeTests;

use Spatie\RouteAttributes\Tests\TestCase;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\ResourceTestExceptController;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\ResourceTestFullController;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\ResourceTestOnlyController;

class ResourceAttributeTest extends TestCase
{
    /** @test */
    public function it_can_register_resource_with_all_methods()
    {
        $this->routeRegistrar->registerClass(ResourceTestFullController::class);

        $this
            ->assertRegisteredRoutesCount(7)
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'index',
                uri: 'posts',
                name: 'posts.index'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'create',
                uri: 'posts/create',
                name: 'posts.create'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'store',
                httpMethods: 'post',
                uri: 'posts',
                name: 'posts.store'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'show',
                uri: 'posts/{post}',
                name: 'posts.show'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'edit',
                uri: 'posts/{post}/edit',
                name: 'posts.edit'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'update',
                httpMethods: 'put',
                uri: 'posts/{post}',
                name: 'posts.update'
            )
            ->assertRouteRegistered(
                ResourceTestFullController::class,
                controllerMethod: 'destroy',
                httpMethods: 'delete',
                uri: 'posts/{post}',
                name: 'posts.destroy'
            );
    }

    /** @test */
    public function it_can_register_resource_with_only_a_few_methods()
    {
        $this->routeRegistrar->registerClass(ResourceTestOnlyController::class);

        $this
            ->assertRegisteredRoutesCount(3)
            ->assertRouteRegistered(
                ResourceTestOnlyController::class,
                controllerMethod: 'index',
                uri: 'posts',
                name: 'posts.index'
            )
            ->assertRouteRegistered(
                ResourceTestOnlyController::class,
                controllerMethod: 'store',
                httpMethods: 'post',
                uri: 'posts',
                name: 'posts.store'
            )
            ->assertRouteRegistered(
                ResourceTestOnlyController::class,
                controllerMethod: 'show',
                uri: 'posts/{post}',
                name: 'posts.show'
            );
    }

    /** @test */
    public function it_can_register_resource_without_a_few_methods()
    {
        $this->routeRegistrar->registerClass(ResourceTestExceptController::class);

        $this
            ->assertRegisteredRoutesCount(5)
            ->assertRouteRegistered(
                ResourceTestExceptController::class,
                controllerMethod: 'index',
                uri: 'posts',
                name: 'posts.index'
            )
            ->assertRouteRegistered(
                ResourceTestExceptController::class,
                controllerMethod: 'create',
                uri: 'posts/create',
                name: 'posts.create'
            )
            ->assertRouteRegistered(
                ResourceTestExceptController::class,
                controllerMethod: 'store',
                httpMethods: 'post',
                uri: 'posts',
                name: 'posts.store'
            )
            ->assertRouteRegistered(
                ResourceTestExceptController::class,
                controllerMethod: 'show',
                uri: 'posts/{post}',
                name: 'posts.show'
            )
            ->assertRouteRegistered(
                ResourceTestExceptController::class,
                controllerMethod: 'edit',
                uri: 'posts/{post}/edit',
                name: 'posts.edit'
            );
    }
}
