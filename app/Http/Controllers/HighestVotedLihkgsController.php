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
    public function getHighestVotedLihkgs()
    {
        // Retrieve the data from the database or set it as needed
        $highestVotedLihkgs = [
            ['id' => 1, 'vote_count' => 10, 'message' => 'First item'],
            ['id' => 2, 'vote_count' => 5, 'message' => 'Second item'],
        ];

        // Share the data with the Welcome.vue component
        Inertia::share('highestVotedLihkgs', $highestVotedLihkgs);

        // Return the Welcome.vue component
        return Inertia::render('Welcome');
    }
}