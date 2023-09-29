<?php

namespace IBoot\Platform\app\Services;

use IBoot\Platform\app\Models\User;
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
        return $this->user->paginate(config('user.pagination'));
    }

    /**
     * Create a new user
     *
     * @param array $input
     * @return array
     */
    public function newUser(array $input = []): array
    {
        try {
            $this->user->create($input);

            return [
                'success' => true,
                'message' => trans('packages/platform::messages.create_success')
            ];
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());

            return [
                'success' => false,
                'message' => trans('packages/platform::messages.create_fail')
            ];
        }
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
     * @param array $input
     * @param int $id
     * @return array
     */
    public function updateUser(int $id, array $input = []): array
    {
        try {
            $user = $this->findUserById($id)->update($input);

            return [
                'success' => true,
                'message' => trans('packages/platform::messages.update_success')
            ];
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());

            return [
                'success' => false,
                'message' => trans('packages/platform::messages.update_fail')
            ];
        }
    }

    /**
     * Delete a user
     *
     * @param int $id
     * @return array
     */
    public function deleteUser(int $id): array
    {
        try {
            $user = $this->findUserById($id)->delete();

            return [
                'success' => true,
                'message' => trans('packages/platform::messages.delete_success')
            ];
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());

            return [
                'success' => false,
                'message' => trans('packages/platform::messages.delete_fail')
            ];
        }
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
