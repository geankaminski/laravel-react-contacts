<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getData(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();

        $allLead = Contact::where('user_id', $user->id);

        $recentLeads      = (clone $allLead)->orderby('created_at', 'desc')->limit(5)->get();

        $data['recentLeads']  = $recentLeads;

        return response()->json([
            'message' => $data,
            'status'  => 'success'
        ]);
    }
}
