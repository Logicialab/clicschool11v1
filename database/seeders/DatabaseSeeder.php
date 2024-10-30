<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'name' => 'Abdel Jalil',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(ArticleSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(CompetitionSeeder::class);
        $this->call(CompetitionAnswerSeeder::class);
        $this->call(CompetitionQuestionSeeder::class);
        $this->call(ConfigSiteSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ExerciceSeeder::class);
        $this->call(ExerciceQcmSeeder::class);
        $this->call(ExerciceStudentSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(FormationDetailSeeder::class);
        $this->call(FormationParticipantSeeder::class);
        $this->call(FormationTypeSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(LiveCourseSeeder::class);
        $this->call(LiveFormationSeeder::class);
        $this->call(LiveFormationParticipantSeeder::class);
        $this->call(LiveParticipantSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ParenteSeeder::class);
        $this->call(ParentStudentSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(QuestionExerciceQcmSeeder::class);
        $this->call(QuestionQuizQcmSeeder::class);
        $this->call(QuizQcmSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(StudentAnswerQuestionExerciceQcmSeeder::class);
        $this->call(StudentAnswerQuizQcmSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(TeacherPaymentSeeder::class);
        $this->call(TeacherSalarySeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UnitCourseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(WalletSeeder::class);
    }
}
