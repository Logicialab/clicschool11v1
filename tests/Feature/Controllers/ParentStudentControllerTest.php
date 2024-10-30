<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ParentStudent;

use App\Models\Student;
use App\Models\Parente;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParentStudentControllerTest extends TestCase
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
    public function it_displays_index_view_with_parent_students(): void
    {
        $parentStudents = ParentStudent::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('parent-students.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.parent_students.index')
            ->assertViewHas('parentStudents');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_parent_student(): void
    {
        $response = $this->get(route('parent-students.create'));

        $response->assertOk()->assertViewIs('backend.parent_students.create');
    }

    /**
     * @test
     */
    public function it_stores_the_parent_student(): void
    {
        $data = ParentStudent::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('parent-students.store'), $data);

        $this->assertDatabaseHas('parent_students', $data);

        $parentStudent = ParentStudent::latest('id')->first();

        $response->assertRedirect(
            route('parent-students.edit', $parentStudent)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_parent_student(): void
    {
        $parentStudent = ParentStudent::factory()->create();

        $response = $this->get(route('parent-students.show', $parentStudent));

        $response
            ->assertOk()
            ->assertViewIs('backend.parent_students.show')
            ->assertViewHas('parentStudent');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_parent_student(): void
    {
        $parentStudent = ParentStudent::factory()->create();

        $response = $this->get(route('parent-students.edit', $parentStudent));

        $response
            ->assertOk()
            ->assertViewIs('backend.parent_students.edit')
            ->assertViewHas('parentStudent');
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

        $response = $this->put(
            route('parent-students.update', $parentStudent),
            $data
        );

        $data['id'] = $parentStudent->id;

        $this->assertDatabaseHas('parent_students', $data);

        $response->assertRedirect(
            route('parent-students.edit', $parentStudent)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_parent_student(): void
    {
        $parentStudent = ParentStudent::factory()->create();

        $response = $this->delete(
            route('parent-students.destroy', $parentStudent)
        );

        $response->assertRedirect(route('parent-students.index'));

        $this->assertModelMissing($parentStudent);
    }
}
