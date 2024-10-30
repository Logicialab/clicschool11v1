<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TeacherPayment;

use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherPaymentTest extends TestCase
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
    public function it_gets_teacher_payments_list(): void
    {
        $teacherPayments = TeacherPayment::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.teacher-payments.index'));

        $response->assertOk()->assertSee($teacherPayments[0]->payment_date);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_payment(): void
    {
        $data = TeacherPayment::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.teacher-payments.store'), $data);

        $this->assertDatabaseHas('teacher_payments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.teacher-payments.update', $teacherPayment),
            $data
        );

        $data['id'] = $teacherPayment->id;

        $this->assertDatabaseHas('teacher_payments', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_teacher_payment(): void
    {
        $teacherPayment = TeacherPayment::factory()->create();

        $response = $this->deleteJson(
            route('api.teacher-payments.destroy', $teacherPayment)
        );

        $this->assertModelMissing($teacherPayment);

        $response->assertNoContent();
    }
}
