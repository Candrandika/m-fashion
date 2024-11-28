<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use UploadTrait;

    public function index()
    {
        return view('pages.admin.users.index');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                $data["image"] = $this->upload('users', $request->file('image'));
            } else {
                $data["image"] = null;
            }

            $data["password"] = bcrypt($data["password"]);

            $user = User::create($data);
            $user->syncRoles('admin');

            return redirect()->back()->with('success', 'Berhasil menambahkan data user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        try {
            if (isset($data['image'])) {
                if($user->image){
                    $this->remove($user->image);
                }

                $data["image"] = $this->upload('users', $request->file('image'));
            }

            $user->update($data);

            return redirect()->back()->with('success', 'Berhasil update data user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            if($user->image){
                $this->remove($user->image);
            }

            $user->update(["is_delete" => 1]);

            return redirect()->back()->with('success', 'Berhasil menghapus data user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request)
    {
        $data = User::with('roles')
        ->when($request->role, function ($q) use ($request){
            $q->whereRelation('roles','name',$request->role);
        })
        ->where('is_delete', 0);
        return BaseDatatable::Table($data);
    }
}
