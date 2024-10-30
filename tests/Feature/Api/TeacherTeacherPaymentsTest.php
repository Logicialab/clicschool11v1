<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Teacher;
use App\Models\TeacherPayment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTeacherPaymentsTest extends TestCase
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
    public function it_gets_teacher_teacher_payments(): void
    {
        $teacher = Teacher::factory()->create();
        $teacherPayments = TeacherPayment::factory()
            ->count(2)
            ->create([
                'teacher_id' => $teacher->id,
            ]);

        $response = $this->getJson(
            route('api.teachers.teacher-payments.index', $teacher)
        );

        $response->assertOk()->assertSee($teacherPayments[0]->payment_date);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_teacher_payments(): void
    {
        $teacher = Teacher::factory()->create();
        $data = TeacherPayment::factory()
            ->make([
                'teacher_id' => $teacher->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.teachers.teacher-payments.store', $teacher),
            $data
        );

        $this->assertDatabaseHas('teacher_payments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $teacherPayment = TeacherPayment::latest('id')->first();

        $this->assertEquals($teacher->id, $teacherPayment->teacher_id);
    }
}
