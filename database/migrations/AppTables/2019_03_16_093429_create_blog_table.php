<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    public function __construct(){
        $this->down();
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('blog_title');
            $table->text('blog_excerpt')->nullable();
            $table->longText('blog_description');
            $table->string('slug')->nullable();
            $table->integer('cat_id')->nullable()->default(0);
            $table->integer('user_id')->unsigned()->nullable()->default(0);
            $table->string('tags')->nullable();
            $table->string('keywords')->nullable();
            $table->string('blog_image')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**c
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
