<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Article;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_articles(): void
    {
        $articles = Article::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('articles.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.articles.index')
            ->assertViewHas('articles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_article(): void
    {
        $response = $this->get(route('articles.create'));

        $response->assertOk()->assertViewIs('backend.articles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_article(): void
    {
        $data = Article::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('articles.store'), $data);

        $this->assertDatabaseHas('articles', $data);

        $article = Article::latest('id')->first();

        $response->assertRedirect(route('articles.edit', $article));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->get(route('articles.show', $article));

        $response
            ->assertOk()
            ->assertViewIs('backend.articles.show')
            ->assertViewHas('article');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->get(route('articles.edit', $article));

        $response
            ->assertOk()
            ->assertViewIs('backend.articles.edit')
            ->assertViewHas('article');
    }

    /**
     * @test
     */
    public function it_updates_the_article(): void
    {
        $article = Article::factory()->create();

        $user = User::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text(),
            'featured' => $this->faker->boolean(),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('articles.update', $article), $data);

        $data['id'] = $article->id;

        $this->assertDatabaseHas('articles', $data);

        $response->assertRedirect(route('articles.edit', $article));
    }

    /**
     * @test
     */
    public function it_deletes_the_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->delete(route('articles.destroy', $article));

        $response->assertRedirect(route('articles.index'));

        $this->assertSoftDeleted($article);
    }
}
