<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ChangePassController extends Controller
{
    public function index() {
        return view('pages.change-pass.index');
    }

    public function update(ChangePassRequest $request) {

        $command = User::findOrFail(Auth::user()->id)->update(['password'=> bcrypt($request->new_password)]);

        if ($command) {
            $request->session()->flash('alert-success', 'Password berhasil diganti!');
        } else {
            $request->session()->flash('alert-failed', 'Password gagal diganti!');
        }

        if(Auth::user()->role == 'USER')
            return redirect()->route('user.change-pass.index');
        elseif(Auth::user()->role == 'ADMIN')
            return redirect()->route('admin.change-pass.index');
    }
}
