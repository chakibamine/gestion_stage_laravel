@vite(['resources/css/welcome.css'])
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
                <a href="{{ route('admins.pilotes') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Go to Pilotes</a>
                <a href="/stageoffers" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Offres de stage</a>

                <a href="{{ route('pilotePromotion.preview') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-graduation-cap me-2"></i>editer</a>

                <a href="{{ route('admins.users') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Gérer Users </a>
                <a href="{{ route('entreprise.create') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-building me-2"></i>Créer Entreprise</a>
                <a href="{{ route('entreprise.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-building me-2"></i>Entreprise</a>
                <a href="{{ route('profile.profile') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-building me-2"></i>profile</a>
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
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </ul>
                </div>
            </nav>
            <div class="row my-5 p-4" >
                <div class="container">
                    <h2>Edit Pilote Information</h2>
            
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            
                    <form id="editPiloteForm" action="{{ route('pilote.update')}}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="mb-3">
                            <label for="name" class="form-label">Name doit etre unique et inexistent</label>
                            <input type="text" class="form-control" style="width: 50%; margin-left: 25%;" id="name" name="name" required>
                        </div>
            
                        <h2>Edit Promotion Information</h2>
            
                        <div class="mb-3">
                            <label for="promotion" class="form-label">Promotion</label>
                            <select id="promotion" style="width: 50%; margin-left: 25%;" class="form-select" name="promotion_id"></select>
                        </div>
            
                        <input type="hidden" id="selectedPromotionId" name="selected_promotion_id">
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/getpromotions') // Corrected URL
                .then(response => response.json())
                .then(data => {
                    console.log(data.promotions)
                    const promotionSelect = document.getElementById('promotion');
                    data.promotions.forEach(promotion => {
                        const option = document.createElement('option');
                        option.value = promotion.id;
                        option.textContent = promotion.nom_promotion; // Corrected key for promotion name
                        promotionSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching promotions:', error));

            // Update hidden input with selected promotion_id
            document.getElementById('promotion').addEventListener('change', function () {
                document.getElementById('selectedPromotionId').value = this.value;

            });
        });
    </script>
</body>

</html>

