<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Disability;
use App\Http\Requests\StoreApplicantRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ApplicantsExport;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with('disability')->paginate(15);
        return view('applicants.index', compact('applicants'));
    }

    public function create()
    {
        $disabilities = Disability::all();
        return view('applicants.create', compact('disabilities'));
    }

    public function store(StoreApplicantRequest $request)
    {
        $validated = $request->validated();

        Applicant::create($validated);

        return redirect()->back()
            ->with('success', 'تم تقديم الطلب بنجاح!');
    }

    public function export()
    {
        return Excel::download(new ApplicantsExport, 'applicants_' . date('Y-m-d') . '.xlsx');
    }
}
