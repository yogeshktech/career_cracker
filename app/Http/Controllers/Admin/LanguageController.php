<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::latest()->paginate(10);
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:languages,name',
            'status' => 'required|in:0,1',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to create a language.');
        }

        Language::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.language.index')->with('success', 'Language created successfully.');
    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:languages,name,' . $language->id,
            'status' => 'required|in:0,1',
        ]);

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to update a language.');
        }

        $language->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.language.index')->with('success', 'Language updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a language.');
        }

        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('admin.language.index')->with('success', 'Language deleted successfully.');
    }
}