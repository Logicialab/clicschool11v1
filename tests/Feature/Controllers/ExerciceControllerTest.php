<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Exercice;

use App\Models\Course;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciceControllerTest extends TestCase
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
    public function it_displays_index_view_with_exercices(): void
    {
        $exercices = Exercice::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exercices.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.exercices.index')
            ->assertViewHas('exercices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exercice(): void
    {
        $response = $this->get(route('exercices.create'));

        $response->assertOk()->assertViewIs('backend.exercices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exercice(): void
    {
        $data = Exercice::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exercices.store'), $data);

        $this->assertDatabaseHas('exercices', $data);

        $exercice = Exercice::latest('id')->first();

        $response->assertRedirect(route('exercices.edit', $exercice));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $response = $this->get(route('exercices.show', $exercice));

        $response
            ->assertOk()
            ->assertViewIs('backend.exercices.show')
            ->assertViewHas('exercice');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $response = $this->get(route('exercices.edit', $exercice));

        $response
            ->assertOk()
            ->assertViewIs('backend.exercices.edit')
            ->assertViewHas('exercice');
    }

    /**
     * @test
     */
    public function it_updates_the_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $course = Course::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'order' => $this->faker->randomNumber(0),
            'course_id' => $course->id,
        ];

        $response = $this->put(route('exercices.update', $exercice), $data);

        $data['id'] = $exercice->id;

        $this->assertDatabaseHas('exercices', $data);

        $response->assertRedirect(route('exercices.edit', $exercice));
    }

    /**
     * @test
     */
    public function it_deletes_the_exercice(): void
    {
        $exercice = Exercice::factory()->create();

        $response = $this->delete(route('exercices.destroy', $exercice));

        $response->assertRedirect(route('exercices.index'));

        $this->assertSoftDeleted($exercice);
    }
}
