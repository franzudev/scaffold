<?php

namespace App\Http\Controllers\Users;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\UsersFormRequest;
use App\Traits\CheckPermission;
use App\Traits\JsonBuilder;
use App\Traits\RelationshipsManager;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Arr;

use App\Models\User;
use Avatar;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class UserController extends Controller
{
    use CheckPermission;
    use RelationshipsManager;
    use JsonBuilder;

    public function filter(Request $request)
    {
        $this->authorize('read-users');

        $query = User::query();

        $query = $this->setFilters(
            $query,
            $request->search,
            ['username', 'email'],
            ['LIKE', 'LIKE'],
            [],
            [[]]
        );

        $users = $query->orderBy($request->input('orderBy.column'), $request->input('orderBy.direction'))
            ->paginate($request->input('pagination.per_page'));
        $users->load('roles');
        return $users;
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
        $user->getRoleNames();

        return $user;
    }

    public function store(UsersFormRequest $request)
    {
        $userActions = new CreateNewUser();
        event(new Registered($userActions->create($request->all())));
        return response('Created', 200);
    }

    public function update(UsersFormRequest $request)
    {
        $values = $request->validated();

        $user = User::find($request->id);

        if ($user->email !== $values['email']) {
            $user->email = $values['email'];
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $user->fill($values);

        $user->save();

        $rolesNames = Arr::pluck($request->roles, ['name']);
        $user->syncRoles($rolesNames);

        return $user;
    }

    public function destroy(User $user)
    {
        $userDir = '/avatars/' . $user->id;
        try{
            $user->delete();
        } catch (\Exception $exception) {
            return response('Can\'t delete user', 500);
        }

        Storage::deleteDirectory($userDir);

        return response('Deleted', 201);
    }

    public function count()
    {
        return User::count();
    }

    public function isSuperAdmin()
    {
        return response()->json(['super' => !$this->cantSeeAll()], 200);
    }

    public function all()
    {
        return response()->json(User::all());
    }

}
