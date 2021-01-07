<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function listData(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();

        $perPage = $request['per_page'];
        $sortBy = $request['sort_by'];
        $sortType = $request['sort_type'];


        $contacts = Contact::where('user_id', $user->id)->orderBy($sortBy, $sortType);

        if ($request['query'] != '') {
            $contacts->where('name', 'like', '%' . $request['query'] . '%');
        }

        return response()->json([
            'message' => $contacts->paginate($perPage),
            'status' => 'success'
        ]);
    }

    public function create(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();

        $validate = Validator::make($request->all(), [
            'name'        => 'required|string',
            'email'       => 'required|email|unique:contacts,email',
            'phone'       => 'required|unique:contacts,phone',
            'address'     => '',
            'description' => '',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error'
            ], 401);
        }

        $NewContact = Contact::create([
            'user_id'     => $user->id,
            'name'        => $request['name'],
            'email'       => $request['email'],
            'phone'       => $request['phone'],
            'address'     => $request['address'],
            'description' => $request['description'],
        ]);

        if ($NewContact) {
            return response()->json([
                'message' => 'Contato salvo!',
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'Algo errado aconteceu',
                'status' => 'error'
            ]);
        }
    }

    public function update(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();

        $lead = Contact::where('id',$request['lead_id'])
                        ->where('user_id', $user->id)
                        ->first();

        if (empty($lead)) {
            return response()->json([
                'message' => 'Contato não encontrado',
                'status' => 'error'
            ]);
        }


        $validate = Validator::make($request->all(), [
            'name'        => 'required|string',
            'email'       => 'required|email|unique:contacts,email,'.$lead->id.',id',
            'phone'       => 'required|unique:contacts,phone,'.$lead->id.',id',
            'address'     => '',
            'description' => '',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error'
            ], 401);
        }

        $updateLead = $lead->update([
            'name'        => $request['name'],
            'email'       => $request['email'],
            'phone'       => $request['phone'],
            'address'     => $request['address'],
            'description' => $request['description'],
        ]);

        return response()->json([
            'message' => 'Contato atualizado!',
            'status' => 'success'
        ]);
    }

    public function destroy(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();
        $lead = Contact::where('id',$request['lead_id'])
                        ->where('user_id', $user->id)
                        ->first();

        if (empty($lead)) {
            return response()->json([
                'message' => 'Contato não encontrado',
                'status' => 'error'
            ]);
        }

        $deleteLead = $lead->delete();

        if ($deleteLead) {
            return response()->json([
                'message' => 'Contato apagado!',
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'Algo errado aconteceu',
                'status' => 'error'
            ]);
        }
    }
}
