<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolStandard extends Model {

    protected $table = 'school_standard';
    protected $fillable = ['school_id', 'standard_id'];

    public function school() {
        return $this->belongsTo(School::class);
    }

    /**
     * @method product
     * @public
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function standard() {
        return $this->belongsTo(Standard::class);
    }

}
