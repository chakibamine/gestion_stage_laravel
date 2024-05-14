<?php

namespace App\Http\Controllers;


use App\Models\Admins;
use App\Models\Offers;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\EvaluerEntreprise;
use App\Models\EvaluerParPilote;
use App\Models\Location;
use App\Models\PiloteDePromotion;
use App\Models\PostuleStage;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $etudiants = Etudiant::all();
            $users = User::all();
        
          // Retrieve statistics logic here
            $totalOffers = Offers::count();
            $totalCandidates = PostuleStage::count();
            $totalEntreprises = Entreprise::count();
            $totalEtudiants = Etudiant::count();
            $totalPilotes = PiloteDePromotion::count(); // Assuming there's a model named Pilote
            $totalEvaluationsPilote = EvaluerParPilote::count();
            $totalEvaluationsEntreprise = EvaluerEntreprise::count();
            $totalAdmins = Admins::count(); // Assuming there's a model named Admin
            $totalPromotions = Promotion::count();

        // Return the statistics to a view
            return view('home', [
                'totalOffers' => $totalOffers,
                'totalCandidates' => $totalCandidates,
                'totalEntreprises' => $totalEntreprises,
                'totalEtudiants' => $totalEtudiants,
                'totalPilotes' => $totalPilotes,
                'totalEvaluationsPilote' => $totalEvaluationsPilote,
                'totalEvaluationsEntreprise' => $totalEvaluationsEntreprise,
                'totalAdmins' => $totalAdmins,
                'totalPromotions' => $totalPromotions,
                'etudiants' => $etudiants,
                'users' => $users,

            ]);
    }
}
