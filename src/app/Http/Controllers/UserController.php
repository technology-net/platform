<?php

namespace IBoot\Platform\app\Http\Controllers;

use App\Http\Controllers\Controller;
use IBoot\Platform\app\Exceptions\UserException;
use IBoot\Platform\app\Http\Requests\CreateUserRequest;
use IBoot\Platform\app\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService,) {
        $this->userService = $userService;
    }

    /**
     * Get user list
     *
     * @param Request $request
     * @return View|string
     */
    public function index(Request $request): View|string
    {
        $users = $this->userService->getUsers();

        if ($request->ajax()) {
            return view('packages/platform::platform.user.user_table', ['users' => $users])->render();
        }

        return view('packages/platform::platform.user.index', ['users' => $users]);
    }

    /**
     * Create screen
     *
     * @return View
     */
    public function create(): View
    {
        return view('packages/platform::platform.user.create');
    }

    /**
     * Create a new user
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     * @throws UserException
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        try {
            $this->userService->newUser($request->validated());

            return responseJson(null, true, trans('packages/platform::messages.create_success'));
        } catch (Throwable $exception) {
            throw new UserException($exception->getMessage(), trans('packages/platform::messages.create_fail'));
        }
    }

    /**
     * Show a user
     *
     * @param int $id
     * @return View|Application|Factory
     */
    public function edit(int $id): View|Application|Factory
    {
        $user = $this->userService->showUser($id);

        return view('packages/platform::platform.user.detail', ['user' => $user]);
    }

    /**
     * Update a user
     *
     * @param CreateUserRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws UserException
     */
    public function update(CreateUserRequest $request, int $id): JsonResponse
    {
        try {
            $this->userService->updateUser($id, $request->all());

            return responseJson(null, true, trans('packages/platform::messages.update_success'));
        } catch (Throwable $exception) {
            throw new UserException($exception->getMessage(), trans('packages/platform::messages.update_fail'));
        }
    }


    /**
     * Delete a user
     *
     * @param int $id
     * @return JsonResponse
     * @throws UserException
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->userService->deleteUser($id);

            return responseJson(null, true, trans('packages/platform::messages.delete_success'));
        } catch (Throwable $exception) {
            throw new UserException($exception->getMessage(), trans('packages/platform::messages.delete_fail'));
        }
    }
}
