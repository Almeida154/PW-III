<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class MainController extends Controller {
    function home() {
        return view('home', [
            'count' =>  Contact::count()
        ]);
    }
    function contacts() {
        return view('contacts', [
            'contacts' => Contact::all(),
        ]);
    }
    function newContact() {
        return view('newContact');
    }
    function createContact(Request $req) {
        try {
            $data = json_decode($req->getContent());
            $contact = new Contact();
            $contact->name = ucwords($data->name);
            $contact->number = $data->number;
            $contact->save();
            echo json_encode(true);
        } catch (\Throwable $th) {
            echo json_encode(false);
        }
    }
    function deleteContact(Request $req) {
        try {
            Contact::findOrFail($req->id)->delete();
            return redirect()->route('contacts');
        } catch (\Throwable $th) {
            echo json_encode($th);
        }
    }
}
