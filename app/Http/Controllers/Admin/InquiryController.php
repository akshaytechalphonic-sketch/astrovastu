<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $statusFilter = $request->query('status', 'all');
        
        $query = Inquiry::orderBy('created_at', 'desc');
        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $inquiries = $query->paginate(15);

        return view('admin.inquiries.index', compact('inquiries', 'statusFilter'));
    }

    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $request->validate([
            'status' => 'required|in:New,Contacted,InProgress,Closed',
            'notes' => 'nullable|string',
        ]);

        $inquiry->update([
            'status' => $request->input('status'),
            'admin_notes' => $request->input('notes'),
        ]);

        return redirect()->route('admin.inquiries.show', ['id' => $id])->with('success', 'Lead status and notes updated successfully.');
    }

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('success', 'Lead deleted successfully.');
    }
}
