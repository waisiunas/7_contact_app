<?php

namespace App\Http\Controllers\deleted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class DeletedContactController extends Controller
{
    public function index()
    {
        return view('contact.deleted.index', [
            'contacts' => Auth::user()->contacts()->onlyTrashed()->paginate(10),
        ]);
    }

    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->find($id);
        if ($contact->restore()) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function delete($id)
    {
        $contact = Contact::onlyTrashed()->find($id);
        if ($contact->forceDelete()) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
