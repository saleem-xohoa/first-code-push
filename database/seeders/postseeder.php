<?php
namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            $post              = new post;
            $post->id          = "9";
            $post->title       = "On the other hand, we denounce ";
            $post->description = " indignation and dislike men who are so beguiled and demoralized by the ";
            $post->user_id     = "4";
            $post->save();

        }
    }
}
