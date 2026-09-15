<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Max Murage | Software Developer & Healthcare IT')</title>
        <meta name="description" content="@yield('meta_description', 'Portfolio of Max Murage, a Full-Stack Developer specializing in Healthcare IT Systems, Laravel, and secure middleware.')">

        <!-- Asset paths compiled by Vite -->
        <link rel="preload" as="style" href="build/assets/app-CGS3G9dt.css" />
        <link rel="stylesheet" href="build/assets/app-CGS3G9dt.css" />
        
        <!-- Custom UI & Interactive Enhancements -->
        <style>
            .contact-section {
                padding: 6rem 0;
            }
            .contact-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
                align-items: start;
            }
            .contact-info p {
                color: var(--text-secondary);
                margin-bottom: 1.5rem;
                font-size: 1.1rem;
            }
            .form-group {
                margin-bottom: 1.5rem;
            }
            .form-label {
                display: block;
                color: var(--text-primary);
                font-size: 0.9rem;
                font-weight: 500;
                margin-bottom: 0.5rem;
            }
            .form-control {
                width: 100%;
                background-color: var(--bg-surface);
                border: 1px solid var(--border-color);
                border-radius: 0.5rem;
                padding: 0.85rem 1rem;
                color: var(--text-primary);
                font-family: var(--font-main);
                font-size: 1rem;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }
            .form-control:focus {
                outline: none;
                border-color: var(--accent-color);
                box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.15);
            }
            .alert-success {
                background-color: rgba(20, 184, 166, 0.15);
                border: 1px solid var(--accent-color);
                color: var(--accent-color);
                padding: 1rem;
                border-radius: 0.5rem;
                margin-bottom: 1.5rem;
            }
            @media (max-width: 768px) {
                .contact-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        @stack('styles')
    </head>
    <body>
        @include('partials.navbar')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')

        <!-- Fade-In Animation Script -->
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll('.fade-in').forEach((element) => {
                    observer.observe(element);
                });
            });
        </script>
        @stack('scripts')
    </body>
</html>
