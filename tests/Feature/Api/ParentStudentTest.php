<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ParentStudent;

use App\Models\Student;
use App\Models\Parente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParentStudentTest extends TestCase
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
    public function it_gets_parent_students_list(): void
    {
        $parentStudents = ParentStudent::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.parent-students.index'));

        $response->assertOk()->assertSee($parentStudents[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_parent_student(): void
    {
        $data = ParentStudent::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.parent-students.store'), $data);

        $this->assertDatabaseHas('parent_students', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_parent_student(): void
    {
        $parentStudent = ParentStudent::factory()->create();

        $student = Student::factory()->create();
        $parente = Parente::factory()->create();

        $data = [
            'student_id' => $student->id,
            'parente_id' => $parente->id,
        ];

        $response = $this->putJson(
            route('api.parent-students.update', $parentStudent),
            $data
        );

        $data['id'] = $parentStudent->id;

        $this->assertDatabaseHas('parent_students', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_parent_student(): void
    {
        $parentStudent = ParentStudent::factory()->create();

        $response = $this->deleteJson(
            route('api.parent-students.destroy', $parentStudent)
        );

        $this->assertModelMissing($parentStudent);

        $response->assertNoContent();
    }
}
