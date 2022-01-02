<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class Loan extends Model
{
    use HasFactory;
}
