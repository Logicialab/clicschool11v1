<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Formation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherFormationsTest extends TestCase
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
    public function it_gets_teacher_formations(): void
    {
        $teacher = Teacher::factory()->create();
        $formations = Formation::factory()
            ->count(2)
            ->create([
                'teacher_id' => $teacher->id,
            ]);

        $response = $this->getJson(
            route('api.teachers.formations.index', $teacher)
        );

        $response->assertOk()->assertSee($formations[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_formations(): void
    {
        $teacher = Teacher::factory()->create();
        $data = Formation::factory()
            ->make([
                'teacher_id' => $teacher->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.teachers.formations.store', $teacher),
            $data
        );

        $this->assertDatabaseHas('formations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $formation = Formation::latest('id')->first();

        $this->assertEquals($teacher->id, $formation->teacher_id);
    }
}
