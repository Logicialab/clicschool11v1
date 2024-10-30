<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TeacherSalary;

use App\Models\Teacher;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherSalaryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_teacher_salaries(): void
    {
        $teacherSalaries = TeacherSalary::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('teacher-salaries.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_salaries.index')
            ->assertViewHas('teacherSalaries');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_teacher_salary(): void
    {
        $response = $this->get(route('teacher-salaries.create'));

        $response->assertOk()->assertViewIs('backend.teacher_salaries.create');
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_salary(): void
    {
        $data = TeacherSalary::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('teacher-salaries.store'), $data);

        $this->assertDatabaseHas('teacher_salaries', $data);

        $teacherSalary = TeacherSalary::latest('id')->first();

        $response->assertRedirect(
            route('teacher-salaries.edit', $teacherSalary)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_teacher_salary(): void
    {
        $teacherSalary = TeacherSalary::factory()->create();

        $response = $this->get(route('teacher-salaries.show', $teacherSalary));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_salaries.show')
            ->assertViewHas('teacherSalary');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_teacher_salary(): void
    {
        $teacherSalary = TeacherSalary::factory()->create();

        $response = $this->get(route('teacher-salaries.edit', $teacherSalary));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_salaries.edit')
            ->assertViewHas('teacherSalary');
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

        $response = $this->put(
            route('teacher-salaries.update', $teacherSalary),
            $data
        );

        $data['id'] = $teacherSalary->id;

        $this->assertDatabaseHas('teacher_salaries', $data);

        $response->assertRedirect(
            route('teacher-salaries.edit', $teacherSalary)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_teacher_salary(): void
    {
        $teacherSalary = TeacherSalary::factory()->create();

        $response = $this->delete(
            route('teacher-salaries.destroy', $teacherSalary)
        );

        $response->assertRedirect(route('teacher-salaries.index'));

        $this->assertModelMissing($teacherSalary);
    }
}
