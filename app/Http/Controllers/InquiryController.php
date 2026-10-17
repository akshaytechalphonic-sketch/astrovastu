<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function consult()
    {
        return view('consult');
    }

    public function vastuConsultantLP()
    {
        return view('consult', ['isVastuLP' => true]);
    }

    public function storeConsult(Request $request)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Phone' => 'required|string|max:50',
            'DateOfBirth' => 'nullable|date',
            'TimeOfBirth' => 'nullable',
            'Gender' => 'nullable|string',
            'Language' => 'nullable|string',
            'PlaceOfBirth' => 'nullable|string|max:255',
            'Concern' => 'nullable|string',
        ]);

        $inquiry = Inquiry::create([
            'full_name' => $validated['FullName'],
            'phone' => $validated['Phone'],
            'date_of_birth' => $validated['DateOfBirth'] ?? null,
            'time_of_birth' => $validated['TimeOfBirth'] ?? null,
            'gender' => $validated['Gender'] ?? null,
            'language' => $validated['Language'] ?? null,
            'place_of_birth' => $validated['PlaceOfBirth'] ?? null,
            'concern' => $validated['Concern'] ?? null,
            'form_type' => 'Consultation',
            'status' => 'New',
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We will get back to you soon with a personalized price quote.'
            ]);
        }

        return redirect()->back()->with('success', 'Thank you! We will get back to you soon with a personalized price quote.');
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeContact(Request $request)
    {
        // Support both FullName/Phone and name/phone
        if (!$request->has('FullName') && $request->has('name')) {
            $request->merge(['FullName' => $request->input('name')]);
        }
        if (!$request->has('Phone') && $request->has('phone')) {
            $request->merge(['Phone' => $request->input('phone')]);
        }
        if (!$request->has('Concern') && ($request->has('service') || $request->has('location'))) {
            $concernText = 'Consultation for: ' . ($request->input('service') ?? 'General') . ' | Location: ' . ($request->input('location') ?? 'Not specified');
            $request->merge(['Concern' => $concernText]);
        }
        if (!$request->has('Subject')) {
            $request->merge(['Subject' => 'Vastu Consultation Request - Landing Page']);
        }

        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Phone' => 'required|string|max:50',
            'Email' => 'nullable|email|max:255',
            'Subject' => 'nullable|string|max:255',
            'Concern' => 'nullable|string',
        ]);

        $inquiry = Inquiry::create([
            'full_name' => $validated['FullName'],
            'phone' => $validated['Phone'],
            'email' => $validated['Email'] ?? null,
            'subject' => $validated['Subject'] ?? null,
            'concern' => $validated['Concern'] ?? null,
            'form_type' => 'Contact',
            'status' => 'New',
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We will get back to you soon.'
            ]);
        }

        return redirect()->back()->with('success', 'Thank you! We will get back to you soon.');
    }
}
