<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTeachersTest extends TestCase
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
    public function it_gets_user_teachers(): void
    {
        $user = User::factory()->create();
        $teachers = Teacher::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.teachers.index', $user));

        $response->assertOk()->assertSee($teachers[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_user_teachers(): void
    {
        $user = User::factory()->create();
        $data = Teacher::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.teachers.store', $user),
            $data
        );

        $this->assertDatabaseHas('teachers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $teacher = Teacher::latest('id')->first();

        $this->assertEquals($user->id, $teacher->user_id);
    }
}
