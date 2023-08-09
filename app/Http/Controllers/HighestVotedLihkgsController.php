<?php



namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Lihkg;
use Inertia\Inertia;
use Inertia\Response;

 

class HighestVotedLihkgsController extends Controller
{
    
    
    public function welcome() {
        // Retrieve the data from the database or set it as needed
       
        $highestVotedLihkgs = Lihkg::with('user', 'replies.user')
        ->orderBy('vote_count', 'DESC')
        ->take(10)
        ->get();

        // Share the data with the Welcome.vue component
        Inertia::share('highestVotedLihkgs', $highestVotedLihkgs);

        
        // Return the Welcome.vue component
        return Inertia::render('Welcome',['canLogin' => route('login'),'canRegister' =>route('register')]);
    }
    
    public function getHighestVotedLihkgs()
    {
        // Retrieve the data from the database or set it as needed
        $highestVotedLihkgs = Lihkg::with('user', 'replies.user')
        ->get();

        // Share the data with the Welcome.vue component
        Inertia::share('highestVotedLihkgs', $highestVotedLihkgs);

        // Return the Welcome.vue component
        return Inertia::render('highestvotedlihkgst');
    }
}