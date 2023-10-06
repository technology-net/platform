<?php

namespace IBoot\Platform\app\Http\Controllers;

use App\Http\Controllers\Controller;
use IBoot\Core\app\Models\User;
use IBoot\Platform\app\Http\Requests\CreateUserRequest;
use IBoot\Platform\app\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        $input = $request->validated();
        $input['password'] = Hash::make('password');
        $input['status'] = User::STATUS_ACTIVATED;

        $result = $this->userService->newUser($input);

        return responseJson($result['data'], $result['status_code'], $result['message']);
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
     */
    public function update(CreateUserRequest $request, int $id): JsonResponse
    {
        $result = $this->userService->updateUser($id, $request->all());

        return responseJson($result['data'], $result['status_code'], $result['message']);
    }


    /**
     * Delete a user
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = $this->userService->deleteUser($id);

        return responseJson($result['data'], $result['status_code'], $result['message']);
    }
}
