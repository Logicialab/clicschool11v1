<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Parente;
use App\Models\ParentStudent;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParenteParentStudentsTest extends TestCase
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
    public function it_gets_parente_parent_students(): void
    {
        $parente = Parente::factory()->create();
        $parentStudents = ParentStudent::factory()
            ->count(2)
            ->create([
                'parente_id' => $parente->id,
            ]);

        $response = $this->getJson(
            route('api.parentes.parent-students.index', $parente)
        );

        $response->assertOk()->assertSee($parentStudents[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_parente_parent_students(): void
    {
        $parente = Parente::factory()->create();
        $data = ParentStudent::factory()
            ->make([
                'parente_id' => $parente->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.parentes.parent-students.store', $parente),
            $data
        );

        $this->assertDatabaseHas('parent_students', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $parentStudent = ParentStudent::latest('id')->first();

        $this->assertEquals($parente->id, $parentStudent->parente_id);
    }
}
