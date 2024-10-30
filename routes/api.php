<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\LiveController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ParenteController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ExerciceController;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\ConfigKeyController;
use App\Http\Controllers\Api\MenuMenusController;
use App\Http\Controllers\Api\AnswerQuizController;
use App\Http\Controllers\Api\ConfigSiteController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CourseFilesController;
use App\Http\Controllers\Api\CourseLivesController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\UserWalletsController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\LevelClassesController;
use App\Http\Controllers\Api\CourseVideosController;
use App\Http\Controllers\Api\QuestionQuizController;
use App\Http\Controllers\Api\TeacherLivesController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserTeachersController;
use App\Http\Controllers\Api\UserStudentsController;
use App\Http\Controllers\Api\UserParentesController;
use App\Http\Controllers\Api\UserArticlesController;
use App\Http\Controllers\Api\CourseQuizzesController;
use App\Http\Controllers\Api\FormationTypeController;
use App\Http\Controllers\Api\TeacherSalaryController;
use App\Http\Controllers\Api\ParentStudentController;
use App\Http\Controllers\Api\ClasseStudentsController;
use App\Http\Controllers\Api\ClasseSubjectsController;
use App\Http\Controllers\Api\TeacherCoursesController;
use App\Http\Controllers\Api\TeacherPaymentController;
use App\Http\Controllers\Api\SubjectCoursesController;
use App\Http\Controllers\Api\CourseExercicesController;
use App\Http\Controllers\Api\FormationDetailController;
use App\Http\Controllers\Api\LiveParticipantController;
use App\Http\Controllers\Api\ExerciseSolutionController;
use App\Http\Controllers\Api\UserTransactionsController;
use App\Http\Controllers\Api\QuizQuestionQuizsController;
use App\Http\Controllers\Api\StudentAnswerQuizController;
use App\Http\Controllers\Api\TeacherFormationsController;
use App\Http\Controllers\Api\CompetitionAnswerController;
use App\Http\Controllers\Api\PlanSubscriptionsController;
use App\Http\Controllers\Api\UserSubscriptionsController;
use App\Http\Controllers\Api\ClasseCompetitionsController;
use App\Http\Controllers\Api\CompetitionQuestionController;
use App\Http\Controllers\Api\FormationParticipantController;
use App\Http\Controllers\Api\LiveLiveParticipantsController;
use App\Http\Controllers\Api\ConfigKeyConfigSitesController;
use App\Http\Controllers\Api\StudentParentStudentsController;
use App\Http\Controllers\Api\ParenteParentStudentsController;
use App\Http\Controllers\Api\TeacherTeacherSalariesController;
use App\Http\Controllers\Api\TeacherTeacherPaymentsController;
use App\Http\Controllers\Api\QuestionQuizAnswerQuizsController;
use App\Http\Controllers\Api\FormationTypeFormationsController;
use App\Http\Controllers\Api\StudentLiveParticipantsController;
use App\Http\Controllers\Api\ExerciceExerciseSolutionsController;
use App\Http\Controllers\Api\FormationFormationDetailsController;
use App\Http\Controllers\Api\StudentStudentAnswerQuizsController;
use App\Http\Controllers\Api\StudentCompetitionAnswersController;
use App\Http\Controllers\Api\StudentFormationParticipantsController;
use App\Http\Controllers\Api\QuestionQuizStudentAnswerQuizsController;
use App\Http\Controllers\Api\FormationFormationParticipantsController;
use App\Http\Controllers\Api\CompetitionCompetitionQuestionsController;
use App\Http\Controllers\Api\CompetitionQuestionCompetitionAnswersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::get('/levels', [LevelController::class, 'index'])->name(
            'levels.index'
        );
        Route::post('/levels', [LevelController::class, 'store'])->name(
            'levels.store'
        );
        Route::get('/levels/{level}', [LevelController::class, 'show'])->name(
            'levels.show'
        );
        Route::put('/levels/{level}', [LevelController::class, 'update'])->name(
            'levels.update'
        );
        Route::delete('/levels/{level}', [
            LevelController::class,
            'destroy',
        ])->name('levels.destroy');

        // Level Classes
        Route::get('/levels/{level}/classes', [
            LevelClassesController::class,
            'index',
        ])->name('levels.classes.index');
        Route::post('/levels/{level}/classes', [
            LevelClassesController::class,
            'store',
        ])->name('levels.classes.store');

        Route::get('/classes', [ClasseController::class, 'index'])->name(
            'classes.index'
        );
        Route::post('/classes', [ClasseController::class, 'store'])->name(
            'classes.store'
        );
        Route::get('/classes/{classe}', [
            ClasseController::class,
            'show',
        ])->name('classes.show');
        Route::put('/classes/{classe}', [
            ClasseController::class,
            'update',
        ])->name('classes.update');
        Route::delete('/classes/{classe}', [
            ClasseController::class,
            'destroy',
        ])->name('classes.destroy');

        // Classe Students
        Route::get('/classes/{classe}/students', [
            ClasseStudentsController::class,
            'index',
        ])->name('classes.students.index');
        Route::post('/classes/{classe}/students', [
            ClasseStudentsController::class,
            'store',
        ])->name('classes.students.store');

        // Classe Subjects
        Route::get('/classes/{classe}/subjects', [
            ClasseSubjectsController::class,
            'index',
        ])->name('classes.subjects.index');
        Route::post('/classes/{classe}/subjects', [
            ClasseSubjectsController::class,
            'store',
        ])->name('classes.subjects.store');

        // Classe Competitions
        Route::get('/classes/{classe}/competitions', [
            ClasseCompetitionsController::class,
            'index',
        ])->name('classes.competitions.index');
        Route::post('/classes/{classe}/competitions', [
            ClasseCompetitionsController::class,
            'store',
        ])->name('classes.competitions.store');

        Route::get('/courses', [CourseController::class, 'index'])->name(
            'courses.index'
        );
        Route::post('/courses', [CourseController::class, 'store'])->name(
            'courses.store'
        );
        Route::get('/courses/{course}', [
            CourseController::class,
            'show',
        ])->name('courses.show');
        Route::put('/courses/{course}', [
            CourseController::class,
            'update',
        ])->name('courses.update');
        Route::delete('/courses/{course}', [
            CourseController::class,
            'destroy',
        ])->name('courses.destroy');

        // Course Videos
        Route::get('/courses/{course}/videos', [
            CourseVideosController::class,
            'index',
        ])->name('courses.videos.index');
        Route::post('/courses/{course}/videos', [
            CourseVideosController::class,
            'store',
        ])->name('courses.videos.store');

        // Course Files
        Route::get('/courses/{course}/files', [
            CourseFilesController::class,
            'index',
        ])->name('courses.files.index');
        Route::post('/courses/{course}/files', [
            CourseFilesController::class,
            'store',
        ])->name('courses.files.store');

        // Course Lives
        Route::get('/courses/{course}/lives', [
            CourseLivesController::class,
            'index',
        ])->name('courses.lives.index');
        Route::post('/courses/{course}/lives', [
            CourseLivesController::class,
            'store',
        ])->name('courses.lives.store');

        // Course Exercices
        Route::get('/courses/{course}/exercices', [
            CourseExercicesController::class,
            'index',
        ])->name('courses.exercices.index');
        Route::post('/courses/{course}/exercices', [
            CourseExercicesController::class,
            'store',
        ])->name('courses.exercices.store');

        // Course Quizzes
        Route::get('/courses/{course}/quizzes', [
            CourseQuizzesController::class,
            'index',
        ])->name('courses.quizzes.index');
        Route::post('/courses/{course}/quizzes', [
            CourseQuizzesController::class,
            'store',
        ])->name('courses.quizzes.store');

        Route::get('/exercices', [ExerciceController::class, 'index'])->name(
            'exercices.index'
        );
        Route::post('/exercices', [ExerciceController::class, 'store'])->name(
            'exercices.store'
        );
        Route::get('/exercices/{exercice}', [
            ExerciceController::class,
            'show',
        ])->name('exercices.show');
        Route::put('/exercices/{exercice}', [
            ExerciceController::class,
            'update',
        ])->name('exercices.update');
        Route::delete('/exercices/{exercice}', [
            ExerciceController::class,
            'destroy',
        ])->name('exercices.destroy');

        // Exercice Exercise Solutions
        Route::get('/exercices/{exercice}/exercise-solutions', [
            ExerciceExerciseSolutionsController::class,
            'index',
        ])->name('exercices.exercise-solutions.index');
        Route::post('/exercices/{exercice}/exercise-solutions', [
            ExerciceExerciseSolutionsController::class,
            'store',
        ])->name('exercices.exercise-solutions.store');

        Route::get('/exercise-solutions', [
            ExerciseSolutionController::class,
            'index',
        ])->name('exercise-solutions.index');
        Route::post('/exercise-solutions', [
            ExerciseSolutionController::class,
            'store',
        ])->name('exercise-solutions.store');
        Route::get('/exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'show',
        ])->name('exercise-solutions.show');
        Route::put('/exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'update',
        ])->name('exercise-solutions.update');
        Route::delete('/exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'destroy',
        ])->name('exercise-solutions.destroy');

        Route::get('/files', [FileController::class, 'index'])->name(
            'files.index'
        );
        Route::post('/files', [FileController::class, 'store'])->name(
            'files.store'
        );
        Route::get('/files/{file}', [FileController::class, 'show'])->name(
            'files.show'
        );
        Route::put('/files/{file}', [FileController::class, 'update'])->name(
            'files.update'
        );
        Route::delete('/files/{file}', [
            FileController::class,
            'destroy',
        ])->name('files.destroy');

        Route::get('/videos', [VideoController::class, 'index'])->name(
            'videos.index'
        );
        Route::post('/videos', [VideoController::class, 'store'])->name(
            'videos.store'
        );
        Route::get('/videos/{video}', [VideoController::class, 'show'])->name(
            'videos.show'
        );
        Route::put('/videos/{video}', [VideoController::class, 'update'])->name(
            'videos.update'
        );
        Route::delete('/videos/{video}', [
            VideoController::class,
            'destroy',
        ])->name('videos.destroy');

        Route::get('/quizzes', [QuizController::class, 'index'])->name(
            'quizzes.index'
        );
        Route::post('/quizzes', [QuizController::class, 'store'])->name(
            'quizzes.store'
        );
        Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name(
            'quizzes.show'
        );
        Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name(
            'quizzes.update'
        );
        Route::delete('/quizzes/{quiz}', [
            QuizController::class,
            'destroy',
        ])->name('quizzes.destroy');

        // Quiz Question Quizs
        Route::get('/quizzes/{quiz}/question-quizs', [
            QuizQuestionQuizsController::class,
            'index',
        ])->name('quizzes.question-quizs.index');
        Route::post('/quizzes/{quiz}/question-quizs', [
            QuizQuestionQuizsController::class,
            'store',
        ])->name('quizzes.question-quizs.store');

        Route::get('/question-quizs', [
            QuestionQuizController::class,
            'index',
        ])->name('question-quizs.index');
        Route::post('/question-quizs', [
            QuestionQuizController::class,
            'store',
        ])->name('question-quizs.store');
        Route::get('/question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'show',
        ])->name('question-quizs.show');
        Route::put('/question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'update',
        ])->name('question-quizs.update');
        Route::delete('/question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'destroy',
        ])->name('question-quizs.destroy');

        // QuestionQuiz Answer Quizs
        Route::get('/question-quizs/{questionQuiz}/answer-quizs', [
            QuestionQuizAnswerQuizsController::class,
            'index',
        ])->name('question-quizs.answer-quizs.index');
        Route::post('/question-quizs/{questionQuiz}/answer-quizs', [
            QuestionQuizAnswerQuizsController::class,
            'store',
        ])->name('question-quizs.answer-quizs.store');

        // QuestionQuiz Student Answer Quizs
        Route::get('/question-quizs/{questionQuiz}/student-answer-quizs', [
            QuestionQuizStudentAnswerQuizsController::class,
            'index',
        ])->name('question-quizs.student-answer-quizs.index');
        Route::post('/question-quizs/{questionQuiz}/student-answer-quizs', [
            QuestionQuizStudentAnswerQuizsController::class,
            'store',
        ])->name('question-quizs.student-answer-quizs.store');

        Route::get('/answer-quizs', [
            AnswerQuizController::class,
            'index',
        ])->name('answer-quizs.index');
        Route::post('/answer-quizs', [
            AnswerQuizController::class,
            'store',
        ])->name('answer-quizs.store');
        Route::get('/answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'show',
        ])->name('answer-quizs.show');
        Route::put('/answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'update',
        ])->name('answer-quizs.update');
        Route::delete('/answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'destroy',
        ])->name('answer-quizs.destroy');

        Route::get('/student-answer-quizs', [
            StudentAnswerQuizController::class,
            'index',
        ])->name('student-answer-quizs.index');
        Route::post('/student-answer-quizs', [
            StudentAnswerQuizController::class,
            'store',
        ])->name('student-answer-quizs.store');
        Route::get('/student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'show',
        ])->name('student-answer-quizs.show');
        Route::put('/student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'update',
        ])->name('student-answer-quizs.update');
        Route::delete('/student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'destroy',
        ])->name('student-answer-quizs.destroy');

        Route::get('/formations', [FormationController::class, 'index'])->name(
            'formations.index'
        );
        Route::post('/formations', [FormationController::class, 'store'])->name(
            'formations.store'
        );
        Route::get('/formations/{formation}', [
            FormationController::class,
            'show',
        ])->name('formations.show');
        Route::put('/formations/{formation}', [
            FormationController::class,
            'update',
        ])->name('formations.update');
        Route::delete('/formations/{formation}', [
            FormationController::class,
            'destroy',
        ])->name('formations.destroy');

        // Formation Formation Participants
        Route::get('/formations/{formation}/formation-participants', [
            FormationFormationParticipantsController::class,
            'index',
        ])->name('formations.formation-participants.index');
        Route::post('/formations/{formation}/formation-participants', [
            FormationFormationParticipantsController::class,
            'store',
        ])->name('formations.formation-participants.store');

        // Formation Formation Details
        Route::get('/formations/{formation}/formation-details', [
            FormationFormationDetailsController::class,
            'index',
        ])->name('formations.formation-details.index');
        Route::post('/formations/{formation}/formation-details', [
            FormationFormationDetailsController::class,
            'store',
        ])->name('formations.formation-details.store');

        Route::get('/formation-details', [
            FormationDetailController::class,
            'index',
        ])->name('formation-details.index');
        Route::post('/formation-details', [
            FormationDetailController::class,
            'store',
        ])->name('formation-details.store');
        Route::get('/formation-details/{formationDetail}', [
            FormationDetailController::class,
            'show',
        ])->name('formation-details.show');
        Route::put('/formation-details/{formationDetail}', [
            FormationDetailController::class,
            'update',
        ])->name('formation-details.update');
        Route::delete('/formation-details/{formationDetail}', [
            FormationDetailController::class,
            'destroy',
        ])->name('formation-details.destroy');

        Route::get('/formation-types', [
            FormationTypeController::class,
            'index',
        ])->name('formation-types.index');
        Route::post('/formation-types', [
            FormationTypeController::class,
            'store',
        ])->name('formation-types.store');
        Route::get('/formation-types/{formationType}', [
            FormationTypeController::class,
            'show',
        ])->name('formation-types.show');
        Route::put('/formation-types/{formationType}', [
            FormationTypeController::class,
            'update',
        ])->name('formation-types.update');
        Route::delete('/formation-types/{formationType}', [
            FormationTypeController::class,
            'destroy',
        ])->name('formation-types.destroy');

        // FormationType Formations
        Route::get('/formation-types/{formationType}/formations', [
            FormationTypeFormationsController::class,
            'index',
        ])->name('formation-types.formations.index');
        Route::post('/formation-types/{formationType}/formations', [
            FormationTypeFormationsController::class,
            'store',
        ])->name('formation-types.formations.store');

        Route::get('/formation-participants', [
            FormationParticipantController::class,
            'index',
        ])->name('formation-participants.index');
        Route::post('/formation-participants', [
            FormationParticipantController::class,
            'store',
        ])->name('formation-participants.store');
        Route::get('/formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'show',
        ])->name('formation-participants.show');
        Route::put('/formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'update',
        ])->name('formation-participants.update');
        Route::delete('/formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'destroy',
        ])->name('formation-participants.destroy');

        Route::get('/teachers', [TeacherController::class, 'index'])->name(
            'teachers.index'
        );
        Route::post('/teachers', [TeacherController::class, 'store'])->name(
            'teachers.store'
        );
        Route::get('/teachers/{teacher}', [
            TeacherController::class,
            'show',
        ])->name('teachers.show');
        Route::put('/teachers/{teacher}', [
            TeacherController::class,
            'update',
        ])->name('teachers.update');
        Route::delete('/teachers/{teacher}', [
            TeacherController::class,
            'destroy',
        ])->name('teachers.destroy');

        // Teacher Teacher Salaries
        Route::get('/teachers/{teacher}/teacher-salaries', [
            TeacherTeacherSalariesController::class,
            'index',
        ])->name('teachers.teacher-salaries.index');
        Route::post('/teachers/{teacher}/teacher-salaries', [
            TeacherTeacherSalariesController::class,
            'store',
        ])->name('teachers.teacher-salaries.store');

        // Teacher Teacher Payments
        Route::get('/teachers/{teacher}/teacher-payments', [
            TeacherTeacherPaymentsController::class,
            'index',
        ])->name('teachers.teacher-payments.index');
        Route::post('/teachers/{teacher}/teacher-payments', [
            TeacherTeacherPaymentsController::class,
            'store',
        ])->name('teachers.teacher-payments.store');

        // Teacher Lives
        Route::get('/teachers/{teacher}/lives', [
            TeacherLivesController::class,
            'index',
        ])->name('teachers.lives.index');
        Route::post('/teachers/{teacher}/lives', [
            TeacherLivesController::class,
            'store',
        ])->name('teachers.lives.store');

        // Teacher Courses
        Route::get('/teachers/{teacher}/courses', [
            TeacherCoursesController::class,
            'index',
        ])->name('teachers.courses.index');
        Route::post('/teachers/{teacher}/courses', [
            TeacherCoursesController::class,
            'store',
        ])->name('teachers.courses.store');

        // Teacher Formations
        Route::get('/teachers/{teacher}/formations', [
            TeacherFormationsController::class,
            'index',
        ])->name('teachers.formations.index');
        Route::post('/teachers/{teacher}/formations', [
            TeacherFormationsController::class,
            'store',
        ])->name('teachers.formations.store');

        Route::get('/teacher-salaries', [
            TeacherSalaryController::class,
            'index',
        ])->name('teacher-salaries.index');
        Route::post('/teacher-salaries', [
            TeacherSalaryController::class,
            'store',
        ])->name('teacher-salaries.store');
        Route::get('/teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'show',
        ])->name('teacher-salaries.show');
        Route::put('/teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'update',
        ])->name('teacher-salaries.update');
        Route::delete('/teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'destroy',
        ])->name('teacher-salaries.destroy');

        Route::get('/teacher-payments', [
            TeacherPaymentController::class,
            'index',
        ])->name('teacher-payments.index');
        Route::post('/teacher-payments', [
            TeacherPaymentController::class,
            'store',
        ])->name('teacher-payments.store');
        Route::get('/teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'show',
        ])->name('teacher-payments.show');
        Route::put('/teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'update',
        ])->name('teacher-payments.update');
        Route::delete('/teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'destroy',
        ])->name('teacher-payments.destroy');

        Route::get('/transactions', [
            TransactionController::class,
            'index',
        ])->name('transactions.index');
        Route::post('/transactions', [
            TransactionController::class,
            'store',
        ])->name('transactions.store');
        Route::get('/transactions/{transaction}', [
            TransactionController::class,
            'show',
        ])->name('transactions.show');
        Route::put('/transactions/{transaction}', [
            TransactionController::class,
            'update',
        ])->name('transactions.update');
        Route::delete('/transactions/{transaction}', [
            TransactionController::class,
            'destroy',
        ])->name('transactions.destroy');

        Route::get('/students', [StudentController::class, 'index'])->name(
            'students.index'
        );
        Route::post('/students', [StudentController::class, 'store'])->name(
            'students.store'
        );
        Route::get('/students/{student}', [
            StudentController::class,
            'show',
        ])->name('students.show');
        Route::put('/students/{student}', [
            StudentController::class,
            'update',
        ])->name('students.update');
        Route::delete('/students/{student}', [
            StudentController::class,
            'destroy',
        ])->name('students.destroy');

        // Student Live Participants
        Route::get('/students/{student}/live-participants', [
            StudentLiveParticipantsController::class,
            'index',
        ])->name('students.live-participants.index');
        Route::post('/students/{student}/live-participants', [
            StudentLiveParticipantsController::class,
            'store',
        ])->name('students.live-participants.store');

        // Student Parent Students
        Route::get('/students/{student}/parent-students', [
            StudentParentStudentsController::class,
            'index',
        ])->name('students.parent-students.index');
        Route::post('/students/{student}/parent-students', [
            StudentParentStudentsController::class,
            'store',
        ])->name('students.parent-students.store');

        // Student Student Answer Quizs
        Route::get('/students/{student}/student-answer-quizs', [
            StudentStudentAnswerQuizsController::class,
            'index',
        ])->name('students.student-answer-quizs.index');
        Route::post('/students/{student}/student-answer-quizs', [
            StudentStudentAnswerQuizsController::class,
            'store',
        ])->name('students.student-answer-quizs.store');

        // Student Formation Participants
        Route::get('/students/{student}/formation-participants', [
            StudentFormationParticipantsController::class,
            'index',
        ])->name('students.formation-participants.index');
        Route::post('/students/{student}/formation-participants', [
            StudentFormationParticipantsController::class,
            'store',
        ])->name('students.formation-participants.store');

        // Student Competition Answers
        Route::get('/students/{student}/competition-answers', [
            StudentCompetitionAnswersController::class,
            'index',
        ])->name('students.competition-answers.index');
        Route::post('/students/{student}/competition-answers', [
            StudentCompetitionAnswersController::class,
            'store',
        ])->name('students.competition-answers.store');

        Route::get('/competitions', [
            CompetitionController::class,
            'index',
        ])->name('competitions.index');
        Route::post('/competitions', [
            CompetitionController::class,
            'store',
        ])->name('competitions.store');
        Route::get('/competitions/{competition}', [
            CompetitionController::class,
            'show',
        ])->name('competitions.show');
        Route::put('/competitions/{competition}', [
            CompetitionController::class,
            'update',
        ])->name('competitions.update');
        Route::delete('/competitions/{competition}', [
            CompetitionController::class,
            'destroy',
        ])->name('competitions.destroy');

        // Competition Competition Questions
        Route::get('/competitions/{competition}/competition-questions', [
            CompetitionCompetitionQuestionsController::class,
            'index',
        ])->name('competitions.competition-questions.index');
        Route::post('/competitions/{competition}/competition-questions', [
            CompetitionCompetitionQuestionsController::class,
            'store',
        ])->name('competitions.competition-questions.store');

        Route::get('/competition-questions', [
            CompetitionQuestionController::class,
            'index',
        ])->name('competition-questions.index');
        Route::post('/competition-questions', [
            CompetitionQuestionController::class,
            'store',
        ])->name('competition-questions.store');
        Route::get('/competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'show',
        ])->name('competition-questions.show');
        Route::put('/competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'update',
        ])->name('competition-questions.update');
        Route::delete('/competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'destroy',
        ])->name('competition-questions.destroy');

        // CompetitionQuestion Competition Answers
        Route::get(
            '/competition-questions/{competitionQuestion}/competition-answers',
            [CompetitionQuestionCompetitionAnswersController::class, 'index']
        )->name('competition-questions.competition-answers.index');
        Route::post(
            '/competition-questions/{competitionQuestion}/competition-answers',
            [CompetitionQuestionCompetitionAnswersController::class, 'store']
        )->name('competition-questions.competition-answers.store');

        Route::get('/competition-answers', [
            CompetitionAnswerController::class,
            'index',
        ])->name('competition-answers.index');
        Route::post('/competition-answers', [
            CompetitionAnswerController::class,
            'store',
        ])->name('competition-answers.store');
        Route::get('/competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'show',
        ])->name('competition-answers.show');
        Route::put('/competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'update',
        ])->name('competition-answers.update');
        Route::delete('/competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'destroy',
        ])->name('competition-answers.destroy');

        Route::get('/parentes', [ParenteController::class, 'index'])->name(
            'parentes.index'
        );
        Route::post('/parentes', [ParenteController::class, 'store'])->name(
            'parentes.store'
        );
        Route::get('/parentes/{parente}', [
            ParenteController::class,
            'show',
        ])->name('parentes.show');
        Route::put('/parentes/{parente}', [
            ParenteController::class,
            'update',
        ])->name('parentes.update');
        Route::delete('/parentes/{parente}', [
            ParenteController::class,
            'destroy',
        ])->name('parentes.destroy');

        // Parente Parent Students
        Route::get('/parentes/{parente}/parent-students', [
            ParenteParentStudentsController::class,
            'index',
        ])->name('parentes.parent-students.index');
        Route::post('/parentes/{parente}/parent-students', [
            ParenteParentStudentsController::class,
            'store',
        ])->name('parentes.parent-students.store');

        Route::get('/parent-students', [
            ParentStudentController::class,
            'index',
        ])->name('parent-students.index');
        Route::post('/parent-students', [
            ParentStudentController::class,
            'store',
        ])->name('parent-students.store');
        Route::get('/parent-students/{parentStudent}', [
            ParentStudentController::class,
            'show',
        ])->name('parent-students.show');
        Route::put('/parent-students/{parentStudent}', [
            ParentStudentController::class,
            'update',
        ])->name('parent-students.update');
        Route::delete('/parent-students/{parentStudent}', [
            ParentStudentController::class,
            'destroy',
        ])->name('parent-students.destroy');

        Route::get('/subjects', [SubjectController::class, 'index'])->name(
            'subjects.index'
        );
        Route::post('/subjects', [SubjectController::class, 'store'])->name(
            'subjects.store'
        );
        Route::get('/subjects/{subject}', [
            SubjectController::class,
            'show',
        ])->name('subjects.show');
        Route::put('/subjects/{subject}', [
            SubjectController::class,
            'update',
        ])->name('subjects.update');
        Route::delete('/subjects/{subject}', [
            SubjectController::class,
            'destroy',
        ])->name('subjects.destroy');

        // Subject Courses
        Route::get('/subjects/{subject}/courses', [
            SubjectCoursesController::class,
            'index',
        ])->name('subjects.courses.index');
        Route::post('/subjects/{subject}/courses', [
            SubjectCoursesController::class,
            'store',
        ])->name('subjects.courses.store');

        Route::get('/lives', [LiveController::class, 'index'])->name(
            'lives.index'
        );
        Route::post('/lives', [LiveController::class, 'store'])->name(
            'lives.store'
        );
        Route::get('/lives/{live}', [LiveController::class, 'show'])->name(
            'lives.show'
        );
        Route::put('/lives/{live}', [LiveController::class, 'update'])->name(
            'lives.update'
        );
        Route::delete('/lives/{live}', [
            LiveController::class,
            'destroy',
        ])->name('lives.destroy');

        // Live Live Participants
        Route::get('/lives/{live}/live-participants', [
            LiveLiveParticipantsController::class,
            'index',
        ])->name('lives.live-participants.index');
        Route::post('/lives/{live}/live-participants', [
            LiveLiveParticipantsController::class,
            'store',
        ])->name('lives.live-participants.store');

        Route::get('/live-participants', [
            LiveParticipantController::class,
            'index',
        ])->name('live-participants.index');
        Route::post('/live-participants', [
            LiveParticipantController::class,
            'store',
        ])->name('live-participants.store');
        Route::get('/live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'show',
        ])->name('live-participants.show');
        Route::put('/live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'update',
        ])->name('live-participants.update');
        Route::delete('/live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'destroy',
        ])->name('live-participants.destroy');

        Route::get('/plans', [PlanController::class, 'index'])->name(
            'plans.index'
        );
        Route::post('/plans', [PlanController::class, 'store'])->name(
            'plans.store'
        );
        Route::get('/plans/{plan}', [PlanController::class, 'show'])->name(
            'plans.show'
        );
        Route::put('/plans/{plan}', [PlanController::class, 'update'])->name(
            'plans.update'
        );
        Route::delete('/plans/{plan}', [
            PlanController::class,
            'destroy',
        ])->name('plans.destroy');

        // Plan Subscriptions
        Route::get('/plans/{plan}/subscriptions', [
            PlanSubscriptionsController::class,
            'index',
        ])->name('plans.subscriptions.index');
        Route::post('/plans/{plan}/subscriptions', [
            PlanSubscriptionsController::class,
            'store',
        ])->name('plans.subscriptions.store');

        Route::get('/subscriptions', [
            SubscriptionController::class,
            'index',
        ])->name('subscriptions.index');
        Route::post('/subscriptions', [
            SubscriptionController::class,
            'store',
        ])->name('subscriptions.store');
        Route::get('/subscriptions/{subscription}', [
            SubscriptionController::class,
            'show',
        ])->name('subscriptions.show');
        Route::put('/subscriptions/{subscription}', [
            SubscriptionController::class,
            'update',
        ])->name('subscriptions.update');
        Route::delete('/subscriptions/{subscription}', [
            SubscriptionController::class,
            'destroy',
        ])->name('subscriptions.destroy');

        Route::get('/users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('/users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('/users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::put('/users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('/users/{user}', [
            UserController::class,
            'destroy',
        ])->name('users.destroy');

        // User Teachers
        Route::get('/users/{user}/teachers', [
            UserTeachersController::class,
            'index',
        ])->name('users.teachers.index');
        Route::post('/users/{user}/teachers', [
            UserTeachersController::class,
            'store',
        ])->name('users.teachers.store');

        // User Students
        Route::get('/users/{user}/students', [
            UserStudentsController::class,
            'index',
        ])->name('users.students.index');
        Route::post('/users/{user}/students', [
            UserStudentsController::class,
            'store',
        ])->name('users.students.store');

        // User Subscriptions
        Route::get('/users/{user}/subscriptions', [
            UserSubscriptionsController::class,
            'index',
        ])->name('users.subscriptions.index');
        Route::post('/users/{user}/subscriptions', [
            UserSubscriptionsController::class,
            'store',
        ])->name('users.subscriptions.store');

        // User Wallets
        Route::get('/users/{user}/wallets', [
            UserWalletsController::class,
            'index',
        ])->name('users.wallets.index');
        Route::post('/users/{user}/wallets', [
            UserWalletsController::class,
            'store',
        ])->name('users.wallets.store');

        // User Transactions
        Route::get('/users/{user}/transactions', [
            UserTransactionsController::class,
            'index',
        ])->name('users.transactions.index');
        Route::post('/users/{user}/transactions', [
            UserTransactionsController::class,
            'store',
        ])->name('users.transactions.store');

        // User Parentes
        Route::get('/users/{user}/parentes', [
            UserParentesController::class,
            'index',
        ])->name('users.parentes.index');
        Route::post('/users/{user}/parentes', [
            UserParentesController::class,
            'store',
        ])->name('users.parentes.store');

        // User Articles
        Route::get('/users/{user}/articles', [
            UserArticlesController::class,
            'index',
        ])->name('users.articles.index');
        Route::post('/users/{user}/articles', [
            UserArticlesController::class,
            'store',
        ])->name('users.articles.store');

        Route::get('/wallets', [WalletController::class, 'index'])->name(
            'wallets.index'
        );
        Route::post('/wallets', [WalletController::class, 'store'])->name(
            'wallets.store'
        );
        Route::get('/wallets/{wallet}', [
            WalletController::class,
            'show',
        ])->name('wallets.show');
        Route::put('/wallets/{wallet}', [
            WalletController::class,
            'update',
        ])->name('wallets.update');
        Route::delete('/wallets/{wallet}', [
            WalletController::class,
            'destroy',
        ])->name('wallets.destroy');

        Route::get('/articles', [ArticleController::class, 'index'])->name(
            'articles.index'
        );
        Route::post('/articles', [ArticleController::class, 'store'])->name(
            'articles.store'
        );
        Route::get('/articles/{article}', [
            ArticleController::class,
            'show',
        ])->name('articles.show');
        Route::put('/articles/{article}', [
            ArticleController::class,
            'update',
        ])->name('articles.update');
        Route::delete('/articles/{article}', [
            ArticleController::class,
            'destroy',
        ])->name('articles.destroy');

        Route::get('/config-keys', [ConfigKeyController::class, 'index'])->name(
            'config-keys.index'
        );
        Route::post('/config-keys', [
            ConfigKeyController::class,
            'store',
        ])->name('config-keys.store');
        Route::get('/config-keys/{configKey}', [
            ConfigKeyController::class,
            'show',
        ])->name('config-keys.show');
        Route::put('/config-keys/{configKey}', [
            ConfigKeyController::class,
            'update',
        ])->name('config-keys.update');
        Route::delete('/config-keys/{configKey}', [
            ConfigKeyController::class,
            'destroy',
        ])->name('config-keys.destroy');

        // ConfigKey Config Sites
        Route::get('/config-keys/{configKey}/config-sites', [
            ConfigKeyConfigSitesController::class,
            'index',
        ])->name('config-keys.config-sites.index');
        Route::post('/config-keys/{configKey}/config-sites', [
            ConfigKeyConfigSitesController::class,
            'store',
        ])->name('config-keys.config-sites.store');

        Route::get('/config-sites', [
            ConfigSiteController::class,
            'index',
        ])->name('config-sites.index');
        Route::post('/config-sites', [
            ConfigSiteController::class,
            'store',
        ])->name('config-sites.store');
        Route::get('/config-sites/{configSite}', [
            ConfigSiteController::class,
            'show',
        ])->name('config-sites.show');
        Route::put('/config-sites/{configSite}', [
            ConfigSiteController::class,
            'update',
        ])->name('config-sites.update');
        Route::delete('/config-sites/{configSite}', [
            ConfigSiteController::class,
            'destroy',
        ])->name('config-sites.destroy');

        Route::get('/contacts', [ContactController::class, 'index'])->name(
            'contacts.index'
        );
        Route::post('/contacts', [ContactController::class, 'store'])->name(
            'contacts.store'
        );
        Route::get('/contacts/{contact}', [
            ContactController::class,
            'show',
        ])->name('contacts.show');
        Route::put('/contacts/{contact}', [
            ContactController::class,
            'update',
        ])->name('contacts.update');
        Route::delete('/contacts/{contact}', [
            ContactController::class,
            'destroy',
        ])->name('contacts.destroy');

        Route::get('/menus', [MenuController::class, 'index'])->name(
            'menus.index'
        );
        Route::post('/menus', [MenuController::class, 'store'])->name(
            'menus.store'
        );
        Route::get('/menus/{menu}', [MenuController::class, 'show'])->name(
            'menus.show'
        );
        Route::put('/menus/{menu}', [MenuController::class, 'update'])->name(
            'menus.update'
        );
        Route::delete('/menus/{menu}', [
            MenuController::class,
            'destroy',
        ])->name('menus.destroy');

        // Menu Menus
        Route::get('/menus/{menu}/menus', [
            MenuMenusController::class,
            'index',
        ])->name('menus.menus.index');
        Route::post('/menus/{menu}/menus', [
            MenuMenusController::class,
            'store',
        ])->name('menus.menus.store');

        Route::get('/pages', [PageController::class, 'index'])->name(
            'pages.index'
        );
        Route::post('/pages', [PageController::class, 'store'])->name(
            'pages.store'
        );
        Route::get('/pages/{page}', [PageController::class, 'show'])->name(
            'pages.show'
        );
        Route::put('/pages/{page}', [PageController::class, 'update'])->name(
            'pages.update'
        );
        Route::delete('/pages/{page}', [
            PageController::class,
            'destroy',
        ])->name('pages.destroy');

        Route::get('/partners', [PartnerController::class, 'index'])->name(
            'partners.index'
        );
        Route::post('/partners', [PartnerController::class, 'store'])->name(
            'partners.store'
        );
        Route::get('/partners/{partner}', [
            PartnerController::class,
            'show',
        ])->name('partners.show');
        Route::put('/partners/{partner}', [
            PartnerController::class,
            'update',
        ])->name('partners.update');
        Route::delete('/partners/{partner}', [
            PartnerController::class,
            'destroy',
        ])->name('partners.destroy');

        Route::get('/testimonials', [
            TestimonialController::class,
            'index',
        ])->name('testimonials.index');
        Route::post('/testimonials', [
            TestimonialController::class,
            'store',
        ])->name('testimonials.store');
        Route::get('/testimonials/{testimonial}', [
            TestimonialController::class,
            'show',
        ])->name('testimonials.show');
        Route::put('/testimonials/{testimonial}', [
            TestimonialController::class,
            'update',
        ])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [
            TestimonialController::class,
            'destroy',
        ])->name('testimonials.destroy');
    });
