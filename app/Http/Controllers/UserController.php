<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUserInteractionsWithTriggerCount(){

    $interactionStats = User::with('interactionLogs')
        ->withCount('interactionLogs')
        ->get()
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'interaction_logs_count' => $user->interaction_logs_count,
            ];
        });
    return $interactionStats;

    }
}
