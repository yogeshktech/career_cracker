<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrier;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrirController extends Controller
{
    public function index()
    {
        $careers = Carrier::latest()->paginate(10);
        return view('admin.career.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

   
    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a career applicant.');
        }

        $career = Carrier::findOrFail($id);

        if ($career->resume && file_exists(public_path($career->resume))) {
            unlink(public_path($career->resume));
        }

        $career->delete();

        return redirect()->route('career.index')->with('success', 'Career applicant deleted successfully.');
    }

    public function viewEnquiry()
    {
        $enqueries = Enquiry::orderByDesc('created_at')->paginate('12');
        return view('admin.career.enquiry',compact('enqueries'));
    }

    public function delete($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to delete a career applicant.');
        }
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->back()->with('success', 'Enquiry applicant deleted successfully.');

    }
}
