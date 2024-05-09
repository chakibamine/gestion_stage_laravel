@extends('layouts.app')
@vite(['resources/css/layouts.css','resources/css/welcome.css', 'resources/js/app.js'])
@section('content')

<div class="welcome" >
    <div class="container" >
     <header>
                <h1  style="width: 100%;font-weight:Rubik Scribble">Bienvenu dans L'Application de Gestion des offres de stage </h1>
            </header>

        <nav>
        <ul>
                @auth
                    <li><a class="" style="color:black" href="{{ route('profile.profile') }}">Profile</a></li>
                    @if(Auth::user()->usertype === 'etudiant')
                        <li><a  class="" style="color:black"  href="{{ route('etudiant.etudiant') }}">Dashboard Étudiant</a></li>
                    <!-- @elseif(Auth::user()->usertype === 'entreprise')
                        <li><a href="{{ route('entreprise.dashboard') }}">Dashboard Entreprise</a></li> -->
                    @elseif(Auth::user()->usertype === 'pilotedestage')
                        <li><a class="" style="color:black"  href="{{ route('pilotePromotion.dashboard') }}">Dashboard Pilote de Promotion</a></li>
                    @elseif(Auth::user()->usertype === 'admin')
                        <li><a  class="" style="color:black"  href="{{ route('admins.index') }}">Admin</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary">Déconnexion</button>
                        </form>
                    </li>
                @else
                  
                <li>
                    <form action="{{ route('search.entreprise') }}" method="GET">
                        <input type="text"  name="query" placeholder="Rechercher entreprise...">
                        <button type="submit" class="btn-primary">Rechercher</button>
                    </form>
                </li>
                 @endauth
                   @auth
                    <li>
                    <a href="/offers/statistics" class="btn-primary" >Statistics</a>
                </li>
                @else
                @endauth
            
            
            </ul>





        </nav>
              
            
                               @auth
                               <h1  class="card-text " style=";width: 100%;">Liste des offres de stage disponibles pour les étudiants gérées par les pôles de management :</h1>
                    <div class="table-container"><table class="offers-table" >
              
            <caption></caption>
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Durée</th>
                    <!-- <th>Lieu</th> -->
                    <!-- <th>Durée</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="offers-body">
                <!-- Offers will be dynamically added here -->
            </tbody>
        </table>
                @else
                @endauth

    </div>


            <div class="row">
                 @auth
                 @if(Auth::user()->usertype === 'admin')
                    <div class="col-md-4">
                        <div class="card" style="background-color:transparent;">
                        <div class="card-body">
                            <h5 class="card-title ">Admin Dashboard</h5>
                            <p class="card-text ">Accédez au tableau de bord de l'administrateur.</p>
                            <a href="{{ route('admins.index') }}" class=" btn-primary">Dashboard administrateur</a>
                        </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-4">
                    <div class="card" style="background-color:transparent;">
                        <div class="card-body">
                            <h5 class="card-title bebas-neue-regular">Étudiant</h5>
                            <p class="card-text bebas-neue-regular">Accédez au tableau de bord de l'étudiant.</p>
                            <a href="{{ route('etudiant.etudiant') }}" class=" btn-primary">Dashboard Étudiant</a>
                        </div>
                    </div>
                </div>

                <!-- Pilote de Promotion Card -->
                <div class="col-md-4">
                    <div class="card"  style="background-color:transparent;">
                        <div class="card-body">
                            <h5 class="card-title bebas-neue-regular">Pilote de Promotion</h5>
                            <p class="card-text bebas-neue-regular">Accédez au tableau de bord du pilote de promotion.</p>
                            <a href="{{ route('pilotePromotion.dashboard') }}" class=" btn-primary">Dashboard Pilote</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card"  style="background-color:transparent;">
                        <div class="card-body">
                            <h5 class="card-title bebas-neue-regular">Admin </h5>
                            <p class="card-text bebas-neue-regular">Accédez au tableau de bord du pilote de promotion.</p>
                            <a href="{{ route('admins.index') }}" class=" btn-primary">Dashboard Admin</a>
                        </div>
                    </div>
                </div>
                @endauth
             
                

              
            </div>
        </div>
        
</div>

<script>

        document.addEventListener('DOMContentLoaded', function() {
            fetchOffers();
             
        });

            function fetchOffers() {
                fetch('/get-all-offers').then(response => response.json()).then(data => {
            console.log();
            const offersBody = document.getElementById('offers-body');
            data.offers.forEach((offer, index) => {
                const row = `
                    <tr>
                        <td class="bebas-neue-regular">${offer.name}</td>
                        <td class="bebas-neue-regular">${offer.name}</td>
                        <td class="bebas-neue-regular">${offer.type}</td>
                        <td class="bebas-neue-regular">${offer.duree}</td>
                        <td>
                        
                            <a href="/offers/${offer.id}/edit" class="btn btn-primary">Modifier</a>
                            <a href="/offers/${offer.id}/showCandidates" class="btn btn-primary">Voir Candidats</a>
                        </td>
                    </tr>
                `;
                offersBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error fetching offers:', error));
    }
//   JavaScript code to redirect
    window.onload = function() {
        // Perform the redirection based on conditions
        // Example: Redirect to the appropriate page based on user type
        let userType = '{{ Auth::user() ? Auth::user()->usertype : null }}'; // Get the user type from the authenticated user
        if (userType !== null) {
            if (userType === 'etudiant') {
                window.location.href = "{{ route('etudiant.etudiant') }}"; // Redirect to etudiant index page
            } else if (userType === 'pilotedestage') {
                window.location.href = "{{ route('pilotePromotion.dashboard') }}"; // Redirect to pilotedestage index page
            } 
            
        }
    }
</script>


@endsection
