<nav id="nav" class="left-to-right drawer z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-10">
        <button id="nav-close">
            <i class="fa-solid fa-square-xmark fa-3x text-primary"></i>
        </button>
    </div>
    <ul class="text-primary text-2xl font-bold items-center justify-center flex flex-col gap-10">
        <li>
            <a href="{{ route('index') }}">
                Home
            </a>
        </li>
        @if (Auth::check())
            {{-- ログインしている場合 --}}
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>
                        Logout
                    </button>
                </form>
            </li>
            <li>
                <a href="/mypage">
                    Mypage
                </a>
            </li>
        @else
            {{-- ログインしていない場合 --}}
            <li>
                <a href="{{ route('register') }}">
                    Registration
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    Login
                </a>
            </li>
        @endif

    </ul>
</nav>
