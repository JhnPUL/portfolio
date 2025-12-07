@extends('layouts.app')

@section('content')
{{-- NAVBAR (your custom design, not Breeze nav) --}}
<nav class="navbar">
    <div class="nav-container">
        <a href="#hero" class="nav-logo">
            <img src="Images/profile.jpg" alt="Profile" class="logo-img">
            <span class="logo-text">John Paul Caigas</span>
        </a>
        <div class="nav-menu" id="nav-menu">
            <a href="#hero" class="nav-link active">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#education" class="nav-link">Education</a>
            <a href="#skills" class="nav-link">Skills</a>
            <a href="#projects" class="nav-link">Projects</a>
            <a href="#certificates" class="nav-link">Certificates</a>
            <a href="#contact" class="nav-link">Contact</a>
            @auth
            @if(auth()->user()->isOwner())
            <a href="{{ route('owner.dashboard') }}" class="nav-link" style="color: #60a5fa;">Edit</a>
            @endif
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            @endauth
        </div>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section id="hero" class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-text">

                <h1 class="hero-title">
                    Hi, I'm <span class="gradient-text">John Paul .</span>
                </h1>

                <p class="hero-subtitle">
                    I'm an enthusiastic IT student with a strong interest in full-stack development and building practical, real-world applications. I enjoy working with modern technologies and continuously improving my skills by taking on projects that challenge me to think critically and solve problems creatively.
                    passionate about creating beautiful, functional, and user-centered digital experiences.
                </p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">View Projects</a>
                    <a href="#contact" class="btn btn-secondary">Contact Me</a>
                </div>
                <div class="social-links">
                    <a href="https://github.com/{{ env('GITHUB_USERNAME', 'JhnPUL') }}" target="_blank" class="social-link">GitHub</a>
                    <a href="{{ env('LINKEDIN_URL', '#') }}" target="_blank" class="social-link">LinkedIn</a>
                </div>
            </div>

            <div class="hero-image">
                <div class="profile-container">
                    <div class="profile-bg"></div>
                    <img src="Images/profile.jpg" alt="Profile" class="profile-img">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="about">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">About Me</h2>
            <p class="section-subtitle">Building knowledge through continuous learning and growth</p>
        </div>
        <div class="about-content">
            <div class="about-text">
                <p>
                    Outside of my studies, I love exploring new tools, learning from open-source projects, and connecting with the developer community. I'm committed to continuous learning and excited to grow into a developer who creates meaningful, user-centered solutions.
                </p>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">3+</div>
                        <div class="stat-label">Years coding</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Projects built</div>
                    </div>
                </div>
            </div>
            <div class="about-visual">
                <img src="Images/about.jpg" alt="About" class="about-img">
                <div class="feature-grid">
                    <div class="feature-item">
                        <span>UI/UX Design</span>
                    </div>
                    <div class="feature-item">
                        <span>Web Performance</span>
                    </div>
                    <div class="feature-item">
                        <span>Database Design</span>
                    </div>
                    <div class="feature-item">
                        <span>Clean Code</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EDUCATION --}}
<section id="education" class="education">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Education</h2>
            <p class="section-subtitle">Foundation and growth in academics and technology</p>
        </div>

        <div class="education-timeline">
            <div class="education-item">
                <div id="cspc" class="education-card">
                    <div class="education-image">
                        <img src="Images/cspc.jpg" alt="Camarines Sur Polytechnic Colleges">
                    </div>
                    <div class="education-content">
                        <span class="education-year">2023 - Present</span>
                        <h3>Camarines Sur Polytechnic Colleges</h3>
                        <p class="institution">BSIT · Major in Software Development</p>
                        <p class="details">Focused on software development, web technologies, and real-world projects.</p>
                    </div>
                </div>
            </div>

            <div class="education-item">

                <div id="usant" class="education-card">
                    <div class="education-image">
                        <img src="Images/usant.jpg" alt="University of Saint Anthony">
                    </div>
                    <div class="education-content">
                        <span class="education-year">2017 - 2023</span>
                        <h3>University of Saint Anthony</h3>
                        <p class="institution">Secondary Education</p>
                        <p class="details">Secondary education and skill development.</p>
                    </div>
                </div>
            </div>

            <div class="education-item">
                <div id="baras" class="education-card">
                    <div class="education-image">
                        <img src="Images/baras.jpg" alt="Baras Elementary School">
                    </div>
                    <div class="education-content">
                        <span class="education-year">2009 - 2017</span>
                        <h3>Baras Elementary School</h3>
                        <p class="institution">Baras, Philippines</p>
                        <p class="details">Foundation years of academic learning.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- SKILLS --}}
<section id="skills" class="skills">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Skills & Tools</h2>
            <p class="section-subtitle">
                Here are the technologies and tools I work with, rated by proficiency level.
            </p>
        </div>

        <div class="skills-grid">
            <div class="skill-category">
                <h3 class="category-title">Frontend</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span class="skill-name">HTML / CSS</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">JavaScript</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-category">
                <h3 class="category-title">Backend</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span class="skill-name">PHP / Laravel</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">MySQL</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-category">
                <h3 class="category-title">Tools & Workflow</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span class="skill-name">Git / GitHub</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span class="skill-name">VS Code</span>
                        <div class="skill-dots">
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot active"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PROJECTS (STATIC CARDS + LIVE GITHUB) --}}
<section id="projects" class="projects">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Projects</h2>
            <p class="section-subtitle">A showcase of my recent work and personal projects.</p>
        </div>



        {{-- Live GitHub projects using SAME .project-card styles --}}
        @if(!empty($projects))
        <div class="projects-grid" style="margin-top: 40px;">
            @foreach($projects as $project)
            <article class="project-card">
                <div class="project-content">
                    <h3 class="project-title">
                        <a href="{{ $project['url'] }}" target="_blank" class="project-link">
                            {{ $project['name'] }}
                        </a>
                    </h3>
                    <p class="project-description">
                        {{ $project['description'] }}
                    </p>
                    <div class="project-tech">
                        <span class="tech-tag">
                            {{ $project['language'] ?? 'Unknown' }}
                        </span>
                        <span class="tech-tag">
                            ⭐ {{ $project['stars'] ?? 0 }}
                        </span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- CERTIFICATES --}}
<section id="certificates" class="certificates" style="padding: 60px 0; background: linear-gradient(135deg, #1e293b 0%, #334155 100%);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Certificates</h2>
            <p class="section-subtitle">Professional certifications and credentials</p>
        </div>
        @if($certificates->isNotEmpty())
        <div class="certificates-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
            @foreach($certificates as $cert)
            <article class="certificate-card" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(59, 130, 246, 0.2); border-radius: 12px; padding: 24px; backdrop-filter: blur(10px); transition: all 0.3s ease;">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 12px;">
                    <h3 class="certificate-title" style="font-size: 18px; font-weight: 700; color: #60a5fa; margin: 0;">{{ $cert->title }}</h3>
                </div>
                <p class="certificate-issuer" style="color: #cbd5e1; font-size: 14px; margin: 8px 0;">{{ $cert->issuer }}</p>
                Issued: {{ \Carbon\Carbon::parse($cert->issued_date)->format('M d, Y') }}
                @if($cert->expiry_date)
                | Expires: {{ \Carbon\Carbon::parse($cert->expiry_date)->format('M d, Y') }}
                @endif
                @if($cert->description)
                <p class="certificate-description" style="color: #cbd5e1; font-size: 14px; margin: 12px 0; line-height: 1.6;">{!! e($cert->description) !!}</p>
                @endif
                @if($cert->credential_url)
                <a href="{{ $cert->credential_url }}" target="_blank" class="certificate-link" style="display: inline-block; color: #60a5fa; text-decoration: none; font-size: 13px; margin-top: 12px; padding: 6px 12px; border: 1px solid #3b82f6; border-radius: 6px; transition: all 0.3s ease;">
                    View Credential →
                </a>
                @endif
            </article>
            @endforeach
        </div>
        @else
        <p style="text-align: center; color: #94a3b8; padding: 40px 0;">No certificates added yet.</p>
        @endif
    </div>
</section>

{{-- CONTACT (SAME CLASS NAMES, LARAVEL FORM) --}}
<section id="contact" class="contact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Contact</h2>
            <p class="section-subtitle">Let's discuss your next project or just say hello.</p>
        </div>

        @if(session('success'))
        <div class="mb-4 p-3 rounded-md bg-green-50 text-sm text-green-700">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mb-4 p-3 rounded-md bg-red-50 text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-3 rounded-md bg-red-50 text-sm text-red-700">
            {{ session('error') }}
        </div>
        @endif

        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">📧</div>
                    <div class="contact-details">
                        <h3>Email</h3>
                        <p>jpmc4434@gmail.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📱</div>
                    <div class="contact-details">
                        <h3>Phone</h3>
                        <p>+63 992-228-1462</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div class="contact-details">
                        <h3>Location</h3>
                        <p>Nabua, Philippines</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('contact') }}" class="contact-form">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message / Ticket Details</label>
                    <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="footer">
    <div class="container footer-content">
        <p>&copy; {{ date('Y') }} John Paul Caigas. All rights reserved.</p>
        <div class="footer-social">
            <a href="https://github.com/JhnPUL" target="_blank" class="social-link">GitHub</a>
            <a href="https://www.linkedin.com/in/caigas-dev" target="_blank" class="social-link">LinkedIn</a>
        </div>
    </div>
</footer>

{{-- Optional: your original JS for navbar / hamburger --}}
<script>
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }
</script>
@endsection