<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio landing page with structured data.
     */
    public function index()
    {
        $portfolio = config('portfolio', []);

        return view('portfolio.index', [
            'hero' => $portfolio['hero'] ?? [],
            'about' => $portfolio['about'] ?? [],
            'skills' => $portfolio['skills'] ?? [],
            'experience' => $portfolio['experience'] ?? [],
            'projects' => $portfolio['projects'] ?? [],
            'education' => $portfolio['education'] ?? [],
            'certifications' => $portfolio['certifications'] ?? [],
        ]);
    }

    /**
     * Handle contact form submission.
     */
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for reaching out! Your message has been received.',
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for reaching out! Your message has been received.');
    }
}
