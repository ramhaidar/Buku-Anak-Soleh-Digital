    <footer class="footer fixed-bottom text-center bg-transparent py-3">
        <div class="container">
            @if (Request::is('login'))
                <span class="text-light fw-light">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights
                    reserved.</span>
            @else
                <span class="text-dark fw-light">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights
                    reserved.</span>
            @endif
        </div>
    </footer>
