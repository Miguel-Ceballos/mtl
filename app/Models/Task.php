<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'page_id',
        'status_id',
        'user_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status_id'] ?? false, fn($query, $status) =>
        $query->where(fn($query) =>
        $query->where('status_id', '=', $status))
        );

        $query->when($filters['date'] ?? false, fn($query, $date) =>
        $query->where(fn($query) =>
        $query->where('created_at', 'like', '%'.  $date . '%'))
        );
    }

}
