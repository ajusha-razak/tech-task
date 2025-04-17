<?php

namespace App\Http\Controllers;

use App\Domains\Country\Services\CountryService;
use App\Domains\User\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    private $countryService;

    public function __construct(UserService $userService, CountryService $countryService)
    {
        $this->userService = $userService;
        $this->countryService = $countryService;
    }

    public function index()
    {
        return view('users', ['users' => $this->userService->listUsers($this->countryService)]);
    }

    public function create()
    {
        return view('user-form', [
            'countries' => $this->countryService->getCountries()
        ]);
    }

    public function store(Request $request)
    {
        $this->userService->createUser($request->all());
        return redirect('/users')->with('status', 'New user added successfully!');
    }

    public function show(int $id)
    {
        $user = $this->userService->getUserFullDetails($id, $this->countryService);
        if (empty($user)) {
            return redirect('/users')->with('error', 'Invalid User!');
        }
        return view('user-view', [
            'user' => $user,
        ]);
    }

    public function edit(int $id)
    {
        $user = $this->userService->findById($id);
        if (empty($user)) {
            return redirect('/users')->with('error', 'Invalid User!');
        }
        return view('user-update', [
            'user' => $user,
            'countries' => $this->countryService->getCountries()
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->userService->updateUser($request->all(), $id);
        return redirect('/users')->with('status', 'Updated successfully!');
    }


    public function destroy(int $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.list')
            ->with('status', 'User deleted successfully');
    }
}
