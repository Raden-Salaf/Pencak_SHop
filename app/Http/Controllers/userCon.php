<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;    

class userCon extends Controller
{
    public function index ()
    {
        $user = DB::table('users')->get();
        return view('user', [
            'user' => $user
        ]);
    }
    
    public function input ()
    {
        return view ('tambah user');
    }

    public function storeinput (Request $request)
    {
        //insert data ke table user
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        //alihkan kee halaman route user
        Session::flash ('message','input berhasil.');
        return redirect('/user/tampil');
    }
    public function update($id)
    {
        //mengambil data dari user,berdasarkan id yang dipilih
        $user = DB::table('users')->where('id',$id)->get();
        //passing data user yang didapat ke view edit.blade.php
        return redirect('/user/tampil');
    }
    public function storeupdate (Request $request)
    {
        //update data user
        if(!empty($request->password)){
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        }else{
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        //alihkan ke halaman user
        return redirect('/user/tampil');
    }
    public function delete ($id)
    {
        DB::table('users')->where('id',$id)->delete();  
        return redirect('/user/tampil');
    }
}