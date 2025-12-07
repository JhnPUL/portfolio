@extends('layouts.app')

@section('content')
<section class="dashboard-hero" style="min-height: 100vh; padding-top: 96px; padding-bottom: 80px; background: radial-gradient(circle at top, rgba(59,130,246,0.25) 0, transparent 55%), radial-gradient(circle at bottom, rgba(139,92,246,0.2) 0, transparent 55%);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 32px;">
            <div>
                <p style="font-size: 0.9rem; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                    Owner Panel
                </p>
                <h1 style="font-size: 2.5rem; font-weight: 800; color: #f8fafc;">
                    Portfolio Dashboard
                </h1>
                <p style="color: #9ca3af; margin-top: 8px; max-width: 520px;">
                    Manage your certificates and keep your public portfolio up to date from a single, focused workspace.
                </p>
            </div>
            <div style="display: flex; gap: 12px; align-items: center;">
                <span style="width: 10px; height: 10px; border-radius: 999px; background: #22c55e; box-shadow: 0 0 12px rgba(34,197,94,0.9);"></span>
                <span style="font-size: 0.85rem; color: #a5b4fc;">Status: Editing mode</span>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1.5fr; gap: 24px; margin-bottom: 32px;">
            <div style="background: rgba(15,23,42,0.85); border-radius: 20px; padding: 24px 24px 20px; border: 1px solid rgba(148,163,184,0.35); box-shadow: 0 18px 45px rgba(15,23,42,0.7); backdrop-filter: blur(18px);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                    <h2 style="font-size: 1.1rem; font-weight: 600; color: #e5e7eb;">Quick actions</h2>
                    <span style="font-size: 0.8rem; color: #64748b; background: rgba(15,23,42,0.9); padding: 4px 10px; border-radius: 999px; border: 1px solid rgba(148,163,184,0.3);">
                        Certificates
                    </span>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
                    <a href="{{ route('owner.certificates.index') }}"
                       style="text-decoration: none; background: radial-gradient(circle at top left, rgba(59,130,246,0.35) 0, transparent 55%), rgba(15,23,42,0.9); border-radius: 16px; padding: 18px 18px 16px; border: 1px solid rgba(59,130,246,0.4); color: #e5e7eb; display: flex; flex-direction: column; gap: 6px; transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                            <h3 style="font-size: 1rem; font-weight: 600;">Manage certificates</h3>
                            <span style="font-size: 0.8rem; padding: 3px 9px; border-radius: 999px; background: rgba(15,23,42,0.9); border: 1px solid rgba(59,130,246,0.5); color: #bfdbfe;">
                                View list
                            </span>
                        </div>
                        <p style="font-size: 0.85rem; color: #9ca3af;">
                            Edit, re-order, or remove existing certificates shown on your public portfolio.
                        </p>
                    </a>

                    <a href="{{ route('owner.certificates.create') }}"
                       style="text-decoration: none; background: radial-gradient(circle at top right, rgba(34,197,94,0.35) 0, transparent 55%), rgba(15,23,42,0.9); border-radius: 16px; padding: 18px 18px 16px; border: 1px solid rgba(52,211,153,0.45); color: #e5e7eb; display: flex; flex-direction: column; gap: 6px; transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                            <h3 style="font-size: 1rem; font-weight: 600;">Add new certificate</h3>
                            <span style="font-size: 1.2rem; line-height: 1; color: #bbf7d0;">＋</span>
                        </div>
                        <p style="font-size: 0.85rem; color: #9ca3af;">
                            Quickly add new credentials with title, issuer, dates, and verification link.
                        </p>
                    </a>
                </div>
            </div>

            <div style="background: rgba(15,23,42,0.85); border-radius: 20px; padding: 20px 20px 18px; border: 1px solid rgba(148,163,184,0.35); box-shadow: 0 18px 45px rgba(15,23,42,0.7); backdrop-filter: blur(18px);">
                <h2 style="font-size: 1.05rem; font-weight: 600; color: #e5e7eb; margin-bottom: 10px;">Portfolio preview</h2>
                <p style="font-size: 0.85rem; color: #9ca3af; margin-bottom: 14px;">
                    Any changes you make here will reflect on your public portfolio in real time.
                </p>
                <div style="display: flex; flex-direction: column; gap: 10px; font-size: 0.85rem; color: #9ca3af;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>Public URL</span>
                        <a href="{{ route('portfolio') }}" target="_blank" style="color: #60a5fa; text-decoration: none;">Open portfolio ↗</a>
                    </div>
                    <div style="height: 1px; background: radial-gradient(circle, rgba(148,163,184,0.7) 0, transparent 70%); opacity: 0.6;"></div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Certificates section</span>
                        <span style="color: #a5b4fc;">Visible</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Last update</span>
                        <span style="color: #cbd5e1;">Just now</span>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px;">
            <a href="{{ route('portfolio') }}"
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 999px; border: 1px solid rgba(148,163,184,0.45); color: #e5e7eb; text-decoration: none; font-size: 0.9rem; background: rgba(15,23,42,0.8); backdrop-filter: blur(10px);">
                <span>←</span>
                <span>View public portfolio</span>
            </a>
            <span style="font-size: 0.8rem; color: #6b7280;">Tip: Use this dashboard only on desktop for the best editing experience.</span>
        </div>
    </div>
</section>
@endsection
