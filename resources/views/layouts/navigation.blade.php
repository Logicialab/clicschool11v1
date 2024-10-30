<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <x-nav-dropdown title="Apps" align="right" width="48">
                        @can('view-any', App\Models\Level::class)
                        <x-dropdown-link href="{{ route('levels.index') }}">
                        Levels
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Classe::class)
                        <x-dropdown-link href="{{ route('classes.index') }}">
                        Classes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Course::class)
                        <x-dropdown-link href="{{ route('courses.index') }}">
                        Courses
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Exercice::class)
                        <x-dropdown-link href="{{ route('exercices.index') }}">
                        Exercices
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ExerciseSolution::class)
                        <x-dropdown-link href="{{ route('exercise-solutions.index') }}">
                        Exercise Solutions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\File::class)
                        <x-dropdown-link href="{{ route('files.index') }}">
                        Files
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Video::class)
                        <x-dropdown-link href="{{ route('videos.index') }}">
                        Videos
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Quiz::class)
                        <x-dropdown-link href="{{ route('quizzes.index') }}">
                        Quizzes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\QuestionQuiz::class)
                        <x-dropdown-link href="{{ route('question-quizs.index') }}">
                        Question Quizs
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\AnswerQuiz::class)
                        <x-dropdown-link href="{{ route('answer-quizs.index') }}">
                        Answer Quizs
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\StudentAnswerQuiz::class)
                        <x-dropdown-link href="{{ route('student-answer-quizs.index') }}">
                        Student Answer Quizs
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Formation::class)
                        <x-dropdown-link href="{{ route('formations.index') }}">
                        Formations
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\FormationDetail::class)
                        <x-dropdown-link href="{{ route('formation-details.index') }}">
                        Formation Details
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\FormationType::class)
                        <x-dropdown-link href="{{ route('formation-types.index') }}">
                        Formation Types
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\FormationParticipant::class)
                        <x-dropdown-link href="{{ route('formation-participants.index') }}">
                        Formation Participants
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Teacher::class)
                        <x-dropdown-link href="{{ route('teachers.index') }}">
                        Teachers
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\TeacherSalary::class)
                        <x-dropdown-link href="{{ route('teacher-salaries.index') }}">
                        Teacher Salaries
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\TeacherPayment::class)
                        <x-dropdown-link href="{{ route('teacher-payments.index') }}">
                        Teacher Payments
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Transaction::class)
                        <x-dropdown-link href="{{ route('transactions.index') }}">
                        Transactions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Student::class)
                        <x-dropdown-link href="{{ route('students.index') }}">
                        Students
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Competition::class)
                        <x-dropdown-link href="{{ route('competitions.index') }}">
                        Competitions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\CompetitionQuestion::class)
                        <x-dropdown-link href="{{ route('competition-questions.index') }}">
                        Competition Questions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\CompetitionAnswer::class)
                        <x-dropdown-link href="{{ route('competition-answers.index') }}">
                        Competition Answers
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Parente::class)
                        <x-dropdown-link href="{{ route('parentes.index') }}">
                        Parentes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ParentStudent::class)
                        <x-dropdown-link href="{{ route('parent-students.index') }}">
                        Parent Students
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Subject::class)
                        <x-dropdown-link href="{{ route('subjects.index') }}">
                        Subjects
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Live::class)
                        <x-dropdown-link href="{{ route('lives.index') }}">
                        Lives
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\LiveParticipant::class)
                        <x-dropdown-link href="{{ route('live-participants.index') }}">
                        Live Participants
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Plan::class)
                        <x-dropdown-link href="{{ route('plans.index') }}">
                        Plans
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Subscription::class)
                        <x-dropdown-link href="{{ route('subscriptions.index') }}">
                        Subscriptions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\User::class)
                        <x-dropdown-link href="{{ route('users.index') }}">
                        Users
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Wallet::class)
                        <x-dropdown-link href="{{ route('wallets.index') }}">
                        Wallets
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Article::class)
                        <x-dropdown-link href="{{ route('articles.index') }}">
                        Articles
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ConfigKey::class)
                        <x-dropdown-link href="{{ route('config-keys.index') }}">
                        Config Keys
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ConfigSite::class)
                        <x-dropdown-link href="{{ route('config-sites.index') }}">
                        Config Sites
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Contact::class)
                        <x-dropdown-link href="{{ route('contacts.index') }}">
                        Contacts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Menu::class)
                        <x-dropdown-link href="{{ route('menus.index') }}">
                        Menus
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Page::class)
                        <x-dropdown-link href="{{ route('pages.index') }}">
                        Pages
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Partner::class)
                        <x-dropdown-link href="{{ route('partners.index') }}">
                        Partners
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Testimonial::class)
                        <x-dropdown-link href="{{ route('testimonials.index') }}">
                        Testimonials
                        </x-dropdown-link>
                        @endcan
                </x-nav-dropdown>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <x-nav-dropdown title="Access Management" align="right" width="48">
                    
                    @can('view-any', Spatie\Permission\Models\Role::class)
                    <x-dropdown-link href="{{ route('roles.index') }}">Roles</x-dropdown-link>
                    @endcan
                
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                    <x-dropdown-link href="{{ route('permissions.index') }}">Permissions</x-dropdown-link>
                    @endcan
                    
                </x-nav-dropdown>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

                @can('view-any', App\Models\Level::class)
                <x-responsive-nav-link href="{{ route('levels.index') }}">
                Levels
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Classe::class)
                <x-responsive-nav-link href="{{ route('classes.index') }}">
                Classes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Course::class)
                <x-responsive-nav-link href="{{ route('courses.index') }}">
                Courses
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Exercice::class)
                <x-responsive-nav-link href="{{ route('exercices.index') }}">
                Exercices
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ExerciseSolution::class)
                <x-responsive-nav-link href="{{ route('exercise-solutions.index') }}">
                Exercise Solutions
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\File::class)
                <x-responsive-nav-link href="{{ route('files.index') }}">
                Files
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Video::class)
                <x-responsive-nav-link href="{{ route('videos.index') }}">
                Videos
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Quiz::class)
                <x-responsive-nav-link href="{{ route('quizzes.index') }}">
                Quizzes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\QuestionQuiz::class)
                <x-responsive-nav-link href="{{ route('question-quizs.index') }}">
                Question Quizs
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\AnswerQuiz::class)
                <x-responsive-nav-link href="{{ route('answer-quizs.index') }}">
                Answer Quizs
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\StudentAnswerQuiz::class)
                <x-responsive-nav-link href="{{ route('student-answer-quizs.index') }}">
                Student Answer Quizs
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Formation::class)
                <x-responsive-nav-link href="{{ route('formations.index') }}">
                Formations
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\FormationDetail::class)
                <x-responsive-nav-link href="{{ route('formation-details.index') }}">
                Formation Details
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\FormationType::class)
                <x-responsive-nav-link href="{{ route('formation-types.index') }}">
                Formation Types
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\FormationParticipant::class)
                <x-responsive-nav-link href="{{ route('formation-participants.index') }}">
                Formation Participants
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Teacher::class)
                <x-responsive-nav-link href="{{ route('teachers.index') }}">
                Teachers
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\TeacherSalary::class)
                <x-responsive-nav-link href="{{ route('teacher-salaries.index') }}">
                Teacher Salaries
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\TeacherPayment::class)
                <x-responsive-nav-link href="{{ route('teacher-payments.index') }}">
                Teacher Payments
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Transaction::class)
                <x-responsive-nav-link href="{{ route('transactions.index') }}">
                Transactions
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Student::class)
                <x-responsive-nav-link href="{{ route('students.index') }}">
                Students
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Competition::class)
                <x-responsive-nav-link href="{{ route('competitions.index') }}">
                Competitions
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\CompetitionQuestion::class)
                <x-responsive-nav-link href="{{ route('competition-questions.index') }}">
                Competition Questions
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\CompetitionAnswer::class)
                <x-responsive-nav-link href="{{ route('competition-answers.index') }}">
                Competition Answers
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Parente::class)
                <x-responsive-nav-link href="{{ route('parentes.index') }}">
                Parentes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ParentStudent::class)
                <x-responsive-nav-link href="{{ route('parent-students.index') }}">
                Parent Students
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Subject::class)
                <x-responsive-nav-link href="{{ route('subjects.index') }}">
                Subjects
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Live::class)
                <x-responsive-nav-link href="{{ route('lives.index') }}">
                Lives
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\LiveParticipant::class)
                <x-responsive-nav-link href="{{ route('live-participants.index') }}">
                Live Participants
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Plan::class)
                <x-responsive-nav-link href="{{ route('plans.index') }}">
                Plans
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Subscription::class)
                <x-responsive-nav-link href="{{ route('subscriptions.index') }}">
                Subscriptions
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\User::class)
                <x-responsive-nav-link href="{{ route('users.index') }}">
                Users
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Wallet::class)
                <x-responsive-nav-link href="{{ route('wallets.index') }}">
                Wallets
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Article::class)
                <x-responsive-nav-link href="{{ route('articles.index') }}">
                Articles
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ConfigKey::class)
                <x-responsive-nav-link href="{{ route('config-keys.index') }}">
                Config Keys
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ConfigSite::class)
                <x-responsive-nav-link href="{{ route('config-sites.index') }}">
                Config Sites
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Contact::class)
                <x-responsive-nav-link href="{{ route('contacts.index') }}">
                Contacts
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Menu::class)
                <x-responsive-nav-link href="{{ route('menus.index') }}">
                Menus
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Page::class)
                <x-responsive-nav-link href="{{ route('pages.index') }}">
                Pages
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Partner::class)
                <x-responsive-nav-link href="{{ route('partners.index') }}">
                Partners
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Testimonial::class)
                <x-responsive-nav-link href="{{ route('testimonials.index') }}">
                Testimonials
                </x-responsive-nav-link>
                @endcan

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    
                    @can('view-any', Spatie\Permission\Models\Role::class)
                    <x-responsive-nav-link href="{{ route('roles.index') }}">Roles</x-responsive-nav-link>
                    @endcan
                
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                    <x-responsive-nav-link href="{{ route('permissions.index') }}">Permissions</x-responsive-nav-link>
                    @endcan
                    
                @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>