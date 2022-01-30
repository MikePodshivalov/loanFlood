<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Status
 *
 * @property int $loan_id
 * @property string $simple_status
 * @property string|null $special_status
 * @property-read \App\Models\Loan $loans
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereSimpleStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereSpecialStatus($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    use HasFactory;

    public function loans()
    {
        return $this->belongsTo(Loan::class);
    }
}
