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

        // Send Email Notification
        try {
            $toEmail = env('MAIL_TO_ADDRESS', 'ebrandindia@gmail.com');
            $settingEmail = null;
            try {
                $setting = \App\Models\Setting::first();
                if ($setting && !empty($setting->email)) {
                    $settingEmail = $setting->email;
                }
            } catch (\Throwable $e) {}

            $fullName = $validated['FullName'];
            $phone = $validated['Phone'];
            $email = null;
            $location = $validated['PlaceOfBirth'] ?? null;
            $service = 'Astrology Consultation';
            $subject = 'New Consultation Booking Request';
            $concern = $validated['Concern'] ?? null;
            $submittedAt = now()->timezone('Asia/Kolkata')->format('d M Y, h:i A');

            $htmlContent = view('emails.inquiry_notification', compact(
                'fullName', 'phone', 'email', 'location', 'service', 'subject', 'concern', 'submittedAt'
            ))->render();

            $mailSubject = "New Consultation Booking: {$fullName}";

            \Illuminate\Support\Facades\Mail::html($htmlContent, function ($message) use ($toEmail, $settingEmail, $mailSubject) {
                $recipients = array_filter(array_map('trim', explode(',', $toEmail)));
                if (!empty($recipients)) {
                    $message->to($recipients);
                } else {
                    $message->to('ebrandindia@gmail.com');
                }

                if ($settingEmail && !in_array($settingEmail, $recipients)) {
                    $message->cc($settingEmail);
                }

                $message->subject($mailSubject);
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Consultation inquiry email failed: ' . $e->getMessage());
        }

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
        // Honeypot Protection (silently redirect bots)
        if ($request->filled('website')) {
            return redirect()->to(url('/astrovastupooja/thankyou.html'));
        }

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

        // Send Email Notification
        try {
            $toEmail = env('MAIL_TO_ADDRESS', 'ebrandindia@gmail.com');
            $settingEmail = null;
            try {
                $setting = \App\Models\Setting::first();
                if ($setting && !empty($setting->email)) {
                    $settingEmail = $setting->email;
                }
            } catch (\Throwable $e) {}

            $fullName = $validated['FullName'];
            $phone = $validated['Phone'];
            $email = $validated['Email'] ?? null;
            $location = $request->input('location');
            $service = $request->input('service');
            $subject = $validated['Subject'] ?? 'New Consultation Lead';
            $concern = $validated['Concern'] ?? null;
            $submittedAt = now()->timezone('Asia/Kolkata')->format('d M Y, h:i A');

            $htmlContent = view('emails.inquiry_notification', compact(
                'fullName', 'phone', 'email', 'location', 'service', 'subject', 'concern', 'submittedAt'
            ))->render();

            $mailSubject = "New Lead: {$fullName} - " . ($service ? $service : 'Vastu Consultation');

            \Illuminate\Support\Facades\Mail::html($htmlContent, function ($message) use ($toEmail, $settingEmail, $mailSubject) {
                $recipients = array_filter(array_map('trim', explode(',', $toEmail)));
                if (!empty($recipients)) {
                    $message->to($recipients);
                } else {
                    $message->to('ebrandindia@gmail.com');
                }

                if ($settingEmail && !in_array($settingEmail, $recipients)) {
                    $message->cc($settingEmail);
                }

                $message->subject($mailSubject);
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Inquiry email failed: ' . $e->getMessage());
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => url('/astrovastupooja/thankyou.html'),
                'message' => 'Thank you! We will get back to you soon.'
            ]);
        }

        // If submitted from Landing Page, redirect to thank you page
        if ($request->has('Subject') && str_contains($request->input('Subject'), 'Landing Page')) {
            return redirect()->to(url('/astrovastupooja/thankyou.html'))->with('success', 'Thank you! We will get back to you soon.');
        }

        return redirect()->back()->with('success', 'Thank you! We will get back to you soon.');
    }
}
