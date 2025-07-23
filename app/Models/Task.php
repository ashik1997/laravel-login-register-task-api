<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Task extends Pivot
{
    use HasFactory;
    protected $fillable = ['name', 'priority_id', 'is_complete', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function priority(){
        return $this->belongsTo(Priority::class);
    }

    public function scopeHandleSort(Builder $query, string $column)
    {
        $query
            ->when($column === 'name', function($query) {
                $query->orderBy('name');
            })
            ->when($column === 'time', function($query) {
                $query->latest();
            })
            ->when($column === 'priority', function($query) {
                $query->orderByRaw('ISNULL(priority_id), priority_id ASC');
            });
    }
}
