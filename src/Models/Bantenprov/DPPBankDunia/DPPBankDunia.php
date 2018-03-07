<?php

namespace Bantenprov\DPPBankDunia\Models\Bantenprov\DPPBankDunia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DPPBankDunia extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'dpp_bank_dunias';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
