<?php

namespace Amentotech\LaraGuppy\Http\Resources;

use Amentotech\LaraGuppy\Services\MyUser;
use Illuminate\Http\Resources\Json\JsonResource;

class GuppyRequestResource extends JsonResource
{
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): mixed
    {
        $profile = (new MyUser)->extractUserInfo($this);
        return [
            'userId'             => $this->id,
            'isOnline'           => $this->isOnline,
            'name'               => $profile['name'],
            'email'              => $profile['email'],
            'phone'              => $profile['phone'],
            'photo'              => $profile['photo'],
        ];
    }
}
