<?php

use Illuminate\Database\Seeder;
use App\Post; // ! Post Model in use here ! //
use Faker\Generator as Faker; // ! Faker Generator here ! //
// use Carbon\Carbon; 

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
		for ($i = 0; $i < 50; $i++){
			$new_post = new Post();
			$new_post['author']	= $faker->name();
			$new_post['date']	= $faker->date().' '.$faker->time();
			$new_post['title']	= $faker->sentence();
			$new_post['text']	= $faker->paragraphs($faker->numberBetween(5,20),true);
			$new_post->save(); // ! DB writing here ! 
		}
	}
}
// use of Carbon format
// Carbon::createFromFormat($format, $time, $tz);
// Carbon::createFromFormat('Y-m-d H:i:s', '1975-05-21 22:22:22', 'Europe/Paris')->toDateTimeString(); 