<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\QuizController;
use App\Http\Controllers\Backend\LiveController;
use App\Http\Controllers\Backend\PlanController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\LevelController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\ClasseController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\WalletController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\ParenteController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ExerciceController;
use App\Http\Controllers\Backend\FormationController;
use App\Http\Controllers\Backend\ConfigKeyController;
use App\Http\Controllers\Backend\AnswerQuizController;
use App\Http\Controllers\Backend\ConfigSiteController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\CompetitionController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\QuestionQuizController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\FormationTypeController;
use App\Http\Controllers\Backend\TeacherSalaryController;
use App\Http\Controllers\Backend\ParentStudentController;
use App\Http\Controllers\Backend\TeacherPaymentController;
use App\Http\Controllers\Backend\FormationDetailController;
use App\Http\Controllers\Backend\LiveParticipantController;
use App\Http\Controllers\Backend\ExerciseSolutionController;
use App\Http\Controllers\Backend\StudentAnswerQuizController;
use App\Http\Controllers\Backend\CompetitionAnswerController;
use App\Http\Controllers\Backend\CompetitionQuestionController;
use App\Http\Controllers\Backend\FormationParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])
    ->get('/admin', function () {
        return view('dashboard');
    })
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

Route::prefix('/admin/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('levels', [LevelController::class, 'index'])->name(
            'levels.index'
        );
        Route::post('levels', [LevelController::class, 'store'])->name(
            'levels.store'
        );
        Route::get('levels/create', [LevelController::class, 'create'])->name(
            'levels.create'
        );
        Route::get('levels/{level}', [LevelController::class, 'show'])->name(
            'levels.show'
        );
        Route::get('levels/{level}/edit', [
            LevelController::class,
            'edit',
        ])->name('levels.edit');
        Route::put('levels/{level}', [LevelController::class, 'update'])->name(
            'levels.update'
        );
        Route::delete('levels/{level}', [
            LevelController::class,
            'destroy',
        ])->name('levels.destroy');

        Route::get('classes', [ClasseController::class, 'index'])->name(
            'classes.index'
        );
        Route::post('classes', [ClasseController::class, 'store'])->name(
            'classes.store'
        );
        Route::get('classes/create', [ClasseController::class, 'create'])->name(
            'classes.create'
        );
        Route::get('classes/{classe}', [ClasseController::class, 'show'])->name(
            'classes.show'
        );
        Route::get('classes/{classe}/edit', [
            ClasseController::class,
            'edit',
        ])->name('classes.edit');
        Route::put('classes/{classe}', [
            ClasseController::class,
            'update',
        ])->name('classes.update');
        Route::delete('classes/{classe}', [
            ClasseController::class,
            'destroy',
        ])->name('classes.destroy');

        Route::get('courses', [CourseController::class, 'index'])->name(
            'courses.index'
        );
        Route::post('courses', [CourseController::class, 'store'])->name(
            'courses.store'
        );
        Route::get('courses/create', [CourseController::class, 'create'])->name(
            'courses.create'
        );
        Route::get('courses/{course}', [CourseController::class, 'show'])->name(
            'courses.show'
        );
        Route::get('courses/{course}/edit', [
            CourseController::class,
            'edit',
        ])->name('courses.edit');
        Route::put('courses/{course}', [
            CourseController::class,
            'update',
        ])->name('courses.update');
        Route::delete('courses/{course}', [
            CourseController::class,
            'destroy',
        ])->name('courses.destroy');

        Route::get('exercices', [ExerciceController::class, 'index'])->name(
            'exercices.index'
        );
        Route::post('exercices', [ExerciceController::class, 'store'])->name(
            'exercices.store'
        );
        Route::get('exercices/create', [
            ExerciceController::class,
            'create',
        ])->name('exercices.create');
        Route::get('exercices/{exercice}', [
            ExerciceController::class,
            'show',
        ])->name('exercices.show');
        Route::get('exercices/{exercice}/edit', [
            ExerciceController::class,
            'edit',
        ])->name('exercices.edit');
        Route::put('exercices/{exercice}', [
            ExerciceController::class,
            'update',
        ])->name('exercices.update');
        Route::delete('exercices/{exercice}', [
            ExerciceController::class,
            'destroy',
        ])->name('exercices.destroy');

        Route::get('exercise-solutions', [
            ExerciseSolutionController::class,
            'index',
        ])->name('exercise-solutions.index');
        Route::post('exercise-solutions', [
            ExerciseSolutionController::class,
            'store',
        ])->name('exercise-solutions.store');
        Route::get('exercise-solutions/create', [
            ExerciseSolutionController::class,
            'create',
        ])->name('exercise-solutions.create');
        Route::get('exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'show',
        ])->name('exercise-solutions.show');
        Route::get('exercise-solutions/{exerciseSolution}/edit', [
            ExerciseSolutionController::class,
            'edit',
        ])->name('exercise-solutions.edit');
        Route::put('exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'update',
        ])->name('exercise-solutions.update');
        Route::delete('exercise-solutions/{exerciseSolution}', [
            ExerciseSolutionController::class,
            'destroy',
        ])->name('exercise-solutions.destroy');

        Route::get('files', [FileController::class, 'index'])->name(
            'files.index'
        );
        Route::post('files', [FileController::class, 'store'])->name(
            'files.store'
        );
        Route::get('files/create', [FileController::class, 'create'])->name(
            'files.create'
        );
        Route::get('files/{file}', [FileController::class, 'show'])->name(
            'files.show'
        );
        Route::get('files/{file}/edit', [FileController::class, 'edit'])->name(
            'files.edit'
        );
        Route::put('files/{file}', [FileController::class, 'update'])->name(
            'files.update'
        );
        Route::delete('files/{file}', [FileController::class, 'destroy'])->name(
            'files.destroy'
        );

        Route::get('videos', [VideoController::class, 'index'])->name(
            'videos.index'
        );
        Route::post('videos', [VideoController::class, 'store'])->name(
            'videos.store'
        );
        Route::get('videos/create', [VideoController::class, 'create'])->name(
            'videos.create'
        );
        Route::get('videos/{video}', [VideoController::class, 'show'])->name(
            'videos.show'
        );
        Route::get('videos/{video}/edit', [
            VideoController::class,
            'edit',
        ])->name('videos.edit');
        Route::put('videos/{video}', [VideoController::class, 'update'])->name(
            'videos.update'
        );
        Route::delete('videos/{video}', [
            VideoController::class,
            'destroy',
        ])->name('videos.destroy');

        Route::get('quizzes', [QuizController::class, 'index'])->name(
            'quizzes.index'
        );
        Route::post('quizzes', [QuizController::class, 'store'])->name(
            'quizzes.store'
        );
        Route::get('quizzes/create', [QuizController::class, 'create'])->name(
            'quizzes.create'
        );
        Route::get('quizzes/{quiz}', [QuizController::class, 'show'])->name(
            'quizzes.show'
        );
        Route::get('quizzes/{quiz}/edit', [
            QuizController::class,
            'edit',
        ])->name('quizzes.edit');
        Route::put('quizzes/{quiz}', [QuizController::class, 'update'])->name(
            'quizzes.update'
        );
        Route::delete('quizzes/{quiz}', [
            QuizController::class,
            'destroy',
        ])->name('quizzes.destroy');

        Route::get('question-quizs', [
            QuestionQuizController::class,
            'index',
        ])->name('question-quizs.index');
        Route::post('question-quizs', [
            QuestionQuizController::class,
            'store',
        ])->name('question-quizs.store');
        Route::get('question-quizs/create', [
            QuestionQuizController::class,
            'create',
        ])->name('question-quizs.create');
        Route::get('question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'show',
        ])->name('question-quizs.show');
        Route::get('question-quizs/{questionQuiz}/edit', [
            QuestionQuizController::class,
            'edit',
        ])->name('question-quizs.edit');
        Route::put('question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'update',
        ])->name('question-quizs.update');
        Route::delete('question-quizs/{questionQuiz}', [
            QuestionQuizController::class,
            'destroy',
        ])->name('question-quizs.destroy');

        Route::get('answer-quizs', [
            AnswerQuizController::class,
            'index',
        ])->name('answer-quizs.index');
        Route::post('answer-quizs', [
            AnswerQuizController::class,
            'store',
        ])->name('answer-quizs.store');
        Route::get('answer-quizs/create', [
            AnswerQuizController::class,
            'create',
        ])->name('answer-quizs.create');
        Route::get('answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'show',
        ])->name('answer-quizs.show');
        Route::get('answer-quizs/{answerQuiz}/edit', [
            AnswerQuizController::class,
            'edit',
        ])->name('answer-quizs.edit');
        Route::put('answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'update',
        ])->name('answer-quizs.update');
        Route::delete('answer-quizs/{answerQuiz}', [
            AnswerQuizController::class,
            'destroy',
        ])->name('answer-quizs.destroy');

        Route::get('student-answer-quizs', [
            StudentAnswerQuizController::class,
            'index',
        ])->name('student-answer-quizs.index');
        Route::post('student-answer-quizs', [
            StudentAnswerQuizController::class,
            'store',
        ])->name('student-answer-quizs.store');
        Route::get('student-answer-quizs/create', [
            StudentAnswerQuizController::class,
            'create',
        ])->name('student-answer-quizs.create');
        Route::get('student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'show',
        ])->name('student-answer-quizs.show');
        Route::get('student-answer-quizs/{studentAnswerQuiz}/edit', [
            StudentAnswerQuizController::class,
            'edit',
        ])->name('student-answer-quizs.edit');
        Route::put('student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'update',
        ])->name('student-answer-quizs.update');
        Route::delete('student-answer-quizs/{studentAnswerQuiz}', [
            StudentAnswerQuizController::class,
            'destroy',
        ])->name('student-answer-quizs.destroy');

        Route::get('formations', [FormationController::class, 'index'])->name(
            'formations.index'
        );
        Route::post('formations', [FormationController::class, 'store'])->name(
            'formations.store'
        );
        Route::get('formations/create', [
            FormationController::class,
            'create',
        ])->name('formations.create');
        Route::get('formations/{formation}', [
            FormationController::class,
            'show',
        ])->name('formations.show');
        Route::get('formations/{formation}/edit', [
            FormationController::class,
            'edit',
        ])->name('formations.edit');
        Route::put('formations/{formation}', [
            FormationController::class,
            'update',
        ])->name('formations.update');
        Route::delete('formations/{formation}', [
            FormationController::class,
            'destroy',
        ])->name('formations.destroy');

        Route::get('formation-details', [
            FormationDetailController::class,
            'index',
        ])->name('formation-details.index');
        Route::post('formation-details', [
            FormationDetailController::class,
            'store',
        ])->name('formation-details.store');
        Route::get('formation-details/create', [
            FormationDetailController::class,
            'create',
        ])->name('formation-details.create');
        Route::get('formation-details/{formationDetail}', [
            FormationDetailController::class,
            'show',
        ])->name('formation-details.show');
        Route::get('formation-details/{formationDetail}/edit', [
            FormationDetailController::class,
            'edit',
        ])->name('formation-details.edit');
        Route::put('formation-details/{formationDetail}', [
            FormationDetailController::class,
            'update',
        ])->name('formation-details.update');
        Route::delete('formation-details/{formationDetail}', [
            FormationDetailController::class,
            'destroy',
        ])->name('formation-details.destroy');

        Route::get('formation-types', [
            FormationTypeController::class,
            'index',
        ])->name('formation-types.index');
        Route::post('formation-types', [
            FormationTypeController::class,
            'store',
        ])->name('formation-types.store');
        Route::get('formation-types/create', [
            FormationTypeController::class,
            'create',
        ])->name('formation-types.create');
        Route::get('formation-types/{formationType}', [
            FormationTypeController::class,
            'show',
        ])->name('formation-types.show');
        Route::get('formation-types/{formationType}/edit', [
            FormationTypeController::class,
            'edit',
        ])->name('formation-types.edit');
        Route::put('formation-types/{formationType}', [
            FormationTypeController::class,
            'update',
        ])->name('formation-types.update');
        Route::delete('formation-types/{formationType}', [
            FormationTypeController::class,
            'destroy',
        ])->name('formation-types.destroy');

        Route::get('formation-participants', [
            FormationParticipantController::class,
            'index',
        ])->name('formation-participants.index');
        Route::post('formation-participants', [
            FormationParticipantController::class,
            'store',
        ])->name('formation-participants.store');
        Route::get('formation-participants/create', [
            FormationParticipantController::class,
            'create',
        ])->name('formation-participants.create');
        Route::get('formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'show',
        ])->name('formation-participants.show');
        Route::get('formation-participants/{formationParticipant}/edit', [
            FormationParticipantController::class,
            'edit',
        ])->name('formation-participants.edit');
        Route::put('formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'update',
        ])->name('formation-participants.update');
        Route::delete('formation-participants/{formationParticipant}', [
            FormationParticipantController::class,
            'destroy',
        ])->name('formation-participants.destroy');

        Route::get('teachers', [TeacherController::class, 'index'])->name(
            'teachers.index'
        );
        Route::post('teachers', [TeacherController::class, 'store'])->name(
            'teachers.store'
        );
        Route::get('teachers/create', [
            TeacherController::class,
            'create',
        ])->name('teachers.create');
        Route::get('teachers/{teacher}', [
            TeacherController::class,
            'show',
        ])->name('teachers.show');
        Route::get('teachers/{teacher}/edit', [
            TeacherController::class,
            'edit',
        ])->name('teachers.edit');
        Route::put('teachers/{teacher}', [
            TeacherController::class,
            'update',
        ])->name('teachers.update');
        Route::delete('teachers/{teacher}', [
            TeacherController::class,
            'destroy',
        ])->name('teachers.destroy');

        Route::get('teacher-salaries', [
            TeacherSalaryController::class,
            'index',
        ])->name('teacher-salaries.index');
        Route::post('teacher-salaries', [
            TeacherSalaryController::class,
            'store',
        ])->name('teacher-salaries.store');
        Route::get('teacher-salaries/create', [
            TeacherSalaryController::class,
            'create',
        ])->name('teacher-salaries.create');
        Route::get('teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'show',
        ])->name('teacher-salaries.show');
        Route::get('teacher-salaries/{teacherSalary}/edit', [
            TeacherSalaryController::class,
            'edit',
        ])->name('teacher-salaries.edit');
        Route::put('teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'update',
        ])->name('teacher-salaries.update');
        Route::delete('teacher-salaries/{teacherSalary}', [
            TeacherSalaryController::class,
            'destroy',
        ])->name('teacher-salaries.destroy');

        Route::get('teacher-payments', [
            TeacherPaymentController::class,
            'index',
        ])->name('teacher-payments.index');
        Route::post('teacher-payments', [
            TeacherPaymentController::class,
            'store',
        ])->name('teacher-payments.store');
        Route::get('teacher-payments/create', [
            TeacherPaymentController::class,
            'create',
        ])->name('teacher-payments.create');
        Route::get('teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'show',
        ])->name('teacher-payments.show');
        Route::get('teacher-payments/{teacherPayment}/edit', [
            TeacherPaymentController::class,
            'edit',
        ])->name('teacher-payments.edit');
        Route::put('teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'update',
        ])->name('teacher-payments.update');
        Route::delete('teacher-payments/{teacherPayment}', [
            TeacherPaymentController::class,
            'destroy',
        ])->name('teacher-payments.destroy');

        Route::get('transactions', [
            TransactionController::class,
            'index',
        ])->name('transactions.index');
        Route::post('transactions', [
            TransactionController::class,
            'store',
        ])->name('transactions.store');
        Route::get('transactions/create', [
            TransactionController::class,
            'create',
        ])->name('transactions.create');
        Route::get('transactions/{transaction}', [
            TransactionController::class,
            'show',
        ])->name('transactions.show');
        Route::get('transactions/{transaction}/edit', [
            TransactionController::class,
            'edit',
        ])->name('transactions.edit');
        Route::put('transactions/{transaction}', [
            TransactionController::class,
            'update',
        ])->name('transactions.update');
        Route::delete('transactions/{transaction}', [
            TransactionController::class,
            'destroy',
        ])->name('transactions.destroy');

        Route::get('students', [StudentController::class, 'index'])->name(
            'students.index'
        );
        Route::post('students', [StudentController::class, 'store'])->name(
            'students.store'
        );
        Route::get('students/create', [
            StudentController::class,
            'create',
        ])->name('students.create');
        Route::get('students/{student}', [
            StudentController::class,
            'show',
        ])->name('students.show');
        Route::get('students/{student}/edit', [
            StudentController::class,
            'edit',
        ])->name('students.edit');
        Route::put('students/{student}', [
            StudentController::class,
            'update',
        ])->name('students.update');
        Route::delete('students/{student}', [
            StudentController::class,
            'destroy',
        ])->name('students.destroy');

        Route::get('competitions', [
            CompetitionController::class,
            'index',
        ])->name('competitions.index');
        Route::post('competitions', [
            CompetitionController::class,
            'store',
        ])->name('competitions.store');
        Route::get('competitions/create', [
            CompetitionController::class,
            'create',
        ])->name('competitions.create');
        Route::get('competitions/{competition}', [
            CompetitionController::class,
            'show',
        ])->name('competitions.show');
        Route::get('competitions/{competition}/edit', [
            CompetitionController::class,
            'edit',
        ])->name('competitions.edit');
        Route::put('competitions/{competition}', [
            CompetitionController::class,
            'update',
        ])->name('competitions.update');
        Route::delete('competitions/{competition}', [
            CompetitionController::class,
            'destroy',
        ])->name('competitions.destroy');

        Route::get('competition-questions', [
            CompetitionQuestionController::class,
            'index',
        ])->name('competition-questions.index');
        Route::post('competition-questions', [
            CompetitionQuestionController::class,
            'store',
        ])->name('competition-questions.store');
        Route::get('competition-questions/create', [
            CompetitionQuestionController::class,
            'create',
        ])->name('competition-questions.create');
        Route::get('competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'show',
        ])->name('competition-questions.show');
        Route::get('competition-questions/{competitionQuestion}/edit', [
            CompetitionQuestionController::class,
            'edit',
        ])->name('competition-questions.edit');
        Route::put('competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'update',
        ])->name('competition-questions.update');
        Route::delete('competition-questions/{competitionQuestion}', [
            CompetitionQuestionController::class,
            'destroy',
        ])->name('competition-questions.destroy');

        Route::get('competition-answers', [
            CompetitionAnswerController::class,
            'index',
        ])->name('competition-answers.index');
        Route::post('competition-answers', [
            CompetitionAnswerController::class,
            'store',
        ])->name('competition-answers.store');
        Route::get('competition-answers/create', [
            CompetitionAnswerController::class,
            'create',
        ])->name('competition-answers.create');
        Route::get('competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'show',
        ])->name('competition-answers.show');
        Route::get('competition-answers/{competitionAnswer}/edit', [
            CompetitionAnswerController::class,
            'edit',
        ])->name('competition-answers.edit');
        Route::put('competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'update',
        ])->name('competition-answers.update');
        Route::delete('competition-answers/{competitionAnswer}', [
            CompetitionAnswerController::class,
            'destroy',
        ])->name('competition-answers.destroy');

        Route::get('parentes', [ParenteController::class, 'index'])->name(
            'parentes.index'
        );
        Route::post('parentes', [ParenteController::class, 'store'])->name(
            'parentes.store'
        );
        Route::get('parentes/create', [
            ParenteController::class,
            'create',
        ])->name('parentes.create');
        Route::get('parentes/{parente}', [
            ParenteController::class,
            'show',
        ])->name('parentes.show');
        Route::get('parentes/{parente}/edit', [
            ParenteController::class,
            'edit',
        ])->name('parentes.edit');
        Route::put('parentes/{parente}', [
            ParenteController::class,
            'update',
        ])->name('parentes.update');
        Route::delete('parentes/{parente}', [
            ParenteController::class,
            'destroy',
        ])->name('parentes.destroy');

        Route::get('parent-students', [
            ParentStudentController::class,
            'index',
        ])->name('parent-students.index');
        Route::post('parent-students', [
            ParentStudentController::class,
            'store',
        ])->name('parent-students.store');
        Route::get('parent-students/create', [
            ParentStudentController::class,
            'create',
        ])->name('parent-students.create');
        Route::get('parent-students/{parentStudent}', [
            ParentStudentController::class,
            'show',
        ])->name('parent-students.show');
        Route::get('parent-students/{parentStudent}/edit', [
            ParentStudentController::class,
            'edit',
        ])->name('parent-students.edit');
        Route::put('parent-students/{parentStudent}', [
            ParentStudentController::class,
            'update',
        ])->name('parent-students.update');
        Route::delete('parent-students/{parentStudent}', [
            ParentStudentController::class,
            'destroy',
        ])->name('parent-students.destroy');

        Route::get('subjects', [SubjectController::class, 'index'])->name(
            'subjects.index'
        );
        Route::post('subjects', [SubjectController::class, 'store'])->name(
            'subjects.store'
        );
        Route::get('subjects/create', [
            SubjectController::class,
            'create',
        ])->name('subjects.create');
        Route::get('subjects/{subject}', [
            SubjectController::class,
            'show',
        ])->name('subjects.show');
        Route::get('subjects/{subject}/edit', [
            SubjectController::class,
            'edit',
        ])->name('subjects.edit');
        Route::put('subjects/{subject}', [
            SubjectController::class,
            'update',
        ])->name('subjects.update');
        Route::delete('subjects/{subject}', [
            SubjectController::class,
            'destroy',
        ])->name('subjects.destroy');

        Route::get('lives', [LiveController::class, 'index'])->name(
            'lives.index'
        );
        Route::post('lives', [LiveController::class, 'store'])->name(
            'lives.store'
        );
        Route::get('lives/create', [LiveController::class, 'create'])->name(
            'lives.create'
        );
        Route::get('lives/{live}', [LiveController::class, 'show'])->name(
            'lives.show'
        );
        Route::get('lives/{live}/edit', [LiveController::class, 'edit'])->name(
            'lives.edit'
        );
        Route::put('lives/{live}', [LiveController::class, 'update'])->name(
            'lives.update'
        );
        Route::delete('lives/{live}', [LiveController::class, 'destroy'])->name(
            'lives.destroy'
        );

        Route::get('live-participants', [
            LiveParticipantController::class,
            'index',
        ])->name('live-participants.index');
        Route::post('live-participants', [
            LiveParticipantController::class,
            'store',
        ])->name('live-participants.store');
        Route::get('live-participants/create', [
            LiveParticipantController::class,
            'create',
        ])->name('live-participants.create');
        Route::get('live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'show',
        ])->name('live-participants.show');
        Route::get('live-participants/{liveParticipant}/edit', [
            LiveParticipantController::class,
            'edit',
        ])->name('live-participants.edit');
        Route::put('live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'update',
        ])->name('live-participants.update');
        Route::delete('live-participants/{liveParticipant}', [
            LiveParticipantController::class,
            'destroy',
        ])->name('live-participants.destroy');

        Route::get('plans', [PlanController::class, 'index'])->name(
            'plans.index'
        );
        Route::post('plans', [PlanController::class, 'store'])->name(
            'plans.store'
        );
        Route::get('plans/create', [PlanController::class, 'create'])->name(
            'plans.create'
        );
        Route::get('plans/{plan}', [PlanController::class, 'show'])->name(
            'plans.show'
        );
        Route::get('plans/{plan}/edit', [PlanController::class, 'edit'])->name(
            'plans.edit'
        );
        Route::put('plans/{plan}', [PlanController::class, 'update'])->name(
            'plans.update'
        );
        Route::delete('plans/{plan}', [PlanController::class, 'destroy'])->name(
            'plans.destroy'
        );

        Route::get('subscriptions', [
            SubscriptionController::class,
            'index',
        ])->name('subscriptions.index');
        Route::post('subscriptions', [
            SubscriptionController::class,
            'store',
        ])->name('subscriptions.store');
        Route::get('subscriptions/create', [
            SubscriptionController::class,
            'create',
        ])->name('subscriptions.create');
        Route::get('subscriptions/{subscription}', [
            SubscriptionController::class,
            'show',
        ])->name('subscriptions.show');
        Route::get('subscriptions/{subscription}/edit', [
            SubscriptionController::class,
            'edit',
        ])->name('subscriptions.edit');
        Route::put('subscriptions/{subscription}', [
            SubscriptionController::class,
            'update',
        ])->name('subscriptions.update');
        Route::delete('subscriptions/{subscription}', [
            SubscriptionController::class,
            'destroy',
        ])->name('subscriptions.destroy');

        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('wallets', [WalletController::class, 'index'])->name(
            'wallets.index'
        );
        Route::post('wallets', [WalletController::class, 'store'])->name(
            'wallets.store'
        );
        Route::get('wallets/create', [WalletController::class, 'create'])->name(
            'wallets.create'
        );
        Route::get('wallets/{wallet}', [WalletController::class, 'show'])->name(
            'wallets.show'
        );
        Route::get('wallets/{wallet}/edit', [
            WalletController::class,
            'edit',
        ])->name('wallets.edit');
        Route::put('wallets/{wallet}', [
            WalletController::class,
            'update',
        ])->name('wallets.update');
        Route::delete('wallets/{wallet}', [
            WalletController::class,
            'destroy',
        ])->name('wallets.destroy');

        Route::get('articles', [ArticleController::class, 'index'])->name(
            'articles.index'
        );
        Route::post('articles', [ArticleController::class, 'store'])->name(
            'articles.store'
        );
        Route::get('articles/create', [
            ArticleController::class,
            'create',
        ])->name('articles.create');
        Route::get('articles/{article}', [
            ArticleController::class,
            'show',
        ])->name('articles.show');
        Route::get('articles/{article}/edit', [
            ArticleController::class,
            'edit',
        ])->name('articles.edit');
        Route::put('articles/{article}', [
            ArticleController::class,
            'update',
        ])->name('articles.update');
        Route::delete('articles/{article}', [
            ArticleController::class,
            'destroy',
        ])->name('articles.destroy');

        Route::get('config-keys', [ConfigKeyController::class, 'index'])->name(
            'config-keys.index'
        );
        Route::post('config-keys', [ConfigKeyController::class, 'store'])->name(
            'config-keys.store'
        );
        Route::get('config-keys/create', [
            ConfigKeyController::class,
            'create',
        ])->name('config-keys.create');
        Route::get('config-keys/{configKey}', [
            ConfigKeyController::class,
            'show',
        ])->name('config-keys.show');
        Route::get('config-keys/{configKey}/edit', [
            ConfigKeyController::class,
            'edit',
        ])->name('config-keys.edit');
        Route::put('config-keys/{configKey}', [
            ConfigKeyController::class,
            'update',
        ])->name('config-keys.update');
        Route::delete('config-keys/{configKey}', [
            ConfigKeyController::class,
            'destroy',
        ])->name('config-keys.destroy');

        Route::get('config-sites', [
            ConfigSiteController::class,
            'index',
        ])->name('config-sites.index');
        Route::post('config-sites', [
            ConfigSiteController::class,
            'store',
        ])->name('config-sites.store');
        Route::get('config-sites/create', [
            ConfigSiteController::class,
            'create',
        ])->name('config-sites.create');
        Route::get('config-sites/{configSite}', [
            ConfigSiteController::class,
            'show',
        ])->name('config-sites.show');
        Route::get('config-sites/{configSite}/edit', [
            ConfigSiteController::class,
            'edit',
        ])->name('config-sites.edit');
        Route::put('config-sites/{configSite}', [
            ConfigSiteController::class,
            'update',
        ])->name('config-sites.update');
        Route::delete('config-sites/{configSite}', [
            ConfigSiteController::class,
            'destroy',
        ])->name('config-sites.destroy');

        Route::get('contacts', [ContactController::class, 'index'])->name(
            'contacts.index'
        );
        Route::post('contacts', [ContactController::class, 'store'])->name(
            'contacts.store'
        );
        Route::get('contacts/create', [
            ContactController::class,
            'create',
        ])->name('contacts.create');
        Route::get('contacts/{contact}', [
            ContactController::class,
            'show',
        ])->name('contacts.show');
        Route::get('contacts/{contact}/edit', [
            ContactController::class,
            'edit',
        ])->name('contacts.edit');
        Route::put('contacts/{contact}', [
            ContactController::class,
            'update',
        ])->name('contacts.update');
        Route::delete('contacts/{contact}', [
            ContactController::class,
            'destroy',
        ])->name('contacts.destroy');

        Route::get('menus', [MenuController::class, 'index'])->name(
            'menus.index'
        );
        Route::post('menus', [MenuController::class, 'store'])->name(
            'menus.store'
        );
        Route::get('menus/create', [MenuController::class, 'create'])->name(
            'menus.create'
        );
        Route::get('menus/{menu}', [MenuController::class, 'show'])->name(
            'menus.show'
        );
        Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name(
            'menus.edit'
        );
        Route::put('menus/{menu}', [MenuController::class, 'update'])->name(
            'menus.update'
        );
        Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name(
            'menus.destroy'
        );

        Route::get('pages', [PageController::class, 'index'])->name(
            'pages.index'
        );
        Route::post('pages', [PageController::class, 'store'])->name(
            'pages.store'
        );
        Route::get('pages/create', [PageController::class, 'create'])->name(
            'pages.create'
        );
        Route::get('pages/{page}', [PageController::class, 'show'])->name(
            'pages.show'
        );
        Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name(
            'pages.edit'
        );
        Route::put('pages/{page}', [PageController::class, 'update'])->name(
            'pages.update'
        );
        Route::delete('pages/{page}', [PageController::class, 'destroy'])->name(
            'pages.destroy'
        );

        Route::get('partners', [PartnerController::class, 'index'])->name(
            'partners.index'
        );
        Route::post('partners', [PartnerController::class, 'store'])->name(
            'partners.store'
        );
        Route::get('partners/create', [
            PartnerController::class,
            'create',
        ])->name('partners.create');
        Route::get('partners/{partner}', [
            PartnerController::class,
            'show',
        ])->name('partners.show');
        Route::get('partners/{partner}/edit', [
            PartnerController::class,
            'edit',
        ])->name('partners.edit');
        Route::put('partners/{partner}', [
            PartnerController::class,
            'update',
        ])->name('partners.update');
        Route::delete('partners/{partner}', [
            PartnerController::class,
            'destroy',
        ])->name('partners.destroy');

        Route::get('testimonials', [
            TestimonialController::class,
            'index',
        ])->name('testimonials.index');
        Route::post('testimonials', [
            TestimonialController::class,
            'store',
        ])->name('testimonials.store');
        Route::get('testimonials/create', [
            TestimonialController::class,
            'create',
        ])->name('testimonials.create');
        Route::get('testimonials/{testimonial}', [
            TestimonialController::class,
            'show',
        ])->name('testimonials.show');
        Route::get('testimonials/{testimonial}/edit', [
            TestimonialController::class,
            'edit',
        ])->name('testimonials.edit');
        Route::put('testimonials/{testimonial}', [
            TestimonialController::class,
            'update',
        ])->name('testimonials.update');
        Route::delete('testimonials/{testimonial}', [
            TestimonialController::class,
            'destroy',
        ])->name('testimonials.destroy');
    });
