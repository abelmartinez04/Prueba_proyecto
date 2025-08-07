<?php
const BASE_PATH = __DIR__ . '/../';
require_once BASE_PATH . '/vendor/autoload.php';
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/config/google.php';
require_once BASE_PATH . '/config/microsoft.php';


// Rutas y controladores asociados
const DEFAULT_PAGE = 'home';
const DEFAULT_ROUTE = ['page' => DEFAULT_PAGE, 'controller' => \App\Controllers\HomeController::class];
const ROUTES = [
    ''          => DEFAULT_ROUTE,
    'home.php'  => DEFAULT_ROUTE,
    'index.php' => DEFAULT_ROUTE,
    // Incidence views
    'incidents/incidence.php' => ['page' => 'incidence', 'controller' => \App\Controllers\Incidents\IncidenceController::class],
    'incidents/map.php'       => ['page' => 'incidence', 'controller' => \App\Controllers\Incidents\MapController::class],
    'incidents/list.php'      => ['page' => 'incidence', 'controller' => \App\Controllers\Incidents\ListController::class],
    // Reporters views
    'reporters/home.php'           => ['controller' => \App\Controllers\Reporters\HomeController::class],
    'reporters/edit_incidence.php' => ['controller' => \App\Controllers\Reporters\EditIncidenceController::class],
    // Super routes
    'super/admin.php'     => ['page' => 'admin',     'controller' => \App\Controllers\Super\AdminController::class],
    'super/validator.php' => ['page' => 'validator', 'controller' => \App\Controllers\Super\ValidatorController::class],
    // Auth routes
    'auth/login.php'                       => ['controller' => \App\Controllers\Auth\LoginController::class],
    'auth/logout.php'                      => ['controller' => \App\Controllers\Auth\LogoutController::class],
    'auth/signin.php'                      => ['controller' => \App\Controllers\Auth\SigninController::class],
    'auth/forgot_password.php'             => ['controller' => \App\Controllers\Auth\ForgotPasswordController::class],
    'auth/reset_password.php'              => ['controller' => \App\Controllers\Auth\ResetPasswordController::class],
    'auth/GoogleController.php'            => ['controller' => \App\Controllers\Auth\GoogleController::class],
    'auth/MicrosoftController.php'         => ['controller' => \App\Controllers\Auth\MicrosoftController::class],
    'auth/MicrosoftCallbackController.php' => ['controller' => \App\Controllers\Auth\MicrosoftCallbackController::class],

    // Super admin entities CRUD
    'super/admin_entities/provinces/index.php'      => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/provinces/create.php'     => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/provinces/edit.php'       => ['controller' => \App\Controllers\Super\AdminEntityController::class],

    //Vistas de los cruds
    'admin_entities/provinces/index' => [AdminEntityController::class, 'listProvinces'],
    'admin_entities/provinces/create' => [AdminEntityController::class, 'createProvinceForm'],
    'admin_entities/provinces/store' => [AdminEntityController::class, 'storeProvince'],
    'admin_entities/provinces/edit' => [AdminEntityController::class, 'editProvinceForm'],
    'admin_entities/provinces/update' => [AdminEntityController::class, 'updateProvince'],
    'admin_entities/provinces/delete' => [AdminEntityController::class, 'deleteProvince'],

    // SUPER ADMIN ENTITIES: MUNICIPALITIES
    'super/admin_entities/municipalities/index.php'  => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/municipalities/create.php' => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/municipalities/edit.php'   => ['controller' => \App\Controllers\Super\AdminEntityController::class],

    // CRUD: MUNICIPALITIES
    'admin_entities/municipalities/index'   => [AdminEntityController::class, 'listMunicipalities'],
    'admin_entities/municipalities/create'  => [AdminEntityController::class, 'createMunicipalityForm'],
    'admin_entities/municipalities/store'   => [AdminEntityController::class, 'storeMunicipality'],
    'admin_entities/municipalities/edit'    => [AdminEntityController::class, 'editMunicipalityForm'],
    'admin_entities/municipalities/update'  => [AdminEntityController::class, 'updateMunicipality'],
    'admin_entities/municipalities/delete'  => [AdminEntityController::class, 'deleteMunicipality'],

    // SUPER ADMIN ENTITIES: NEIGHBORHOODS
    'super/admin_entities/neighborhoods/index.php'  => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/neighborhoods/create.php' => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/neighborhoods/edit.php'   => ['controller' => \App\Controllers\Super\AdminEntityController::class],

    // CRUD: NEIGHBORHOODS
    'admin_entities/neighborhoods/index'   => [AdminEntityController::class, 'listNeighborhoods'],
    'admin_entities/neighborhoods/create'  => [AdminEntityController::class, 'createNeighborhoodForm'],
    'admin_entities/neighborhoods/store'   => [AdminEntityController::class, 'storeNeighborhood'],
    'admin_entities/neighborhoods/edit'    => [AdminEntityController::class, 'editNeighborhoodForm'],
    'admin_entities/neighborhoods/update'  => [AdminEntityController::class, 'updateNeighborhood'],
    'admin_entities/neighborhoods/delete'  => [AdminEntityController::class, 'deleteNeighborhood'],

    // SUPER ADMIN ENTITIES: labels
    'super/admin_entities/labels/index.php'  => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/labels/create.php' => ['controller' => \App\Controllers\Super\AdminEntityController::class],
    'super/admin_entities/labels/edit.php'   => ['controller' => \App\Controllers\Super\AdminEntityController::class],

    // CRUD: labels
    'admin_entities/labels/index'   => [AdminEntityController::class, 'listLabels'],
    'admin_entities/labels/create'  => [AdminEntityController::class, 'createLabelForm'],
    'admin_entities/labels/store'   => [AdminEntityController::class, 'storeLabel'],
    'admin_entities/labels/edit'    => [AdminEntityController::class, 'editLabelForm'],
    'admin_entities/labels/update'  => [AdminEntityController::class, 'updateLabel'],
    'admin_entities/labels/delete'  => [AdminEntityController::class, 'deleteLabel'],

];

// Crear pdo
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass
    );
} catch (PDOException $e) {
    die("Error de BD: " . $e->getMessage());
}

// Manejar rutas
$router = new App\Core\Router();
$router->dispatch();
