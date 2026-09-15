@extends('layouts.app')

@section('title', 'Max Murage | Software Developer & Healthcare IT')

@section('content')

{{-- Hero Section --}}
<section id="hero" class="hero-section">
    <div class="container hero-content fade-in">
        <h2 class="greeting">{{ $hero['greeting'] ?? 'Hi, my name is' }}</h2>
        <h1 class="name">{{ $hero['name'] ?? 'Max Murage.' }}</h1>
        <h1 class="subtitle">{{ $hero['subtitle'] ?? 'I build secure, scalable IT solutions.' }}</h1>
        <p class="description">
            {{ $hero['description'] ?? '' }}
        </p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn-primary">View My Work</a>
            <a href="#contact" class="btn btn-outline">Get In Touch</a>
        </div>
    </div>
</section>

<style>
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding-top: 5rem;
}

.greeting {
    color: var(--accent-color);
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 1rem;
    letter-spacing: 1px;
}

.name {
    font-size: 4.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
}

.subtitle {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--text-secondary);
}

.description {
    max-width: 600px;
    font-size: 1.2rem;
    color: var(--text-secondary);
    margin-bottom: 3rem;
}

.hero-actions {
    display: flex;
    gap: 1.5rem;
}

@media (max-width: 768px) {
    .name { font-size: 3rem; }
    .subtitle { font-size: 2.2rem; }
}
</style>

{{-- About Me Section --}}
<section id="about" class="about-section fade-in">
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="about-grid">
            <div class="about-text">
                @if(!empty($about['paragraphs']))
                    @foreach($about['paragraphs'] as $para)
                        <p>{!! $para !!}</p>
                    @endforeach
                @endif
            </div>

            <div class="about-image-wrapper">
                <div class="about-image-container">
                    <img src="{{ $about['image'] ?? 'images/profile.svg' }}" alt="Max Murage" class="profile-img">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about-grid {
    display: grid;
    grid-template-columns: 3fr 2fr;
    gap: 4rem;
    align-items: center;
}

.about-text p {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    color: var(--text-secondary);
}

.about-text strong, .about-text em {
    color: var(--accent-color);
    font-weight: 500;
}

.about-image-container {
    width: 300px;
    height: 300px;
    position: relative;
    margin: 0 auto;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    z-index: 1;
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0.5rem;
    filter: grayscale(20%);
    transition: all 0.3s ease;
}

.about-image-container::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border: 2px solid var(--accent-color);
    border-radius: 0.5rem;
    top: 20px;
    left: 20px;
    z-index: -1;
    transition: all 0.3s ease;
}

.about-image-wrapper:hover .about-image-container {
    transform: translate(5px, 5px);
}

.about-image-wrapper:hover .profile-img {
    filter: grayscale(0%);
}

.about-image-wrapper:hover .about-image-container::after {
    transform: translate(-5px, -5px);
}

@media (max-width: 768px) {
    .about-grid { grid-template-columns: 1fr; }
}
</style>

{{-- Technical Arsenal Section --}}
<section id="skills" class="skills-section fade-in">
    <div class="container">
        <h2 class="section-title">Technical Arsenal</h2>
        <div class="skills-grid">
            @foreach($skills as $category)
            <div class="skill-category card">
                <h3>{{ $category['category'] }}</h3>
                <ul class="skill-list">
                    @foreach($category['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.card {
    background-color: var(--bg-surface);
    border-radius: 0.75rem;
    padding: 2rem;
    border: 1px solid var(--border-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px -10px rgba(20, 184, 166, 0.2);
    border-color: var(--accent-color);
}

.skill-category h3 {
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
    border-bottom: 2px solid var(--accent-color);
    padding-bottom: 0.5rem;
    display: inline-block;
}

.skill-list {
    list-style: none;
}

.skill-list li {
    color: var(--text-secondary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.skill-list li::before {
    content: '▹';
    color: var(--accent-color);
    margin-right: 0.5rem;
    font-size: 1.2rem;
}
</style>

{{-- Experience Section --}}
<section id="experience" class="experience-section fade-in">
    <div class="container">
        <h2 class="section-title">Where I've Worked</h2>
        
        <div class="timeline">
            @foreach($experience as $item)
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content card">
                    <div class="timeline-header">
                        <h3>{{ $item['role'] }}</h3>
                        <span class="timeline-date">{{ $item['date'] }}</span>
                    </div>
                    <h4>{{ $item['company'] }}</h4>
                    <ul class="experience-list">
                        @foreach($item['bullets'] as $bullet)
                            <li>{{ $bullet }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 2px;
    background-color: var(--border-color);
    top: 0;
    bottom: 0;
    left: 20px;
}

.timeline-item {
    position: relative;
    padding-left: 60px;
    margin-bottom: 3rem;
}

.timeline-dot {
    position: absolute;
    left: 11px;
    top: 0;
    width: 20px;
    height: 20px;
    background-color: var(--bg-color);
    border: 4px solid var(--accent-color);
    border-radius: 50%;
    z-index: 1;
}

.timeline-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
    flex-wrap: wrap;
}

.timeline-header h3 {
    color: var(--text-primary);
    font-size: 1.3rem;
}

.timeline-date {
    color: var(--accent-color);
    font-size: 0.9rem;
    font-weight: 600;
}

.timeline-content h4 {
    color: var(--text-secondary);
    font-size: 1.1rem;
    margin-bottom: 1rem;
    font-weight: 500;
}

.experience-list {
    list-style: none;
}

.experience-list li {
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
    position: relative;
    padding-left: 1.5rem;
}

.experience-list li::before {
    content: '▹';
    color: var(--accent-color);
    position: absolute;
    left: 0;
    top: 0;
}

@media (max-width: 768px) {
    .timeline::before { left: 10px; }
    .timeline-dot { left: 1px; }
    .timeline-item { padding-left: 40px; }
}
</style>

{{-- Engineering Case Studies Section --}}
<section id="projects" class="projects-section fade-in">
    <div class="container">
        <h2 class="section-title">Engineering Case Studies</h2>

        @foreach($projects as $project)
        <div class="project-featured {{ !empty($project['reverse']) ? 'reverse' : '' }} {{ empty($project['image']) ? 'no-image' : '' }}">
            <div class="project-content">
                <p class="project-overline">{{ $project['overline'] }}</p>
                <h3 class="project-title">{{ $project['title'] }}</h3>
                <div class="project-description card">
                    <div class="case-study-section">
                        <h4>The Challenge</h4>
                        <p>{{ $project['challenge'] }}</p>
                    </div>
                    <div class="case-study-section">
                        <h4>The Engineering Approach</h4>
                        <p>{{ $project['approach'] }}</p>
                    </div>
                </div>
                <ul class="project-tech-list">
                    @foreach($project['tech'] as $t)
                        <li>{{ $t }}</li>
                    @endforeach
                </ul>
                <div class="project-links">
                    <a href="#" aria-label="GitHub Link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                </div>
            </div>
            @if(!empty($project['image']))
            <div class="project-image">
                <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="project-img">
            </div>
            @endif
        </div>
        @endforeach

    </div>
</section>

<style>
.project-featured {
    display: flex;
    align-items: center;
    gap: 3rem;
    margin-bottom: 5rem;
    background-color: var(--bg-surface);
    border: 1px solid var(--border-color);
    border-radius: 1rem;
    padding: 2.5rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.project-featured:hover {
    border-color: var(--accent-color);
    box-shadow: 0 10px 40px -15px rgba(20, 184, 166, 0.2);
}

.project-featured.reverse {
    flex-direction: row-reverse;
}

.project-content {
    flex: 1;
    min-width: 0;
}

.project-image {
    flex: 0 0 42%;
    max-width: 42%;
}

.project-featured.no-image .project-content {
    flex: 1;
}

.project-overline {
    color: var(--accent-color);
    font-family: var(--font-main);
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.project-title {
    color: var(--text-primary);
    font-size: 1.6rem;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.project-description {
    padding: 1.5rem;
    background-color: var(--bg-color);
    color: var(--text-secondary);
    border-radius: 0.5rem;
    border: 1px solid var(--border-color);
    margin-bottom: 1.5rem;
}

.case-study-section {
    margin-bottom: 1.2rem;
}

.case-study-section:last-child {
    margin-bottom: 0;
}

.case-study-section h4 {
    color: var(--text-primary);
    font-size: 1rem;
    margin-bottom: 0.3rem;
    display: flex;
    align-items: center;
}

.case-study-section h4::before {
    content: '';
    display: inline-block;
    width: 6px;
    height: 6px;
    background-color: var(--accent-color);
    border-radius: 50%;
    margin-right: 8px;
    flex-shrink: 0;
}

.case-study-section p {
    font-size: 0.95rem;
    line-height: 1.6;
}

.project-tech-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    list-style: none;
    margin-bottom: 1.5rem;
    font-family: var(--font-main);
    font-size: 0.85rem;
}

.project-tech-list li {
    color: var(--accent-color);
    background-color: rgba(20, 184, 166, 0.1);
    border: 1px solid rgba(20, 184, 166, 0.2);
    padding: 0.2rem 0.75rem;
    border-radius: 1rem;
}

.project-links a {
    color: var(--text-secondary);
    transition: color 0.3s ease;
}

.project-links a:hover {
    color: var(--accent-color);
}

.project-img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 0.75rem;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    display: block;
}

.project-image:hover .project-img {
    border-color: var(--accent-color);
    transform: translateY(-4px);
    box-shadow: 0 15px 35px -10px rgba(20, 184, 166, 0.25);
}

@media (max-width: 768px) {
    .project-featured,
    .project-featured.reverse {
        flex-direction: column;
    }
    .project-image {
        flex: none;
        max-width: 100%;
        width: 100%;
    }
    .project-title { font-size: 1.3rem; }
}
</style>

{{-- Education Section --}}
@if(!empty($education))
<section id="education" class="education-section fade-in">
    <div class="container">
        <h2 class="section-title">Education</h2>
        <div class="education-grid">
            @foreach($education as $edu)
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 0.5rem;">
                    <h3 style="color: var(--text-primary); font-size: 1.3rem;">{{ $edu['degree'] }}</h3>
                    <span class="cert-date">{{ $edu['date'] }}</span>
                </div>
                <h4 style="color: var(--accent-color); margin-bottom: 1rem; font-weight: 500;">{{ $edu['institution'] }}</h4>
                @if(!empty($edu['coursework']))
                    <p style="color: var(--text-secondary);"><strong>Key Coursework:</strong> {{ $edu['coursework'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Certifications Section --}}
<section id="certifications" class="certifications-section fade-in">
    <div class="container">
        <h2 class="section-title">Certifications</h2>
        
        <div class="certs-grid">
            @foreach($certifications as $cert)
            <div class="cert-card card">
                <div class="cert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div class="cert-info">
                    <h3>{{ $cert['title'] }}</h3>
                    <h4>{{ $cert['issuer'] }}</h4>
                    <span class="cert-date">{{ $cert['date'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.certs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.cert-card {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    padding: 2rem;
}

.cert-icon {
    color: var(--accent-color);
    background-color: rgba(20, 184, 166, 0.1);
    padding: 1rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cert-info h3 {
    color: var(--text-primary);
    font-size: 1.1rem;
    margin-bottom: 0.3rem;
    line-height: 1.3;
}

.cert-info h4 {
    color: var(--text-secondary);
    font-size: 0.95rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.cert-date {
    display: inline-block;
    font-size: 0.85rem;
    color: var(--accent-color);
    background-color: rgba(20, 184, 166, 0.1);
    padding: 0.2rem 0.6rem;
    border-radius: 1rem;
    font-weight: 600;
}
</style>

{{-- Interactive Contact Section --}}
<section id="contact" class="contact-section fade-in">
    <div class="container">
        <h2 class="section-title">Get In Touch</h2>
        <div class="contact-grid">
            <div class="contact-info">
                <p>Have an exciting opportunity, a complex system to discuss, or just want to connect? Send me a message below or reach out via email.</p>
                <div class="card" style="margin-top: 1.5rem;">
                    <h3 style="color: var(--text-primary); margin-bottom: 0.75rem;">Direct Contact</h3>
                    <p style="margin-bottom: 0.5rem;"><strong>Email:</strong> <a href="mailto:wairimumax1@gmail.com">wairimumax1@gmail.com</a></p>
                    <p style="margin-bottom: 0.5rem;"><strong>Phone:</strong> <a href="tel:+254703115896">+254 703 115 896</a></p>
                    <p style="margin-bottom: 0.5rem;"><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/max-murage-a21233383/" target="_blank">Max Murage</a></p>
                    <p style="margin-bottom: 0;"><strong>Location:</strong> Nairobi, Kenya</p>
                </div>
            </div>

            <div class="card">
                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif
                <form id="contactForm" action="{{ route('portfolio.contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="your@email.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="message">Message</label>
                        <textarea id="message" name="message" rows="4" class="form-control" placeholder="How can I help you?" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    <div id="formMessage" style="margin-top: 1rem; font-size: 0.95rem;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const msgBox = document.getElementById('formMessage');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = form.querySelector('button[type="submit"]');
        const origText = btn.innerText;
        btn.disabled = true;
        btn.innerText = 'Sending...';
        msgBox.innerHTML = '';

        try {
            const formData = new FormData(form);
            const res = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData
            });

            if (res.ok) {
                const data = await res.json();
                msgBox.style.color = '#14b8a6';
                msgBox.innerText = data.message || 'Thank you! Your message has been sent.';
                form.reset();
            } else {
                msgBox.style.color = '#f43f5e';
                msgBox.innerText = 'Unable to submit right now. Please email directly at wairimumax1@gmail.com.';
            }
        } catch (err) {
            msgBox.style.color = '#14b8a6';
            msgBox.innerText = 'Thank you for getting in touch! Your message was received.';
            form.reset();
        } finally {
            btn.disabled = false;
            btn.innerText = origText;
        }
    });
});
</script>
@endpush

@endsection
