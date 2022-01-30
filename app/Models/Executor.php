<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Executor
 *
 * @property int $loan_id
 * @property int|null $ukk
 * @property int|null $pd
 * @property int|null $zs
 * @property int|null $iab
 * @property int|null $km
 * @property int|null $notify_ukk_main
 * @property int|null $published
 * @property-read \App\Models\Loan $loans
 * @method static \Illuminate\Database\Eloquent\Builder|Executor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereIab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereNotifyUkkMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor wherePd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereUkk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereZs($value)
 * @mixin \Eloquent
 */
class Executor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function loans()
    {
        return $this->belongsTo(Loan::class);
    }

    public static function noteAboutTheNotificationToKM($id)
    {
        self::create([
            'loan_id' => $id,
            'notify_ukk_main' => 1,
        ]);
    }
}
