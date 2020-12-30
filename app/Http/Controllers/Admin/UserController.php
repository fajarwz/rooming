<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

// use App\Http\Requests\Admin\UserRequest;

use DataTables;

class UserController extends Controller
{
    public function json(){
        $data = User::where('role', 'USER');

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '
                <a 
                href="user/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" 
                title="Edit">
                <i class="fas fa-edit">
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.admin.user.index');
    }
}
