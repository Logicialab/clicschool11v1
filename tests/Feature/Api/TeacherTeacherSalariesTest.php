<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Teacher;
use App\Models\TeacherSalary;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTeacherSalariesTest extends TestCase
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
    public function it_gets_teacher_teacher_salaries(): void
    {
        $teacher = Teacher::factory()->create();
        $teacherSalaries = TeacherSalary::factory()
            ->count(2)
            ->create([
                'teacher_id' => $teacher->id,
            ]);

        $response = $this->getJson(
            route('api.teachers.teacher-salaries.index', $teacher)
        );

        $response->assertOk()->assertSee($teacherSalaries[0]->paid_at);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_teacher_salaries(): void
    {
        $teacher = Teacher::factory()->create();
        $data = TeacherSalary::factory()
            ->make([
                'teacher_id' => $teacher->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.teachers.teacher-salaries.store', $teacher),
            $data
        );

        $this->assertDatabaseHas('teacher_salaries', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $teacherSalary = TeacherSalary::latest('id')->first();

        $this->assertEquals($teacher->id, $teacherSalary->teacher_id);
    }
}
