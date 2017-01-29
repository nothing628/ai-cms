<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;

class TagAdded
{
	use SerializesModels;

	/** @var \Illuminate\Database\Eloquent\Model **/
	public $model;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
}
