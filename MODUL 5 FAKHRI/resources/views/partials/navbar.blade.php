<nav class="navbar navbar-expand-lg navbar-light fixed-top justify-content-center">
    <div class="" id="navbarSupportedContent">
        <ul class="nav navbar-nav navbar-center text-center">
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? "active fw-bold" : "" }}" href="/">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Vaccine") ? "active fw-bold" : "" }}" href="/vaccine">VACCINE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Patient") ? "active fw-bold" : "" }}" href="/patient">PATIENT</a>
            </li>
        </ul>
    </div>
</nav>