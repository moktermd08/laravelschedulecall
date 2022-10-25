<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'subject' =>$this->subject,
            'content' =>$this->content,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'status' => (boolean) $this->status,
            'created' =>$this->created_at->diffForHumans()
    ];
    }
}
