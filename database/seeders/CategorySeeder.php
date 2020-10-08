<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->truncate();

    $categories = [
      [
        'title' => 'Web Design'
      ],
      [
        'title' => 'Web Programming'
      ],
      [
        'title' => 'Internet'
      ],
      [
        'title' => 'Social Marketing'
      ],
      [
        'title' => 'Photography'
      ]
    ];

    for($i = 0; $i < count($categories); $i++) {
      Category::create($categories[$i]);
    }
  }
}
