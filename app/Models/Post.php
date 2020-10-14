<?php

namespace App\Models;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  //protected $guarded = [];

  protected $dates = [
    'created_at',
    'updated_at',
    'published_at'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }


  public function author()
  {
    return $this->belongsTo(User::class, 'author_id','id');
  }


  public function category()
  {
    return $this->belongsTo(Category::class);
  }


  public function getImageUrlAttribute()
  {
    $imageUrl = '';

    if (!is_null($this->image))
    {
      $imagePath = public_path() . '\img\\' . $this->image;
      if (file_exists($imagePath)) {
        $imageUrl = asset('img/' . $this->image);
      }
    }

    return $imageUrl;
  }


  public function getImageThumbUrlAttribute()
  {
    $imageUrl = '';

    if (!is_null($this->image))
    {
      $ext = substr(strrchr($this->image, '.'), 1);
      $thumbnail = str_replace('.{$ext}', '_thumb.{$ext}', $this->image);
      $imagePath = public_path() . '\img\\' . $thumbnail;
      if (file_exists($imagePath)) {
        $imageUrl = asset('img/' . $thumbnail);
      }
    }

    return $imageUrl;
  }



  public function getDateAttribute()
  {
    return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
  }


  public function getBodyHtmlAttribute()
  {
    return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
  }


  public function getExcerptHtmlAttribute()
  {
    return $this->excerpt ?
      Markdown::convertToHtml(e($this->excerpt)) : NULL;
  }


  public function dateFormatted($showTimes = false)
  {
    $format = 'd/m/Y';
    if ($showTimes) $format = $format . ' H:i:s';
    return $this->created_at->format($format);
  }


  public function publicationLabel()
  {
    if (! $this->published_at) {
      return '<span class="label label-warning">Draft</span>';
    }
    else if (
      $this->published_at &&
      $this->published_at->isFuture()
    ) {
      return '<span class="label label-info">Schedule</span>';
    }
    else {
      return '<span class="label label-success">Published</span>';
    }
  }


  public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at', 'desc');
  }


  public function scopePopular($query)
  {
    return $query->orderBy('view_count', 'asc');
  }


  public function scopePublished($query)
  {
    return $query->where('published_at', '!=', NULL)
      ->where('published_at', '<=', Carbon::now());
  }




}
