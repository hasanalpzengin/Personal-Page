<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $uid
 * @property string $log
 * @property string $created_at
 * @property string $updated_at
 */
class Log extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['uid', 'log'];
    protected $table = "logs";
}
