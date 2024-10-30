<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TeacherSalary;

use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherSalaryTest extends TestCase
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
    public function it_gets_teacher_salaries_list(): void
    {
        $teacherSalaries = TeacherSalary::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.teacher-salaries.index'));

        $response->assertOk()->assertSee($teacherSalaries[0]->paid_at);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_salary(): void
    {
        $data = TeacherSalary::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.teacher-salaries.store'), $data);

        $this->assertDatabaseHas('teacher_salaries', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_teacher_salary(): void
    {
        $teacherSalary = TeacherSalary::factory()->create();

        $teacher = Teacher::factory()->create();

        $data = [
            'montly_salary' => $this->faker->randomNumber(1),
            'paid_at' => $this->faker->date(),
            'status' => $this->faker->word(),
            'teacher_id' => $teacher->id,
        ];

        $response = $this->putJson(
            route('api.teacher-salaries.update', $teacherSalary),
            $data
        );

        $data['id'] = $teacherSalary->id;

        $this->assertDatabaseHas('teacher_salaries', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_teacher_salary(): void
    {
        $teacherSalary = TeacherSalary::factory()->create();

        $response = $this->deleteJson(
            route('api.teacher-salaries.destroy', $teacherSalary)
        );

        $this->assertModelMissing($teacherSalary);

        $response->assertNoContent();
    }
}
