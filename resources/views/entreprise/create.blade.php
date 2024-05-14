
@vite(['resources/css/styles.css'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/EMSI.png') }}" alt="Logo" style="width: 200px;">
                </a>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('pilotePromotion.dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard Pilote</a>
                <a href="{{ route('etudiant.etudiant') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard Étudiant</a>
                <a href="{{ route('admins.etudiants') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-graduation-cap me-2"></i>Gérer Etudiants </a>
                <a href="{{ route('admins.users') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Gérer Users </a>
                <a href="{{ route('entreprise.create') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-building me-2"></i>Créer Entreprise</a>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    @endif
                @else
                    <a href="{{ route('logout') }}"
                        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off me-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
                <h2 style="font-size: 1.5rem; font-weight: bold; margin: 1rem;">Create Enterprise</h2>
                <form action="{{ route('entreprise.store')}}" method="POST" style="max-width: 30rem; margin: auto;">
                    @csrf
                    @method('POST')
                    <div style="margin-bottom: 1rem;">
                        <label for="name" style="display: block; font-weight: bold;">Name:</label>
                        <input type="text" id="name" name="name" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label for="secteur" style="display: block; font-weight: bold;">Sector of Activity:</label>
                        <input type="text" id="secteur" name="secteur" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                    </div>
                    <!-- Include existing locations for modification -->
                    <div style="margin-bottom: 1rem;">
                        <label for="ville" style="display: block; font-weight: bold;">ville:</label>
                        <input type="text" id="ville" name="ville" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                        <label for="pays" style="display: block; font-weight: bold;">pays:</label>
                        <input type="text" id="pays" name="pays" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                        <label for="code_postal" style="display: block; font-weight: bold;">code-postal:</label>
                        <input type="text" id="code_postal" name="code_postal" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                        <label for="numero_de_batiment" style="display: block; font-weight: bold;">numero_de_batiment:</label>
                        <input type="text" id="numero_de_batiment" name="numero_de_batiment" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;" required>
                      
                    </div>
                    <!-- Add JavaScript to dynamically add more location fields -->
                    <button class="btn btn-success"   type="submit" >Create Enterprise</button>
                </form>
        </div>
    </div>
    </div>

    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
