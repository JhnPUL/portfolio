<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('owner.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('owner.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issued_date',
            'description' => 'nullable|string',
            'credential_url' => 'nullable|url'
        ]);

        Certificate::create($request->all());

        return redirect()->route('owner.certificates.index')
            ->with('success', 'Certificate added successfully!');
    }

    public function edit(Certificate $certificate)
    {
        return view('owner.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issued_date',
            'description' => 'nullable|string',
            'credential_url' => 'nullable|url'
        ]);

        $certificate->update($request->all());

        return redirect()->route('owner.certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('owner.certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }
}
