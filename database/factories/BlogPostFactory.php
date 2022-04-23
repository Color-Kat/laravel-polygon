<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $text = $this->faker->realText(rand(1000, 4000));
        $isPublished = rand(1, 5) > 1;
        $created_at = $this->faker->dateTimeBetween("-2 months", "-1 months");

        return [
            "category_id" => rand(1, 11),
            "user_id" => rand(1,3) > 1 ? 1 : 2,
            "slug" => \Str::slug($title),
            "title" => $title,
            "excerpt" => $this->faker->text(rand(40, 100)),
            "content_raw" => $text,
            "content_html" => $text,
            "is_published" => $isPublished,
            "published_at" => $isPublished ? $this->faker->dateTimeBetween("-1 months", "-1 days") : null,
            "created_at" => $created_at,
            "updated_at" => $created_at
        ];
    }
}
