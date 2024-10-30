<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Testimonial;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestimonialTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_testimonials_list(): void
    {
        $testimonials = Testimonial::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.testimonials.index'));

        $response->assertOk()->assertSee($testimonials[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_testimonial(): void
    {
        $data = Testimonial::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.testimonials.store'), $data);

        $this->assertDatabaseHas('testimonials', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_testimonial(): void
    {
        $testimonial = Testimonial::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'specialite' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'ip' => $this->faker->ipv4(),
        ];

        $response = $this->putJson(
            route('api.testimonials.update', $testimonial),
            $data
        );

        $data['id'] = $testimonial->id;

        $this->assertDatabaseHas('testimonials', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_testimonial(): void
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->deleteJson(
            route('api.testimonials.destroy', $testimonial)
        );

        $this->assertModelMissing($testimonial);

        $response->assertNoContent();
    }
}
