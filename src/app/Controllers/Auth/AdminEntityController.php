<?php

namespace App\Controllers\Super;

use App\Utils\Entities\ProvinceUtils;
use App\Utils\Entities\MunicipalityUtils;
use App\Utils\Entities\NeighborhoodUtils;
use App\Utils\Entities\TagUtils;

class AdminEntityController
{
    public function index($template)
    {
        $template->apply('super/admin_entities/admin_entities/index.php');
    }

    // Provincias
    public function listProvinces($template, $pdo) {
        $provinces = ProvinceUtils::getAll($pdo);
        $template->apply('super/admin_entities/provinces/index', ['provinces' => $provinces]);
        }

    public function createProvinceForm($template) {
        $template->apply('super/admin_entities/provinces/create');
    }

    public function storeProvince($template, $pdo) {
        ProvinceUtils::create($pdo, $_POST);
        header('Location: index.php?route=admin_entities/provinces/index.php');
    }

    public function editProvinceForm($template, $pdo) {
        $id = $_GET['id'] ?? null;
        $province = ProvinceUtils::getById($pdo, $id);
        $template->apply('super/admin_entities/provinces/edit', ['province' => $province]);
    }

    public function updateProvince($template, $pdo) {
        ProvinceUtils::update($pdo, $_POST['id'], $_POST);
        header('Location: index.php?route=admin_entities/provinces/index.php');
    }

    public function deleteProvince($template, $pdo) {
        $id = $_GET['id'] ?? null;
        ProvinceUtils::delete($pdo, $id);
        header('Location: index.php?route=admin_entities/provinces/index.php');
    }

    // Municipios
    public function listMunicipalities($template, $pdo) {
        $municipalities = MunicipalityUtils::getAll($pdo);
        $provinces = ProvinceUtils::getAll($pdo); // Por si quieres mostrar nombre provincia en la vista
        $template->apply('super/admin_entities/municipalities/index', [
            'municipalities' => $municipalities,
            'provinces' => $provinces
        ]);
    }

    public function createMunicipalityForm($template, $pdo) {
        // Para crear un municipio es útil mostrar la lista de provincias (relación)
        $provinces = ProvinceUtils::getAll($pdo);
        $template->apply('super/admin_entities/municipalities/create', ['provinces' => $provinces]);
    }

    public function storeMunicipality($template, $pdo) {
        MunicipalityUtils::create($pdo, $_POST);
        header('Location: index.php?route=admin_entities/municipalities/index.php');
    }

    public function editMunicipalityForm($template, $pdo) {
        $id = $_GET['id'] ?? null;
        $municipality = MunicipalityUtils::getById($pdo, $id);
        $provinces = ProvinceUtils::getAll($pdo);
        $template->apply('super/admin_entities/municipalities/edit', [
            'municipality' => $municipality,
            'provinces' => $provinces
        ]);
    }

    public function updateMunicipality($template, $pdo) {
        MunicipalityUtils::update($pdo, $_POST['id'], $_POST);
        header('Location: index.php?route=admin_entities/municipalities/index.php');
    }

    public function deleteMunicipality($template, $pdo) {
        $id = $_GET['id'] ?? null;
        MunicipalityUtils::delete($pdo, $id);
        header('Location: index.php?route=admin_entities/municipalities/index.php');
    }

    // Barrios (Neighborhoods)
    public function listNeighborhoods($template, $pdo) {
        $neighborhoods = NeighborhoodUtils::getAll($pdo);
        $municipalities = MunicipalityUtils::getAll($pdo); // Para mostrar el nombre del municipio
        $template->apply('super/admin_entities/neighborhoods/index', [
            'neighborhoods' => $neighborhoods,
            'municipalities' => $municipalities
        ]);
    }

    public function createNeighborhoodForm($template, $pdo) {
        $municipalities = MunicipalityUtils::getAll($pdo);
        $template->apply('super/admin_entities/neighborhoods/create', [
            'municipalities' => $municipalities
        ]);
    }

    public function storeNeighborhood($template, $pdo) {
        NeighborhoodUtils::create($pdo, $_POST);
        header('Location: index.php?route=admin_entities/neighborhoods/index.php');
    }

    public function editNeighborhoodForm($template, $pdo) {
        $id = $_GET['id'] ?? null;
        $neighborhood = NeighborhoodUtils::getById($pdo, $id);
        $municipalities = MunicipalityUtils::getAll($pdo);
        $template->apply('super/admin_entities/neighborhoods/edit', [
            'neighborhood' => $neighborhood,
            'municipalities' => $municipalities
        ]);
    }

    public function updateNeighborhood($template, $pdo) {
        NeighborhoodUtils::update($pdo, $_POST['id'], $_POST);
        header('Location: index.php?route=admin_entities/neighborhoods/index.php');
    }

    public function deleteNeighborhood($template, $pdo) {
        $id = $_GET['id'] ?? null;
        NeighborhoodUtils::delete($pdo, $id);
        header('Location: index.php?route=admin_entities/neighborhoods/index.php');
    }


    // Labels
    public function listTags($template, $pdo) {
        $tags = TagUtils::getAll($pdo);
        $template->apply('super/admin_entities/tags/index', ['tags' => $tags]);
    }

    public function createTagForm($template) {
        $template->apply('super/admin_entities/tags/create');
    }

    public function storeTag($template, $pdo) {
        TagUtils::create($pdo, $_POST);
        header('Location: index.php?route=admin_entities/tags/index.php');
    }

    public function editTagForm($template, $pdo) {
        $id = $_GET['id'] ?? null;
        $tag = TagUtils::getById($pdo, $id);
        $template->apply('super/admin_entities/tags/edit', ['tag' => $tag]);
    }

    public function updateTag($template, $pdo) {
        TagUtils::update($pdo, $_POST['id'], $_POST);
        header('Location: index.php?route=admin_entities/tags/index.php');
    }

    public function deleteTag($template, $pdo) {
        $id = $_GET['id'] ?? null;
        TagUtils::delete($pdo, $id);
        header('Location: index.php?route=admin_entities/tags/index.php');
    }

}
