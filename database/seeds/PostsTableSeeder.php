<?php

use Illuminate\Database\Seeder;
use App\Post; // ! Post Model in use here ! //
use Faker\Generator as Faker; // ! Faker Generator here ! //

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	// # MODE 1: SEEDING from file /config/posts.php # 
	// public function run()
    // {
	// 	$posts = config('posts');
	// 	foreach ($posts as $post) {
	// 		$new_post = new Post();
	// 		$new_post['author']	= $post['author'];
	// 		$new_post['date']	= $post['date'];
	// 		$new_post['title']	= $post['title'];
	// 		$new_post['text']	= $post['text'];
	// 		$new_post->save(); // ! DB writing here ! 
	// 	}
    // }

	// # MODE 2: FAKING from fakerphp # 
	public function run(Faker $faker) 
	{
		for ($i = 0; $i < 10; $i++){
			$new_post = new Post();
			$new_post['author']	= $faker->name();
			$new_post['date']	= $faker->date().' '.$faker->time();
			$new_post['title']	= $faker->sentence();
			$new_post['text']	= $faker->paragraph();
			$new_post->save(); // ! DB writing here ! 
		}
	}

}
