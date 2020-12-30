<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\Admin\UserAddRequest;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.edit_or_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        $data = $request->all();
        
        if(User::create($data)) {
            $request->session()->flash('alert-success-add', 'User '.$data['name'].' berhasil ditambahkan');
        }
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit_or_create', [
            'item'  => $item 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success-update', 'Jurusan '.$data['name'].' berhasil diupdate');
        }
        
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        
        if($item->delete()) {
            session()->flash('alert-success-delete', 'Jurusan '.$item->name.' berhasil dihapus!');
        }

        return redirect()->route('user.index');
    }
}
