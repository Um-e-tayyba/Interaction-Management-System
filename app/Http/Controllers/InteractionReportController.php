<?php

namespace App\Http\Controllers;

use App\Models\InteractionLog;
use Auth;

class InteractionReportController extends Controller
{
    protected $interactionController;
    protected $userController;

    public function __construct(InteractionController $interactionController, UserController $userController)
    {
        $this->interactionController = $interactionController;
        $this->userController = $userController;
    }
    public function simulateInteraction($label)
    {
        $interaction = $this->interactionController->getInteractionByLabel($label);
        InteractionLog::create([
            'user_id' => Auth::user()->id,
            'interaction_id' => $interaction->id,
        ]);
        return response(["message" => $interaction->label . " clicked by " . Auth::user()->name], 200);

    }
    public function interactionStats()
    {
        return $this->interactionController->getInteractionsWithTriggerCount();
    }
    public function userInteractionStats()
    {
        return $this->userController->getUserInteractionsWithTriggerCount();
    }
}
