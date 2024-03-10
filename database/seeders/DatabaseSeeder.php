<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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
            'content' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita ducimus nihil doloremque quod numquam consectetur ex sint aliquam dolorum soluta? Fugit reprehenderit ipsam ratione molestiae. Culpa illum necessitatibus maiores voluptate alias. Saepe, ratione facilis distinctio accusantium voluptates earum mollitia ipsa eligendi provident dolorem maxime iusto blanditiis dolores doloribus ut error odio enim itaque suscipit repellat? Aspernatur fugiat quos atque. Aperiam quidem nisi voluptatem dolorem. Amet nostrum recusandae culpa inventore atque fuga assumenda, illo alias repellendus voluptatibus tempore vitae ut! Saepe nostrum amet fugiat dolore sed labore, eligendi aut explicabo officia quod atque soluta sit ex voluptatum tempore numquam.</p><p>Amet corporis, quaerat fuga sunt aspernatur dolorum quibusdam qui ab labore quis incidunt voluptate reprehenderit distinctio sint consectetur natus! Sequi harum ut nemo delectus odit officia esse nihil facilis minus quibusdam ipsa tempora consequuntur, ducimus quasi. Aliquid nemo sequi ut quasi, sunt deserunt amet magni reprehenderit blanditiis velit quia architecto consectetur, ullam repudiandae voluptatum fugiat? Architecto nam harum aliquid illum! Molestias laborum quibusdam dolores eum ipsam velit temporibus, quas labore consectetur fugit illo ratione eligendi neque repudiandae, quasi officiis omnis tempora maiores alias facere aperiam. Sunt non quasi minus officiis, corporis nulla? Animi, consequatur magnam accusantium architecto sunt fuga, culpa dolor omnis doloribus illum ab maiores vitae accusamus quas quam!</p><p>Nulla deserunt accusamus a, quos quidem natus eveniet aliquid cum porro harum quaerat sequi vel hic. Veritatis rerum fugit voluptas eius aliquam sint iste quis, maxime eum enim, impedit quaerat, nihil soluta omnis voluptatum. Ratione magnam possimus, quidem cum unde aspernatur blanditiis molestias aliquam officia id, delectus ut nulla laboriosam quod consectetur similique laborum vel non! Natus, temporibus ipsam magnam laborum reprehenderit provident quaerat? Nam commodi voluptates magnam, hic velit animi dolores unde sunt, corrupti blanditiis, aperiam alias. Dicta tempora temporibus vero provident voluptate a, quibusdam earum incidunt laborum debitis quasi, aut odio voluptatem ipsa similique harum! Provident repudiandae minima asperiores totam, tenetur porro cum quia debitis atque inventore corporis quos deserunt nesciunt repellendus at veritatis repellat iste voluptatum explicabo obcaecati nostrum, praesentium aliquam, alias temporibus! Natus voluptate voluptatibus illum debitis, fugit, aliquam quis itaque qui cum autem repellat a tempore minus et pariatur hic soluta reprehenderit inventore officia sapiente!</p><p>Perferendis, quibusdam quo magnam sed quisquam quas dignissimos doloribus cupiditate, quia tenetur vel odit molestiae sapiente quos pariatur expedita corporis nostrum voluptatem, quae fuga fugiat voluptates vero quaerat. Autem, iure! Enim esse amet facilis pariatur dolore tenetur aut ex numquam dolor odio reprehenderit exercitationem illum cumque natus repudiandae, mollitia minus quia voluptatibus nulla eligendi! Aperiam odit iusto numquam eos accusantium repellendus autem deleniti. Quod recusandae rem quaerat sint voluptates quas odit! Aliquid ipsum quaerat voluptatibus quibusdam harum aspernatur ab cum libero debitis qui vero explicabo odio obcaecati, impedit in facere asperiores. Autem debitis ab officia, unde beatae saepe ullam nam necessitatibus eos labore id explicabo omnis distinctio aliquid neque? Harum, ducimus est, voluptas quidem, quisquam eaque aut reiciendis quis exercitationem soluta repellat ea? Provident, dolorum veritatis, eligendi debitis alias magnam expedita quibusdam nulla deserunt dolore a adipisci, ipsum sequi fugiat consectetur aperiam?</p>',
            'active' => true,
        ]);

        // Create categories
        Category::factory()->create([
            'title' => 'Technology',
            'slug' => 'technology',
        ]);
        Category::factory()->create([
            'title' => 'Gaming',
            'slug' => 'gaming',
        ]);
        Category::factory()->create([
            'title' => 'Travel',
            'slug' => 'travel',
        ]);
        Category::factory()->create([
            'title' => 'Food',
            'slug' => 'food',
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

        // Call the seeders
        $this->call([
            CategoryPostSeeder::class
        ]);
    }
}
