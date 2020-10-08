<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  protected $posts_per_page = 3; // $limit

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::with('author')
      ->with('category')
      ->published()
      ->latestFirst()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts'));
  }


  public function category(Category $category)
  {
    $categoryName = $category->title;

    $posts = $category->posts()
      ->with('author')
      ->with('category')
      ->published()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts', 'categoryName'));
  }


  public function author(User $author)
  {
    $authorName = $author->name;

    $posts = $author->posts()
      ->with('author')
      ->with('category')
      ->published()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts', 'authorName'));

  }


  public function show(Post $post)
  {
    // update posts set view_count = view_count + 1 where id = ?
    #1
    //$viewCount = $post->view_count + 1;
    //$post->update(['view_count' => $viewCount]);
    #2
    $post->increment('view_count', 1);

    return view('blog.show', compact('post'));
  }


}
