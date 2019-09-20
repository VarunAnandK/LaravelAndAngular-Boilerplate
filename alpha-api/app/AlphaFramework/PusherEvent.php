<?php

namespace App\AlphaFramework;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $ChannelId;
    public function __construct($message,$ChannelId)
    {
        $this->data = $message;
        $this->ChannelId =$ChannelId;
    }

    public function broadcastOn()
    {
        return ["AlphaChannel". $this->ChannelId];
    }

    public function broadcastAs()
    {
        return 'AlphaEvent';
    }
    public function broadcastWith()
    {
        return $this->data;
    }
}
