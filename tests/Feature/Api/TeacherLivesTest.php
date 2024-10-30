<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Live;
use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherLivesTest extends TestCase
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
    public function it_gets_teacher_lives(): void
    {
        $teacher = Teacher::factory()->create();
        $lives = Live::factory()
            ->count(2)
            ->create([
                'teacher_id' => $teacher->id,
            ]);

        $response = $this->getJson(route('api.teachers.lives.index', $teacher));

        $response->assertOk()->assertSee($lives[0]->url);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_lives(): void
    {
        $teacher = Teacher::factory()->create();
        $data = Live::factory()
            ->make([
                'teacher_id' => $teacher->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.teachers.lives.store', $teacher),
            $data
        );

        $this->assertDatabaseHas('lives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $live = Live::latest('id')->first();

        $this->assertEquals($teacher->id, $live->teacher_id);
    }
}
