<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ChangePassRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ChangePassController extends Controller
{
    public function index() {
        return view('pages.admin.change-pass.index');
    }

    public function update(ChangePassRequest $request) {

        $command = User::findOrFail(Auth::user()->id)->update(['password'=> bcrypt($request->new_password)]);

        if ($command) {
            $request->session()->flash('alert-success', 'Password berhasil diganti!');
        } else {
            $request->session()->flash('alert-failed', 'Password gagal diganti!');
        }

        return redirect()->route('change-pass.index');
    }
}
