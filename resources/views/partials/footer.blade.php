<footer class="footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <a href="{{ url('/') }}" class="logo">Max<span>Murage</span></a>
            <p>Building secure, scalable healthcare IT systems and full-stack applications.</p>
        </div>
        <div class="footer-links">
            <h3>Connect</h3>
            <div class="social-links">
                <a href="mailto:wairimumax1@gmail.com">Email</a>
                <a href="https://www.linkedin.com/in/max-murage" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                <a href="tel:+254703115896">Phone</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Max Murage. Designed & Built in Nairobi, Kenya.</p>
    </div>
</footer>

<style>
.footer {
    background-color: var(--bg-surface);
    padding: 4rem 0 0 0;
    margin-top: 4rem;
    border-top: 1px solid var(--border-color);
}

.footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
    margin-bottom: 3rem;
}

.footer-brand p {
    color: var(--text-secondary);
    margin-top: 1rem;
    max-width: 300px;
}

.footer-links h3 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    color: var(--text-primary);
}

.social-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.footer-bottom {
    text-align: center;
    padding: 1.5rem;
    border-top: 1px solid var(--border-color);
    color: var(--text-secondary);
    font-size: 0.9rem;
}
</style>
