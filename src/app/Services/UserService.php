<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class UserService
{
    private $cacheKey = 'users';

    public function __construct()
    {
        if (!Cache::has($this->cacheKey)) {
            $this->seedUsers();
        }
    }

    public function getUsers()
    {
        return Cache::get($this->cacheKey);
    }

    public function enableUser($id)
    {
        $users = Cache::get($this->cacheKey);

        if (isset($users[$id])) {
            $users[$id]['enabled'] = true;
            Cache::put($this->cacheKey, $users);
            return $users[$id];
        }

        return null;
    }

    public function disableUser($id)
    {
        $users = Cache::get($this->cacheKey);

        if (isset($users[$id])) {
            $users[$id]['enabled'] = false;
            Cache::put($this->cacheKey, $users);
            return $users[$id];
        }

        return null;
    }

    private function seedUsers()
    {
        $users = [
            1 => ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com', 'enabled' => true],
            2 => ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com', 'enabled' => true],
            3 => ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com', 'enabled' => true],
        ];

        Cache::put($this->cacheKey, $users);
    }
}
