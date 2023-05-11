<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Scoring implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $name;
    private int $score = 0;
    private int $roomId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
//        $this->roomId = $room_id;
        $this->name = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('public.ring.1');
    }

    public function broadcastAs()
    {
        return 'ring';
    }

    public function broadcastWith()
    {
        $this->scoring();
            return [
                'message' => session()->get('score')
            ];
    }

    public function scoring()
    {
//        session()->forget('score');
        if (session()->has('time') && session()->get('name') != $this->name) {
            $time = session()->get('time');

            // Jika tombol ditekan dalam 2 detik terakhir, berikan point
            if (time() - $time <= 2) {
                $point = true;

                // Broadcast event ke channel
                if(!session()->has('score')){
                    session(['score' => 0]);
                }
                session()->increment('score');
                $this->score = session()->get('score');
                // Hapus session
                session()->forget('time');
                session()->forget('name');
                return true;
            }
        }

        // Simpan waktu tombol ditekan
        session(['time' => time()]);
        session(['name' => $this->name]);
        return false;
    }
}
