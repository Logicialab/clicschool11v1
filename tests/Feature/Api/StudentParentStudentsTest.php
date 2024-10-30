<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\ParentStudent;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentParentStudentsTest extends TestCase
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
    public function it_gets_student_parent_students(): void
    {
        $student = Student::factory()->create();
        $parentStudents = ParentStudent::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.parent-students.index', $student)
        );

        $response->assertOk()->assertSee($parentStudents[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_student_parent_students(): void
    {
        $student = Student::factory()->create();
        $data = ParentStudent::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.parent-students.store', $student),
            $data
        );

        $this->assertDatabaseHas('parent_students', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $parentStudent = ParentStudent::latest('id')->first();

        $this->assertEquals($student->id, $parentStudent->student_id);
    }
}
