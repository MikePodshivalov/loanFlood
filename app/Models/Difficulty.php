<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function loans()
    {
        return $this->belongsTo(Loan::class);
    }

    public static function setDifficultyToOne($id)
    {
        self::create([
            'loan_id' => $id,
            'difficulty' => 1
        ]);
    }


}
