<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
 

use App\Models\Lihkg;
use Inertia\Inertia;
use Inertia\Response;



class HighestVotedLihkgsController extends Controller
{
    public function getHighestVotedLihkgs()
    {
        // Retrieve the "lihkgs" with the highest vote count
        $highestVotedLihkgs = Lihkg::orderByDesc('vote_count')->limit(1)->get();

        // Return the data to the view
        return Inertia::render('HighestVotedLihkgs', [
            'highestVotedLihkgs' => $highestVotedLihkgs,
        ]);
    }
}