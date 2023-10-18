<?php

namespace App\Events;

use App\Models\Gelanggang;
use App\Models\User;
use App\Models\UserGelanggang;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Operator implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private int $roomId;
    private string $blueName, $redName, $activeRound, $babak, $blueContingent, $redContingent;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $user = auth()->user();
        $gelanggang = $this->getGelanggangId($user);
        $message  =  (object)$message;
        $this->roomId = $gelanggang;
        $this->redName = $message->redName;
        $this->blueName = $message->blueName;
        $this->redContingent = $message->redContingent;
        $this->blueContingent = $message->blueContingent;
        $this->babak = $message->babak;
        $this->activeRound = $message->activeRound;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('presence.operator.'.$this->roomId);
    }

    public function broadcastAs(): string
    {
        return 'operator.'.$this->roomId;
    }

    public function broadcastWith()
    {
        return [
                'redName'=> $this->redName,
                'blueName'=> $this->blueName,
                'redContingent'=> $this->redContingent,
                'blueContingent'=> $this->blueContingent,
                'babak'=> $this->babak,
                'activeRound'=> $this->activeRound,
            ];
    }
    private function getGelanggangId($user)
    {
        $gelanggang = UserGelanggang::where('user_id', $user->id)->first();
        return $gelanggang->gelanggang_id;
    }

}
