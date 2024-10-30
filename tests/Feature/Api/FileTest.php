<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\File;

use App\Models\Course;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileTest extends TestCase
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
    public function it_gets_files_list(): void
    {
        $files = File::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.files.index'));

        $response->assertOk()->assertSee($files[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_file(): void
    {
        $data = File::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.files.store'), $data);

        $this->assertDatabaseHas('files', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_file(): void
    {
        $file = File::factory()->create();

        $course = Course::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'active' => $this->faker->boolean(),
            'course_id' => $course->id,
        ];

        $response = $this->putJson(route('api.files.update', $file), $data);

        $data['id'] = $file->id;

        $this->assertDatabaseHas('files', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_file(): void
    {
        $file = File::factory()->create();

        $response = $this->deleteJson(route('api.files.destroy', $file));

        $this->assertModelMissing($file);

        $response->assertNoContent();
    }
}
