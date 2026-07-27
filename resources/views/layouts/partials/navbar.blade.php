<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm px-4">

    <h5 class="mb-0 fw-bold">

        Management Information Office

    </h5>

    <div class="ms-auto d-flex align-items-center">

        <span class="me-3">

            Welcome,

            <strong>{{ Auth::user()->name }}</strong>

        </span>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="btn btn-primary">

                Logout

            </button>

        </form>

    </div>

</nav>