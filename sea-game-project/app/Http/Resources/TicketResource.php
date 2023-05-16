<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this -> id,
            "timeStart"=>$this->timeStart,
            "timeEnd"=>$this->timeEnd,
            "user_id"=>$this->user,
            "event_id"=>$this->event,
        ];
    }
}
