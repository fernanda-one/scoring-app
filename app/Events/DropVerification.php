<?php

namespace App\Events;

use App\Models\UserGelanggang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DropVerification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $juriPertama, $juriKedua, $juriKetiga;
    private int $roomId, $id;
    private bool $redPopup, $bluePopup = false;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $user = auth()->user();
        $gelanggang = $this->getGelanggangId($user);
        $this->roomId = $gelanggang;
        $this->id = $user['role_id'];
        $this->juriPertama = $message['juriPertama'];
        $this->juriKedua = $message['juriKedua'];
        $this->juriKetiga = $message['juriKetiga'];
        $this->redPopup = $message['redPopup'];
        $this->bluePopup = $message['bluePopup'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): PresenceChannel
    {
        return new PresenceChannel('presence.dropVerification.'.$this->roomId);
    }

    public function broadcastAs(): string
    {
        return 'dropVerification.'.$this->roomId;
    }

    public function broadcastWith()
    {
        return [
            'message'=> 'choice drop verificaton',
            'juri_pertama'=>$this->juriPertama,
            'juri_kedua'=>$this->juriKedua,
            'juri_ketiga'=>$this->juriKetiga,
            'red_popup'=>$this->redPopup,
            'blue_popup'=>$this->bluePopup,
            'id'=> $this->getRoleById($this->id)
        ];
    }

    private function getRoleById($id): string
    {
        $roleMap = [
            5 => 'Juri Pertama',
            6 => 'Juri Kedua',
            7 => 'Juri Ketiga',
            // Tambahkan peran lainnya jika diperlukan
        ];

        return $roleMap[$id] ?? 'Role Lainnya';
    }

    private function getGelanggangId($user)
    {
        $gelanggang = UserGelanggang::where('user_id', $user->id)->first();
        return $gelanggang->gelanggang_id;
    }
}
