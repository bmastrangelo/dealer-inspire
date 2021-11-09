<?php

namespace App\Models\Traits;

trait ConfigurableTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->created = date('Y-m-d H:i:s', time());
        });
    }
}
