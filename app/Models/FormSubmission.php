<?php

namespace App\Models;

use App\Models\Traits\ConfigurableTrait;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use ConfigurableTrait;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'message',
        'created'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created' => 'datetime',
    ];
}
