<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScoringUpdate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $blueScore, $redScore, $roomId;
    /**
     * @param mixed $message
     */
    public function __construct( $message)
    {
        $user = auth()->user();
        $this->blueScore = $message['blueScore'];
        $this->redScore = $message['redScore'];
        $this->roomId = $user->gelanggang_id;
    }
    public function broadcastOn(): PresenceChannel
    {
        return new PresenceChannel('presence.updateScore.'.$this->roomId);
    }

    public function broadcastAs(): string
    {
        return 'updateScore.'.$this->roomId;
    }
    public function broadcastWith()
    {
        return [
            'blue_score'=>$this->blueScore,
            'red_score'=>$this->redScore,
        ];
    }
}
