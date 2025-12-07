@extends('layouts.app')

@section('content')
<section style="min-height: 100vh; padding-top: 96px; padding-bottom: 80px; background: radial-gradient(circle at top, rgba(59,130,246,0.3) 0, transparent 55%), radial-gradient(circle at bottom, rgba(34,197,94,0.25) 0, transparent 55%);">
    <div class="container" style="max-width: 720px; margin: 0 auto;">
        <div style="margin-bottom: 28px;">
            <p style="font-size: 0.85rem; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                Certificates
            </p>
            <h1 style="font-size: 2rem; font-weight: 800; color: #f8fafc; margin-bottom: 4px;">
                Add new certificate
            </h1>
            <p style="font-size: 0.95rem; color: #9ca3af;">
                Add a credential to highlight your achievements on the public portfolio.
            </p>
        </div>

        <div style="background: rgba(15,23,42,0.9); border-radius: 20px; padding: 24px 24px 20px; border: 1px solid rgba(148,163,184,0.45); box-shadow: 0 20px 50px rgba(15,23,42,0.9); backdrop-filter: blur(20px);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 0.85rem; color: #a5b4fc;">New credential</span>
                <a href="{{ route('owner.certificates.index') }}"
                   style="font-size: 0.8rem; color: #cbd5e1; text-decoration: none; padding: 6px 12px; border-radius: 999px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.9);">
                    ← Back to list
                </a>
            </div>

            @if($errors->any())
                <div style="background: rgba(248,113,113,0.12); border: 1px solid rgba(248,113,113,0.5); color: #fecaca; padding: 10px 12px; border-radius: 10px; font-size: 0.85rem; margin-bottom: 14px;">
                    <ul style="list-style: disc; padding-left: 18px; margin: 0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('owner.certificates.store') }}" style="display: flex; flex-direction: column; gap: 18px; margin-top: 6px;">
                @csrf

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                        Certificate title <span style="color:#f97373">*</span>
                    </label>
                    <input type="text" name="title" required
                           value="{{ old('title') }}"
                           style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.95rem; outline: none;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                        Issuer / organization <span style="color:#f97373">*</span>
                    </label>
                    <input type="text" name="issuer" required
                           value="{{ old('issuer') }}"
                           style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.95rem; outline: none;">
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit,minmax(160px,1fr)); gap: 14px;">
                    <div style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                            Issued date <span style="color:#f97373">*</span>
                        </label>
                        <input type="date" name="issued_date" required
                               value="{{ old('issued_date') }}"
                               style="width: 100%; padding: 9px 12px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                            Expiry date (optional)
                        </label>
                        <input type="date" name="expiry_date"
                               value="{{ old('expiry_date') }}"
                               style="width: 100%; padding: 9px 12px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.9rem; outline: none;">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                        Description (optional)
                    </label>
                    <textarea name="description" rows="4"
                              style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.95rem; outline: none; resize: vertical;">{{ old('description') }}</textarea>
                </div>

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 0.85rem; font-weight: 500; color: #cbd5e1;">
                        Credential URL (optional)
                    </label>
                    <input type="url" name="credential_url"
                           value="{{ old('credential_url') }}"
                           placeholder="https://credentials.example.com/your-cert"
                           style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(148,163,184,0.6); background: rgba(15,23,42,0.85); color: #e5e7eb; font-size: 0.95rem; outline: none;">
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-top: 18px;">
                    <a href="{{ route('owner.certificates.index') }}"
                       style="flex: 1; text-align: center; padding: 9px 14px; border-radius: 999px; border: 1px solid rgba(148,163,184,0.6); color: #e5e7eb; text-decoration: none; font-size: 0.9rem; background: rgba(15,23,42,0.9);">
                        Cancel
                    </a>
                    <button type="submit"
                            style="flex: 1; padding: 10px 14px; border-radius: 999px; border: none; background: linear-gradient(135deg,#3b82f6,#8b5cf6); color: #f9fafb; font-weight: 600; font-size: 0.9rem; cursor: pointer; box-shadow: 0 12px 30px rgba(59,130,246,0.45);">
                        Add certificate
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
