<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Classe;
use App\Models\Student;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClasseStudentsTest extends TestCase
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
    public function it_gets_classe_students(): void
    {
        $classe = Classe::factory()->create();
        $students = Student::factory()
            ->count(2)
            ->create([
                'classe_id' => $classe->id,
            ]);

        $response = $this->getJson(
            route('api.classes.students.index', $classe)
        );

        $response->assertOk()->assertSee($students[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_classe_students(): void
    {
        $classe = Classe::factory()->create();
        $data = Student::factory()
            ->make([
                'classe_id' => $classe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.classes.students.store', $classe),
            $data
        );

        $this->assertDatabaseHas('students', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $student = Student::latest('id')->first();

        $this->assertEquals($classe->id, $student->classe_id);
    }
}
