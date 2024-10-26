<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom mx-5">
    <div class="col-md-3 mb-2 mb-md-0">
        <h4>{{ isset($role) ? $role : 'ROLE' }}</h4>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a class="nav-link px-2 link-secondary" href="#">Home</a></li>
        <li><a class="nav-link px-2" href="#">Features</a></li>
        <li><a class="nav-link px-2" href="#">Pricing</a></li>
        <li><a class="nav-link px-2" href="#">FAQs</a></li>
        <li><a class="nav-link px-2" href="#">About</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <button class="btn btn-outline-primary me-2" type="button">Login</button>
        <button class="btn btn-primary" type="button">Sign-up</button>
    </div>
</header>
