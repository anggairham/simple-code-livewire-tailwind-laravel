<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name', 'gender', 'birth_place', 'birth_date', 'religion', 'address', 'class_id'
    ];

    /**
     * Get the class that owns the StudentModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassModel::class);
    }
}
