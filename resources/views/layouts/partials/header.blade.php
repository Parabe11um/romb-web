<header class="relative wrapper !bg-[#ffffff] overflow-hidden">
    <nav class="navbar navbar-expand-lg classic navbar-light bg-white">
        <div class="container flex items-center">

            <div class="navbar-brand">
                <a href="/">
                    <img src="{{ asset('images/logo.svg') }}" alt="romb web">
                </a>
            </div>

            <div class="navbar-other ml-auto xl:hidden lg:hidden">
                <button class="hamburger offcanvas-nav-btn">
                    <span></span>
                </button>
            </div>

            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start max-w-full">

                <div class="offcanvas-header xl:hidden lg:hidden flex justify-between p-6">
                    <h3 class="text-white text-lg mb-0">romb web</h3>
                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body flex flex-col h-full xl:ml-auto lg:ml-auto">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link font-bold" href="{{ route('about') }}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold" href="{{ route('services.index') }}">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold" href="{{ route('projects.index') }}">Проекты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold" href="{{ route('articles.index') }}">Статьи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold" href="{{ route('contacts') }}">Контакты</a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </nav>
</header>
