<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Models\Disability;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicantsCount = Applicant::count();
        $usersCount = User::count();
        $disabilitiesCount = Disability::count();

        // Data for Chart.js - Applications by Disability
        $applicantsByDisability = Applicant::selectRaw('disability_id, COUNT(*) as count')
            ->with('disability')
            ->groupBy('disability_id')
            ->get()
            ->map(function ($item) {
                return [
                    'disability' => $item->disability ? $item->disability->name : 'غير محدد',
                    'count' => $item->count
                ];
            });

        return view('dashboard', compact('applicantsCount', 'usersCount', 'disabilitiesCount', 'applicantsByDisability'));
    }
}
