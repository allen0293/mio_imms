<nav class="topbar d-flex justify-content-between align-items-center px-4">

    <div>

        <h4 class="mb-0">

            Dashboard

        </h4>

    </div>

    <div>

        <span class="me-3">

            Welcome,

            <strong>{{ Auth::user()->name }}</strong>

        </span>

        <form class="d-inline" method="POST" action="{{ route('logout') }}">

            @csrf

            <button class="btn btn-primary">

                Logout

            </button>

        </form>

    </div>

</nav>