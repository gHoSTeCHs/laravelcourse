<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static findOrFail($id)
 * @method static create(array $array)
 */
class Jobs extends Model
{
    use HasFactory;

    public mixed $id;
    protected $table = 'job_listings';
    protected $guarded = [];

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag', foreignPivotKey: 'job_listing_id');
    }
}
