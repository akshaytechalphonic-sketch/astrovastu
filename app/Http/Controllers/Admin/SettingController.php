<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'guru_name' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'phone_raw' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'whatsapp' => 'required|string|max:100',
            'about_short' => 'required|string',
            'footer_desc' => 'required|string',
            'facebook_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'hero_badge' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_quote' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_trust_1' => 'required|string|max:255',
            'hero_trust_2' => 'required|string|max:255',
            'hero_trust_3' => 'required|string|max:255',
            'experience_years' => 'required|integer',
            'stat_gems' => 'required|integer',
            'stat_poojas' => 'required|integer',
            'stat_countries' => 'required|integer',
            'cta_title' => 'required|string|max:255',
            'cta_subtitle' => 'required|string|max:255',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
            'analytics_code' => 'nullable|string',
            'seo_tags' => 'nullable|string',
            'guru_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('guru_image')) {
            if ($setting->guru_image) {
                Storage::disk('public')->delete($setting->guru_image);
            }
            $setting->guru_image = $request->file('guru_image')->store('settings', 'public');
        }

        $setting->fill(collect($validated)->except('guru_image')->toArray())->save();

        // Clear settings cache
        Cache::forget('site_settings');

        return redirect()->route('admin.settings.edit')->with('success', 'Site settings updated successfully.');
    }
}
