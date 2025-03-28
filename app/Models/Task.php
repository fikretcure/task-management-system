<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $appends = [
        'status_label'
    ];


    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            0 => 'Baslamadi',
            1 => 'Devam Ediyor',
            2 => 'Tamamlandi',
            default => "Bilinmeyen Durum ({$this->status})",
        };
    }

    public function scopeAuth(Builder $query): void
    {
        $query->where('user_id', request()->session()->get('auth')->id);
    }

    public function scopeHeader(Builder $query): void
    {
        $query->where('user_id', request()->header('user'));
    }
}
