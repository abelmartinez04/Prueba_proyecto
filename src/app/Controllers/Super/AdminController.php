<?php

namespace App\Controllers\Super;

use App\Core\Template;


class AdminController
{
    public function handle(Template $template)
    {
        $template->apply();
    }

    public function manageUsers() {
        $users = \App\Utils\Entities\UserUtils::getAllUsersWithRoles();
        \App\Core\Template::render('super/manage_users.php', ['users' => $users]);
    }

    public function updateUserRole() {
        $userId = $_POST['user_id'];
        $roleId = $_POST['role_id'];

        \App\Utils\Entities\UserUtils::clearRoles($userId);
        \App\Utils\Entities\UserUtils::assignRole($userId, $roleId);

        header("Location: /admin/users");
        exit();
    }
}
