<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        return view('member');
    }


    public function store(Request $request)
    {
        $inputs = $request->get('inputs');

        if ($personal = array_get($inputs, 'personal')){
            $member = Member::create($personal);
        }

        if ($guardian = array_get($inputs, 'guardian')){
            Guardian::create([
                'name' => array_get($guardian, 'name'),
                'phone' => array_get($guardian, 'phone'),
                'email' => array_get($guardian, 'email'),
                'address' => array_get($guardian, 'address'),
                'member_id' => $member->id
            ]);

        }



    }
}