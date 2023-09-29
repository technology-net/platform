<?php

namespace IBoot\Platform\app\Http\Controllers;

use App\Http\Controllers\Controller;
use IBoot\Platform\app\Requests\CreateUserRequest;
use IBoot\Platform\app\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use IBoot\Platform\app\Models\User;
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
     * @return View
     */
    public function index(): View
    {
        $users = $this->userService->getUsers();

        return view('packages/platform::index', ['users' => $users]);
    }

    /**
     * Create screen
     *
     * @return View
     */
    public function create(): View
    {
        return view('packages/platform::create');
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
        $input['status'] = User::ACTIVATED;

        $user = $this->userService->newUser($input);

        return response()->json($user);
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

        return view('packages/platform::detail', ['user' => $user]);
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
        $user = $this->userService->updateUser($id, $request->all());

        return response()->json($user);
    }


    /**
     * Delete a user
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user = $this->userService->deleteUser($id);

        return response()->json($user);
    }
}
