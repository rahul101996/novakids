<?php

require_once 'app/RouteController.php';

$route = new RouteController();

$route->group(['', 'LoginController'], function ($route) {
    $route->route('admin', 'index');
    $route->route('logout', 'logout');
});
$route->group(['', 'WebController'], function ($route) {
    $route->route('', 'index');
    // $route->route('/', 'index');

});

$route->group(['', 'CollectionController'], function ($route) {
    $route->route('admin/collections', 'index');
        $route->route('admin/add-collections', 'index');

    // $route->route('/', 'index');

});

$route->group(['', 'DashboardController', 'auth'], function ($route) {
    $route->route('dashboard', 'index');
});

$route->group(['master', 'MasterController', 'auth'], function ($route) {
    $route->route('company', 'index');
    $route->route('charges', 'charges');
    $route->route('charges/edit/[i:id]', 'charges');
    $route->route('charges/delete/[i:id]', 'deleteCharges');
    $route->route('expense-type', 'expenseType');
    $route->route('expense-type/edit/[i:id]', 'expenseType');
    $route->route('expense-type/delete/[i:id]', 'deleteExpenseType');
});


return $route->getRoutes();
