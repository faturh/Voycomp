<?php

namespace App\Http\Controllers;

use App\Models\CompanyKeypoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyKeypointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keypoints = CompanyKeypoint::orderByDesc('id')->paginate(10);
        return view('admin.keypoints.index', compact('keypoints')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.keypoints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::transaction(function() use ($request) {
            $validated=$request->validated();

            if($request->hasFile('icon')){
                $iconPath=$request->file('icon')->store('icons', 'public');
                $validated['icon']=$iconPath;
            }

            $newCompanyKeypoint = CompanyKeypoint::create($validated);

        });
        
        return redirect()->route('admin.keypoints.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyKeypoint $companyKeypoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyKeypoint $companyKeypoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyKeypoint $companyKeypoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyKeypoint $companyKeypoint)
    {
        //
    }
}
