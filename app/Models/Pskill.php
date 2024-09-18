<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $register_number
 * @property string|null $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill whereRegisterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pskill whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Pskill extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_number', 'uu_id',
    ];

    public function piclab()
    {
        return $this->belongsTo(Piclab::class);
    }
}
