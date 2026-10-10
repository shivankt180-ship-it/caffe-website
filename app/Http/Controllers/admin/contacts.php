<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contact as ContactModel;
use Illuminate\Contracts\View\View;

class contacts extends Controller
{
    public function index(): View
    {
        $contacts = ContactModel::latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }
}
