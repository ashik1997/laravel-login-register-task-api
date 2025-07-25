<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_name' => $this->user->name??'',
            'is_completed' => (bool) $this->is_complete,
            'created_at' => $this->created_at->format('h:i A d F, Y'),
            'priority' => PriorityResource::make($this->whenLoaded('priority')),

        ];
    }
}
