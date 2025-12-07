<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    public function index()
    {
        $username = env('GITHUB_USERNAME', 'JhnPUL');

        // Try to get cached projects first
        $projects = Cache::remember("github_projects_{$username}", 3600, function () use ($username) {
            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'Laravel-Portfolio',
                ])->timeout(10)->get("https://api.github.com/users/{$username}/repos");

                if (!$response->successful()) {
                    Log::warning("GitHub API error: {$response->status()}");
                    return [];
                }

                return collect($response->json())
                    ->where('private', false)
                    ->sortByDesc('stargazers_count')
                    ->take(6)
                    ->map(function ($repo) {
                        return [
                            'name'        => $repo['name'],
                            'description' => $repo['description'] ?? 'No description provided.',
                            'url'         => $repo['html_url'],
                            'language'    => $repo['language'] ?? 'Unknown',
                            'stars'       => $repo['stargazers_count'] ?? 0,
                        ];
                    })
                    ->values()
                    ->all();
            } catch (\Exception $e) {
                Log::error("Failed to fetch GitHub repos: {$e->getMessage()}");
                return [];
            }
        });

        // Get certificates
        $certificates = \App\Models\Certificate::all();

        return view('portfolio', compact('projects', 'certificates'));
    }

    public function contact(Request $request)
    {
        // 1) Validate form
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // 2) Build plain-text email content
        $body = "New portfolio contact / ticket\n\n"
            ."From: {$data['name']} <{$data['email']}>\n\n"
            ."Message:\n{$data['message']}\n";

        // 3) Send to configured email, with reply-to set to sender
        try {
            Mail::raw($body, function ($message) use ($data) {
                $message->to(env('CONTACT_EMAIL', 'jpmc4434@gmail.com'))
                        ->subject('New Portfolio Contact')
                        ->replyTo($data['email'], $data['name']);
            });
            return back()->with('success', 'Thanks for reaching out! Your message was sent.');
        } catch (\Exception $e) {
            Log::error("Failed to send contact email: {$e->getMessage()}");
            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    }

    public function owner()
    {
        return view('owner.dashboard');
    }
}
