<?php

namespace App\Models;

use App\Events\LoanCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
 * @property string $initiator
 * @property string|null $pathZS
 * @property string|null $pathPD
 * @property string|null $pathIAB
 * @property string|null $pathUKK
 * @property-read \App\Models\Executor|null $executors
 * @property-read \App\Models\Status|null $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Query\Builder|Loan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Loan whereInitiator($value)
 * @method static \Illuminate\Database\Query\Builder|Loan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Loan withoutTrashed()
 */
class Loan extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => LoanCreated::class,
    ];

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

    public function executors()
    {
        return $this->hasOne(Executor::class);
    }

    public function difficulties()
    {
        return $this->hasOne(Difficulty::class);
    }

    public function statuses()
    {
        return $this->hasOne(Status::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public static function loansOfDepartment()
    {
        if(Auth::user()->hasAnyRole(['admin', 'km_main'])) {
            return self::latest()->whereNull('deleted_at')->with('tags')
                ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        } elseif (Auth::user()->hasRole(['zs_main'])) {
            return self::latest()->whereNull('deleted_at')->with('tags')
                ->join('executors', 'loans.id', '=', 'executors.loan_id')
                ->where('executors.zs', '<>', null)
                ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        } elseif (Auth::user()->hasRole(['pd_main'])) {
            return self::latest()->whereNull('deleted_at')->with('tags')
                ->join('executors', 'loans.id', '=', 'executors.loan_id')
                ->where('executors.pd', '<>', null)
                ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        } elseif (Auth::user()->hasRole(['ukk_main'])) {
            return self::latest()->whereNull('deleted_at')->with('tags')
                ->join('executors', 'loans.id', '=', 'executors.loan_id')
                ->where('executors.ukk', '<>', null)
                ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        } elseif (Auth::user()->hasRole(['iab_main'])) {
            return self::latest()->whereNull('deleted_at')->with('tags')
                ->join('executors', 'loans.id', '=', 'executors.loan_id')
                ->where('executors.iab', '<>', null)
                ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
        }
        return false;
    }

    public static function getEmailsOfDepartments(Loan $loan) : array
    {
        $emails = '';
        if ($loan->ukk) {
            $emails .= User::role('ukk_main')->pluck('email')->implode(',') . ',';
        }
        if ($loan->zs) {
            $emails .= User::role('zs_main')->pluck('email')->implode(',') . ',';
        }
        if ($loan->pd) {
            $emails .= User::role('pd_main')->pluck('email')->implode(',') . ',';
        }
        if ($loan->iab) {
            $emails .= User::role('iab_main')->pluck('email')->implode(',') . ',';
        }
        $emailsArray = explode(',', $emails);
        array_pop($emailsArray);
        return $emailsArray;
    }

    public static function loansOfExecutor(string $name)
    {
        return self::latest()->whereNull('deleted_at')->with('tags')
            ->join('executors', 'loans.id', '=', 'executors.loan_id')
            ->where('executors.ukk', '=', $name)
            ->orWhere('executors.pd', '=', $name)
            ->orWhere('executors.zs', '=', $name)
            ->orWhere('executors.iab', '=', $name)
            ->orWhere('executors.km', '=', $name)
            ->paginate(25, ['id', 'name', 'initiator', 'type', 'amount', 'created_at', 'deleted_at']);
    }
}
