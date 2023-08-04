<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Lihkg;
use App\Models\Voting;
use App\Models\UserVote;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LihkgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): Response
    // {   
        
    //     return Inertia::render("Lihkg/Index", [
    //         "lihkgs" => Lihkg::with("user:id,name", "replies.user:id,name")
    //         ->with('replies')    
    //         ->latest()
    //             ->get(),
    //     ]);
    // }

    public function index()
{
    $lihkgs = Lihkg::with('user', 'replies.user')
        ->latest()
        ->get();

    // Fetch vote counts using SQL queries
    $lihkgsWithVotes = $lihkgs->map(function ($lihkg) {
        $voteCounts = DB::table('user_votes')
            ->select(DB::raw('SUM(CASE WHEN vote_status = 1 THEN 1 ELSE 0 END) AS upvotes_count, SUM(CASE WHEN vote_status = 0 THEN 1 ELSE 0 END) AS downvotes_count'))
            ->where('lihkg_id', $lihkg->id)
            ->first();

        $lihkg->upvotes_count = $voteCounts->upvotes_count;
        $lihkg->downvotes_count = $voteCounts->downvotes_count;

        return $lihkg;
    });

    return Inertia::render("Lihkg/Index", [
        "lihkgs" => $lihkgsWithVotes,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            "message" => "required|string|max:255",
        ]);

        $request
            ->user()
            ->lihkg()
            ->create($validated);

        return redirect(route("lihkg.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Lihkg $lihkg)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lihkg $lihkg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lihkg $lihkg): RedirectResponse
    {
        $this->authorize("update", $lihkg);

        $validated = $request->validate([
            "message" => "required|string|max:255",
        ]);

        $lihkg->update($validated);

        return redirect(route("lihkg.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lihkg $lihkg): RedirectResponse
    {
        $this->authorize("delete", $lihkg);

        $lihkg->delete();

        return redirect(route("lihkg.index"));
    }

    public function vote(Request $request, $lihkgId)
    {
        // Get the authenticated user
        $user = $request->user();

        // Find the Lihkg model by ID
        $lihkg = Lihkg::findOrFail($lihkgId);

        // Check if the user has already voted on this Lihkg
        $userVote = UserVote::where('user_id', $user->id)->where('lihkg_id', $lihkg->id)->first();

        // Update the vote status and count
        if ($userVote) {
            // User has already voted, so remove the vote
            $userVote->delete();
            $lihkg->vote_count--;
        } else {
            // User hasn't voted yet, so create a new vote
            UserVote::create([
                'user_id' => $user->id,
                'lihkg_id' => $lihkg->id,
                'vote_status' => 1, // You can adjust this based on your vote status values
            ]);
            $lihkg->vote_count++;
        }

        // Save the updated vote count
        $lihkg->save();

        // Return the updated vote count
        return response()->json([
            'vote_count' => $lihkg->vote_count,
        ]);

        
    }

    

}
