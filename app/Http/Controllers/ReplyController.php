<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     public function index(): Response
// {
//     $replies = Reply::with('user:id,name')
//         ->latest()
//         ->get();

//     return Inertia::render('Index', [
//         'replies' => $replies,
//     ]);
// }

public function index(): Response
{
    try {
        $replies = Reply::with('user:id,name')
            ->latest()
            ->get();

        // Log a success message
        Log::info('Database query successful: Retrieved replies.');

        return Inertia::render('Index', [
            'replies' => $replies,
        ]);
    } catch (QueryException $e) {
        // Log the error for debugging purposes
        Log::error('Database query error: ' . $e->getMessage());

        // Return an error response to the user
        return response()->json(['message' => 'An error occurred while fetching data.'], 500);
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        Log::error('Unexpected error: ' . $e->getMessage());

        // Return a generic error response to the user
        return response()->json(['message' => 'An unexpected error occurred.'], 500);
    }
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request): RedirectResponse
        {

         $validated = $request->validate([
             "reply" => "required|string|max:255",
             "lihkgs_id" => "required|exists:lihkgs,id",
         ]);

         $request
             ->user()
             ->replies()
             ->create($validated);

         return redirect(route("lihkg.index"));
        }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
