<?php

namespace Amentotech\LaraGuppy\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GuppyChatPrivateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $message;
    protected array $ids;
    public string $eventName;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(mixed $message, array $ids, string $eventName)
    {
        $this->message      = $message;
        $this->ids          = $ids;
        $this->eventName    = $eventName;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channels = [];

        foreach ($this->ids as $id) {
            array_push($channels, new PrivateChannel('events-' . $id));
        }
    
        return $channels;
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        Log::info($this->eventName);
        return $this->eventName;
    }
}
