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

    public static function noteAboutTheNotificationToKM(Loan $loan)
    {
        self::create([
            'loan_id' => $loan->id,
            'notify_ukk_main' => 1,
            'km' => $loan->creator,
        ]);
    }

    public function executors()
    {
        return $this->hasOne(Executor::class);
    }

    public static function customUpdate($request)
    {
        $updateArray = [];
        if(isset($request->km)) {
            $updateArray['km'] = $request->km;
        } elseif(isset($request->ukk)) {
            $updateArray['ukk'] = $request->ukk;
        } elseif(isset($request->zs)) {
            $updateArray['zs'] = $request->zs;
        } elseif(isset($request->pd)) {
            $updateArray['pd'] = $request->pd;
        } elseif(isset($request->iab)) {
            $updateArray['iab'] = $request->iab;
        } else {
            return false;
        }
        return $updateArray;
    }

    public static function setPublished($id) : void
    {
        self::where('loan_id', $id)->update([
            'published' => 1
        ]);
    }
}
