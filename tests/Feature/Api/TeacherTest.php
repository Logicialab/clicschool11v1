<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTest extends TestCase
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
    public function it_gets_teachers_list(): void
    {
        $teachers = Teacher::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.teachers.index'));

        $response->assertOk()->assertSee($teachers[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher(): void
    {
        $data = Teacher::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.teachers.store'), $data);

        $this->assertDatabaseHas('teachers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_teacher(): void
    {
        $teacher = Teacher::factory()->create();

        $user = User::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'bio' => $this->faker->sentence(15),
            'salaire' => $this->faker->randomNumber(1),
            'school_name' => $this->faker->text(255),
            'specialite' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.teachers.update', $teacher),
            $data
        );

        $data['id'] = $teacher->id;

        $this->assertDatabaseHas('teachers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_teacher(): void
    {
        $teacher = Teacher::factory()->create();

        $response = $this->deleteJson(route('api.teachers.destroy', $teacher));

        $this->assertSoftDeleted($teacher);

        $response->assertNoContent();
    }
}
