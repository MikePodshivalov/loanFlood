<?php

namespace App\Models;

use App\Mail\LoanCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Loan
 *
 * @property int $id
 * @property string $name
 * @property string|null $group
 * @property string $inn
 * @property string $type
 * @property int|null $amount
 * @property int $pledge
 * @property string $creator
 * @property string|null $description
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LoanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePledge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $zs
 * @property string|null $path-zs
 * @property int|null $pd
 * @property string|null $path-pd
 * @property int|null $iab
 * @property string|null $path-iab
 * @property int|null $ukk
 * @property string|null $path-ukk
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereIab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePathIab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePathPd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePathUkk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePathZs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan wherePd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereUkk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereZs($value)
 */
class Loan extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($loan) {
            $emails = User::role('km_main')->pluck('email');
            \Mail::to($emails)->send(
                new LoanCreated($loan)
            );
        });
    }

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}
