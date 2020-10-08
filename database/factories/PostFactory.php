<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Post::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $category = Category::inRandomOrder()->first();

    $image = $category->slug .  '.jpg';

    $date = Carbon::create(2020, 9, 14, 9);

    return [
      'author_id' => User::all()->random()->id,
      'title' => $title = $this->faker->sentence(rand(8, 12)),
      'slug' => Str::slug($title, '-'),
      'body' => $body = $this->faker->paragraphs(rand(10, 15), true),
      'excerpt' => Str::limit($body, 250),
      'image' => (rand(0, 1) == 1) ? $image : NULL,
      'published_at' => (rand(0, 10) < 3) ? NULL : $date->addDays(rand(1, 20)),
      'category_id' => $category->id,
      'view_count' => rand(1, 10) * 10,
    ];
  }
}
