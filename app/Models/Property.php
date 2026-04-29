<?php

namespace App\Models;

use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'status',
        'city',
        'district',
        'address',
        'latitude',
        'longitude',
        'rooms',
        'floor',
        'area_sqm',
        'monthly_rent_uah',
        'deposit_uah',
        'min_term_months',
        'description',
        'amenities',
        'photos',
        'overall_score',
        'real_score',
        'adequate_score',
        'assessment_notes',
        'manager_id',
        'accepted_at',
    ];

    protected function casts(): array
    {
        return [
            'type' => PropertyType::class,
            'status' => PropertyStatus::class,
            'amenities' => 'array',
            'photos' => 'array',
            'accepted_at' => 'datetime',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'area_sqm' => 'decimal:2',
        ];
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
