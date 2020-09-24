<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function store () {

        $phone = new Phone;
        $phone->phone = '095697454';
        $user = new User;
        $user->email = 't@yahoos.com';
        $user->password = encrypt('secret');
        $user->firstname = 'Firstname';
        $user->lastname = 'Lastname';
        $user->save();
        $user->phone()->save($phone);

        return 'Recorded';
    }

    public function show ($id) {

        return User::find($id)->phone ?? '';
    }

    public function innerJoin ($id) {
        
        return DB::table('users')
                    ->join('phones', 'users.id', '=', 'phones.user_id')
                    ->select('users.firstname', 'phones.phone')
                    ->where('users.id', '=', $id)
                    ->get();
                    
    }


    public function leftJoin () {

        return DB::table('users')
                    ->leftJoin('phones', 'users.id', '=', 'phones.user_id')
                    ->select('users.firstname', 'phones.phone')
                    ->where('users.id', '!=', 'NULL')
                    ->get();
    }

    public function rightJoin () {

        return DB::table('users')
                    ->rightJoin('phones', 'users.id', '=', 'phones.user_id')
                    ->select('users.firstname', 'phones.phone')
                    ->where('users.id', '!=', 'NULL')
                    ->get();
    }


}
