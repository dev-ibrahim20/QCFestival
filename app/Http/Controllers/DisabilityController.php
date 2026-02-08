<?php

namespace App\Http\Controllers;

use App\Models\Disability;
use Illuminate\Http\Request;

class DisabilityController extends Controller
{
    /**
     * Display a listing of disabilities
     */
    public function index()
    {
        $disabilities = Disability::all();
        return view('disabilities.index', compact('disabilities'));
    }

    /**
     * Show the form for creating a new disability
     */
    public function create()
    {
        return view('disabilities.create');
    }

    /**
     * Store a newly created disability in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:disabilities',
            'description' => 'required|string|max:255',
        ], [
            'name.required' => 'حقل اسم الإعاقة مطلوب',
            'name.string' => 'يجب أن يكون الاسم نصاً',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرف',
            'name.unique' => 'هذه الإعاقة موجودة بالفعل',
            'description.required' => 'حقل وصف الإعاقة مطلوب',
            'description.string' => 'يجب أن يكون الوصف نصاً',
            'description.max' => 'الوصف يجب ألا يتجاوز 255 حرف',
        ]);

        Disability::create($validated);

        return redirect()->route('disabilities.index')
            ->with('success', 'تم إضافة الإعاقة بنجاح!');
    }

    /**
     * Show the form for editing the specified disability
     */
    public function edit(Disability $disability)
    {
        return view('disabilities.edit', compact('disability'));
    }

    /**
     * Update the specified disability in database
     */
    public function update(Request $request, Disability $disability)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:disabilities,name,' . $disability->id,
            'description' => 'required|string|max:255',
        ], [
            'name.required' => 'حقل اسم الإعاقة مطلوب',
            'name.string' => 'يجب أن يكون الاسم نصاً',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرف',
            'name.unique' => 'هذه الإعاقة موجودة بالفعل',
            'description.required' => 'حقل وصف الإعاقة مطلوب',
            'description.string' => 'يجب أن يكون الوصف نصاً',
            'description.max' => 'الوصف يجب ألا يتجاوز 255 حرف',
        ]);

        $disability->update($validated);

        return redirect()->route('disabilities.index')
            ->with('success', 'تم تحديث الإعاقة بنجاح!');
    }

    /**
     * Remove the specified disability from database
     */
    public function destroy(Disability $disability)
    {
        $disability->delete();

        return redirect()->route('disabilities.index')
            ->with('success', 'تم حذف الإعاقة بنجاح!');
    }
}
