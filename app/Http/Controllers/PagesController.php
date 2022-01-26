<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('pages.welcome');
    }

    public function contacts() {
        $contact_details = [
            [
                'name' => 'James Gosling',
                'email' => 'jamesgosling@email.com',
                'contact_no' => '09123123123'
            ],
            [
                'name' => 'Taylor Otwel',
                'email' => 'taylorotwel@email.com',
                'contact_no' => '09123123123'
            ],
            [
                'name' => 'Charles Babbage',
                'email' => 'charlesbabbage@email.com',
                'contact_no' => '09123123123'
            ],
        ];

        return view('pages.contacts', [
            'contacts' => $contact_details
        ]);
    }

    public function test() {
        $name = 'Jane Doe';
        $names = [
            'James Gosling',
            'Taylor Otwel',
            'Brendan Eich',
            'Rasmus Lerdorf',
            'Charles Babbage',
        ];

        return view('welcome', [
            'name' => $name,
            'names' => $names,
        ]);
        
    }


}
