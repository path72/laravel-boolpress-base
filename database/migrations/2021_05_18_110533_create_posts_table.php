<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		/*
			db: db_laravel-boolpress-base, table: posts
			----------------------------------------------------
			id 		NUMBER		INT						PK
			author	STRING		VARCHAR(50)				NOT NULL
			date	DATETIME	[YYYY-MM-GG HH:II:SS]	NOT NULL	
			title	STRING		VARCHAR(100)			NOT NULL
			text	STRING		LONGTEXT				NOT NULL
			----------------------------------------------------
		*/
        Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->string('author',50);
			$table->dateTime('date', 0);
			$table->string('title',100);
			$table->longText('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
