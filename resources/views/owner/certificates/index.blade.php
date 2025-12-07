@extends('layouts.app')

@section('content')
<section style="min-height: 100vh; padding-top: 96px; padding-bottom: 80px; background: radial-gradient(circle at top, rgba(59,130,246,0.25) 0, transparent 55%), radial-gradient(circle at bottom, rgba(139,92,246,0.25) 0, transparent 55%);">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 28px;">
            <div>
                <p style="font-size: 0.85rem; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                    Certificates
                </p>
                <h1 style="font-size: 2.1rem; font-weight: 800; color: #f8fafc; margin-bottom: 4px;">
                    Manage certificates
                </h1>
                <p style="font-size: 0.95rem; color: #9ca3af;">
                    Review, edit, or remove the certifications that appear on your public portfolio.
                </p>
            </div>
            <a href="{{ route('owner.certificates.create') }}"
               style="text-decoration: none; padding: 10px 18px; border-radius: 999px; background: linear-gradient(135deg,#3b82f6,#8b5cf6); color: #f9fafb; font-size: 0.9rem; font-weight: 600; box-shadow: 0 14px 30px rgba(59,130,246,0.4);">
                + Add new certificate
            </a>
        </div>

        @if(session('success'))
            <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.6); color: #bbf7d0; padding: 10px 14px; border-radius: 10px; font-size: 0.9rem; margin-bottom: 18px;">
                {{ session('success') }}
            </div>
        @endif

        @if($certificates->isEmpty())
            <div style="background: rgba(15,23,42,0.9); border-radius: 20px; padding: 40px 24px; border: 1px dashed rgba(148,163,184,0.6); text-align: center; box-shadow: 0 16px 40px rgba(15,23,42,0.85); backdrop-filter: blur(18px);">
                <p style="font-size: 1rem; color: #cbd5e1; margin-bottom: 10px;">
                    No certificates yet.
                </p>
                <p style="font-size: 0.9rem; color: #94a3b8; margin-bottom: 18px;">
                    Start by adding your first credential so recruiters can see your achievements.
                </p>
                <a href="{{ route('owner.certificates.create') }}"
                   style="text-decoration: none; padding: 10px 18px; border-radius: 999px; background: linear-gradient(135deg,#3b82f6,#8b5cf6); color: #f9fafb; font-size: 0.9rem; font-weight: 600;">
                    Add certificate
                </a>
            </div>
        @else
            <div style="background: rgba(15,23,42,0.92); border-radius: 22px; padding: 20px 20px 18px; border: 1px solid rgba(148,163,184,0.45); box-shadow: 0 20px 55px rgba(15,23,42,0.9); backdrop-filter: blur(20px);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <h2 style="font-size: 1rem; font-weight: 600; color: #e5e7eb;">Certificates list</h2>
                    <span style="font-size: 0.8rem; color: #64748b;">
                        Total: {{ $certificates->count() }}
                    </span>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px;">
                    @foreach($certificates as $cert)
                        <div style="background: radial-gradient(circle at top left, rgba(59,130,246,0.35) 0, transparent 55%), rgba(15,23,42,0.96); border-radius: 16px; padding: 16px 16px 14px; border: 1px solid rgba(148,163,184,0.5); color: #e5e7eb; display: flex; flex-direction: column; gap: 6px;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 8px;">
                                <div>
                                    <h3 style="font-size: 0.98rem; font-weight: 600; margin-bottom: 2px;">
                                        {{ $cert->title }}
                                    </h3>
                                    <p style="font-size: 0.85rem; color: #9ca3af;">
                                        {{ $cert->issuer }}
                                    </p>
                                </div>
                            </div>

                            <p style="font-size: 0.8rem; color: #94a3b8; margin-top: 4px;">
                                Issued: {{ \Carbon\Carbon::parse($cert->issued_date)->format('M Y') }}
                                @if($cert->expiry_date)
                                    | Expires: {{ \Carbon\Carbon::parse($cert->expiry_date)->format('M Y') }}
                                @endif
                            </p>

                            @if($cert->credential_url)
                                <a href="{{ $cert->credential_url }}" target="_blank"
                                   style="font-size: 0.8rem; color: #93c5fd; text-decoration: none; margin-top: 2px;">
                                    View credential ↗
                                </a>
                            @endif

                            <div style="display: flex; gap: 10px; margin-top: 10px;">
                                <a href="{{ route('owner.certificates.edit', $cert) }}"
                                   style="font-size: 0.8rem; color: #bfdbfe; text-decoration: none; padding: 6px 10px; border-radius: 999px; border: 1px solid rgba(59,130,246,0.6); background: rgba(15,23,42,0.9);">
                                    Edit
                                </a>
                                <form action="{{ route('owner.certificates.destroy', $cert) }}" method="POST" onsubmit="return confirm('Delete this certificate?')" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="font-size: 0.8rem; color: #fecaca; padding: 6px 10px; border-radius: 999px; border: 1px solid rgba(248,113,113,0.7); background: rgba(127,29,29,0.18); cursor: pointer;">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div style="margin-top: 22px; display: flex; justify-content: space-between; align-items: center; gap: 16px;">
            <a href="{{ route('portfolio') }}"
               style="text-decoration: none; padding: 9px 16px; border-radius: 999px; border: 1px solid rgba(148,163,184,0.55); color: #e5e7eb; font-size: 0.9rem; background: rgba(15,23,42,0.9);">
                ← View public portfolio
            </a>
            <span style="font-size: 0.8rem; color: #6b7280;">
                Tip: Keep only your strongest certificates visible to avoid clutter.
            </span>
        </div>
    </div>
</section>
@endsection
