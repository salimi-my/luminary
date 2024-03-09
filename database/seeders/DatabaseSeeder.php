<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\TextWidget;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  Create text widget
        TextWidget::factory()->create([
            'key' => 'about-us-sidebar',
            'title' => 'About Us',
            'content' => 'Discover the latest trends, news, and stories in our blog. From technology to travel, we cover it all. Join us on this journey and be part of our vibrant community.',
            'image' => null,
            'active' => true,
        ]);
        TextWidget::factory()->create([
            'key' => 'header',
            'title' => 'Brilliant perspectives on diverse insights',
            'image' => null,
            'content' => 'Brilliant perspectives on diverse insights',
            'active' => true,
        ]);
        TextWidget::factory()->create([
            'key' => 'about-page',
            'title' => 'About Us',
            'content' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos tempore quia, nobis corrupti, explicabo rem voluptatem, repellendus ratione quos officia provident molestiae commodi odio assumenda vero sit necessitatibus itaque eius.</p>',
            'active' => true,
        ]);

        // Create posts
        Post::factory(50)->create();

        // Create users
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $adminUser->assignRole($adminRole);
    }
}
