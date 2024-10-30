<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TeacherPayment;

use App\Models\Teacher;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherPaymentControllerTest extends TestCase
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
    public function it_displays_index_view_with_teacher_payments(): void
    {
        $teacherPayments = TeacherPayment::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('teacher-payments.index'));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_payments.index')
            ->assertViewHas('teacherPayments');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_teacher_payment(): void
    {
        $response = $this->get(route('teacher-payments.create'));

        $response->assertOk()->assertViewIs('backend.teacher_payments.create');
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_payment(): void
    {
        $data = TeacherPayment::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('teacher-payments.store'), $data);

        $this->assertDatabaseHas('teacher_payments', $data);

        $teacherPayment = TeacherPayment::latest('id')->first();

        $response->assertRedirect(
            route('teacher-payments.edit', $teacherPayment)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_teacher_payment(): void
    {
        $teacherPayment = TeacherPayment::factory()->create();

        $response = $this->get(route('teacher-payments.show', $teacherPayment));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_payments.show')
            ->assertViewHas('teacherPayment');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_teacher_payment(): void
    {
        $teacherPayment = TeacherPayment::factory()->create();

        $response = $this->get(route('teacher-payments.edit', $teacherPayment));

        $response
            ->assertOk()
            ->assertViewIs('backend.teacher_payments.edit')
            ->assertViewHas('teacherPayment');
    }

    /**
     * @test
     */
    public function it_updates_the_teacher_payment(): void
    {
        $teacherPayment = TeacherPayment::factory()->create();

        $teacher = Teacher::factory()->create();

        $data = [
            'amount' => $this->faker->randomNumber(1),
            'payment_date' => $this->faker->date(),
            'description' => $this->faker->sentence(15),
            'teacher_id' => $teacher->id,
        ];

        $response = $this->put(
            route('teacher-payments.update', $teacherPayment),
            $data
        );

        $data['id'] = $teacherPayment->id;

        $this->assertDatabaseHas('teacher_payments', $data);

        $response->assertRedirect(
            route('teacher-payments.edit', $teacherPayment)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_teacher_payment(): void
    {
        $teacherPayment = TeacherPayment::factory()->create();

        $response = $this->delete(
            route('teacher-payments.destroy', $teacherPayment)
        );

        $response->assertRedirect(route('teacher-payments.index'));

        $this->assertModelMissing($teacherPayment);
    }
}
