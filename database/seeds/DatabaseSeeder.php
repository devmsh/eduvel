<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // AdminSeeder::class,
            SettingsSeeder::class,
            SocialMediaSeeder::class,
            WhyChooseSeeder::class,
            OurFoundersSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            BlogCommentSeeder::class,
            FaqSeeder::class,
            ContactsSeeder::class,
            CourseCategorySeeder::class,
            MediaGallerySeeder::class,
            CoursesSeeder::class,
            CoursesFilesSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            AdmissionSeeder::class,
        ]);
    }
}
