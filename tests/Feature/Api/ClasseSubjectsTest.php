<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Classe;
use App\Models\Subject;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClasseSubjectsTest extends TestCase
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
    public function it_gets_classe_subjects(): void
    {
        $classe = Classe::factory()->create();
        $subjects = Subject::factory()
            ->count(2)
            ->create([
                'classe_id' => $classe->id,
            ]);

        $response = $this->getJson(
            route('api.classes.subjects.index', $classe)
        );

        $response->assertOk()->assertSee($subjects[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_classe_subjects(): void
    {
        $classe = Classe::factory()->create();
        $data = Subject::factory()
            ->make([
                'classe_id' => $classe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.classes.subjects.store', $classe),
            $data
        );

        $this->assertDatabaseHas('subjects', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $subject = Subject::latest('id')->first();

        $this->assertEquals($classe->id, $subject->classe_id);
    }
}
