<?php

namespace App\Http\Controllers;

use App\Http\Requests\InteractionRequest;
use App\Models\Interaction;

class InteractionController extends Controller
{

    public function index()
    {
        $interactions = Interaction::orderBy('created_at', 'desc')->get();
        return $interactions;
    }

    public function store(InteractionRequest $request)
    {
        $validated = $request->validated();
        Interaction::create([
            'label' => $validated['label'],
            'type' => $validated['type'],
        ]);
        return response(["message" => "Interaction created successfully"], 201);

    }

    public function show(Interaction $interaction)
    {
        return Interaction::findOrFail($interaction->id);
    }

    public function update(InteractionRequest $request, $id)
    {
        $validated = $request->validated();
            Interaction::updateOrCreate(["id" => $id], $validated);
            return response(["message" => "Interaction updated successfully"], 200);
    }

    public function destroy(Interaction $interaction)
    {
        Interaction::destroy($interaction->id);
        return response(["message" => "Interaction deleted successfully"], 200);
    }

    public function getInteractionByLabel($label)
    {
        return Interaction::where('label', $label)->first();
    }

    public function getInteractionsWithTriggerCount()
    {
        $interactionStats = Interaction::with('interactionLogs')
            ->withCount('interactionLogs')
            ->get()
            ->map(function ($interaction) {
                return [
                    'id' => $interaction->id,
                    'label' => $interaction->label,
                    'type' => $interaction->type,
                    'interaction_logs_count' => $interaction->interaction_logs_count,
                ];
            });
        return $interactionStats;
    }
}
