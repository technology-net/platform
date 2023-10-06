<?php

namespace IBoot\Platform\app\Services;

use IBoot\Core\app\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService
{
    private User $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Get user list
     *
     * @return mixed
     */
    public function getUsers(): mixed
    {
        return $this->user->orderBy('created_at', 'desc')->paginate(config('platform.user.pagination'));
    }

    /**
     * Create a new user
     *
     * @param array $input
     * @return mixed
     */
    public function newUser(array $input = []): mixed
    {
        $input['password'] = Hash::make('password');
        $input['status'] = User::STATUS_ACTIVATED;

        return $this->user->create($input);
    }

    /**
     * Show a user
     *
     * @param int $id
     * @return User
     */
    public function showUser(int $id): User
    {
        return $this->findUserById($id);
    }

    /**
     * Update a user
     *
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function updateUser(int $id, array $input = []): mixed
    {
        return $this->findUserById($id)->update($input);
    }

    /**
     * Delete a user
     *
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id): mixed
    {
        return $this->findUserById($id)->delete();
    }

    /**
     * Find a user by id
     *
     * @param int $id
     * @return mixed
     */
    private function findUserById(int $id): mixed
    {
        return $this->user->findOrFail($id);
    }
}
