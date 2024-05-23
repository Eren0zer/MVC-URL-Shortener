<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlShortener;
use Illuminate\Support\Str;


class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');
        $existingUrl = UrlShortener::where('original_url', $url)->first();

        if ($existingUrl) {
            return redirect()->route('home')->with('shortened_url', route('redirect', $existingUrl->short_code));
        }

        $short_code = $this->generateShortCode();
        UrlShortener::create([
            'original_url' => $url,
            'short_code' => $short_code
        ]);

        return redirect()->route('home')->with('shortened_url', route('redirect', $short_code));
    }

    public function redirect($short_code)
    {
        $url = UrlShortener::where('short_code', $short_code)->firstOrFail();
        return redirect($url->original_url);
    }

    private function generateShortCode()
    {
        return Str::random(12);
    }
}
