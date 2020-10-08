<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

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


  public function setNameAttribute($value)
  {
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = Str::slug($value);
  }


  public function posts()
  {
    return $this->hasMany(Post::class, 'author_id', 'id');
  }


  public function gravatar()
  {
    $email = $this->email;
//    $default = asset('img/author.jpg');
    $default = 'https://d32ogoqmya1dw8.cloudfront.net/images/serc/empty_user_icon_256.v2.png';
    $size = 100;

    return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
  }


  public function getBioHtmlAttribute($value)
  {
    return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
  }


  public function getRouteKeyName()
  {
    return 'slug';
  }



}
