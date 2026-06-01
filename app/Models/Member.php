<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $fillable = [
        'member_code',
        'name',
        'phone',
        'photo',
        'membership_id',
        'joined_at',
    ];

    protected function casts(): array
    {
        return [
            'joined_at' => 'date',
        ];
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function presentCount(): int
    {
        return $this->attendances()->where('status', 'present')->count();
    }

    public function attendanceRate(): int
    {
        $total = $this->attendances()->count();

        if ($total === 0) {
            return 0;
        }

        return (int) round(($this->presentCount() / $total) * 100);
    }
}
