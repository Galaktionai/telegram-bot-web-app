<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Request\User\StoreRequest;
use App\Models\User;
use App\Http\Requests\User\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return view('user.show', compact('user'));
    }
}
