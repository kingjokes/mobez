<?php

namespace App\Interfaces;


interface AdminInterface
{

    public function login(string $email, string $password);

    public function changePassword(string $oldPassword, string $newPassword, string $cPass, int $id);

    public function getDashboardStat();
}
