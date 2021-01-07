<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('user.lead.index');
    }
}
