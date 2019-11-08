<?php

namespace App;

use App\Filters\QueryFilterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable
{
    use Notifiable, QueryFilterable, PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Laracast\Presenter
    protected $presenter = 'App\\Presenters\\UserPresenter';

    protected $resourceType = 'users';

    public function getResourceType() //trait
    {
        return $this->resourceType;
    }

    /**
     * User belongs to only ONE role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
//        ->withDefault([
//            'name' => 'unverified',
//            'slug' => 'unverified'
//        ]);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function authorize($roles = [], $field = 'slug')
    {
       // return in_array( $this->role->{$field}, $roles);
        return in_array( auth()->user()->role->{$field}, $roles);

    }

    public function profile()
    {
        return $this->hasOne(Profile::class)->withDefault();
    }

    public function associateRole($role)
    {
        $role = Role::whereSlug($role)->orWhereName($role)->firstOrFail();

        return $this->role()->associate($role);
    }


}
