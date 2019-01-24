<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $last_connection
 * @property int $permission
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property Comment[] $comments
 * @property Post[] $posts
 * @property Log[] $logs
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['username', 'password', 'last_connection', 'permission', 'name', 'surname', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Log', 'uid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'author');
    }
}
