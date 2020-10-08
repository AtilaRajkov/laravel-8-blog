<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

  protected $guarded = [];


  public function posts()
  {
    return $this->hasMany(Post::class);
  }


  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;
    $this->attributes['slug'] = Str::slug($value);
  }


  public function getPostsCountAttribute()
  {
    return $this->posts()->published()->count();
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

}
