<?php

use Illuminate\Database\Seeder;

class MediaGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// For Photos
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_2.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_10.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_4.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_5.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_6.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_7.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_8.jpg', 'category'=> 'pictures']);
        App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_9.jpg', 'category'=> 'pictures']);
        // App\MediaGallery::create(['title' => 'Photo title', 'image' => 'pic_10.jpg', 'category'=> 'pictures']);

		// For Videos
        App\MediaGallery::create(['title' => 'Video title', 'image' => 'pic_2.jpg', 'category'=> 'videos']);
        App\MediaGallery::create(['title' => 'Video title', 'image' => 'pic_4.jpg', 'category'=> 'videos']);
        App\MediaGallery::create(['title' => 'Video title', 'image' => 'pic_13.jpg', 'category'=> 'videos']);
    }
}
