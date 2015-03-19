<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the activity timeline for the user.
     *
     * @return mixed
     */
    public function activity()
    {
        return $this->hasMany('App\Activity')
            ->with(['user', 'subject'])
            ->latest();
    }

    /**
     * Record new activity for the user.
     *
     * @param  string $name
     * @param  mixed  $related
     * @throws \Exception
     * @return void
     */
    public function recordActivity($name, $related)
    {
        if (! method_exists($related, 'recordActivity')) {
            throw new \Exception('..');
        }

        return $related->recordActivity($name);
    }
}
