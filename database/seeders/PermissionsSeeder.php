<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list articles']);
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'delete articles']);

        Permission::create(['name' => 'list classes']);
        Permission::create(['name' => 'view classes']);
        Permission::create(['name' => 'create classes']);
        Permission::create(['name' => 'update classes']);
        Permission::create(['name' => 'delete classes']);

        Permission::create(['name' => 'list competitions']);
        Permission::create(['name' => 'view competitions']);
        Permission::create(['name' => 'create competitions']);
        Permission::create(['name' => 'update competitions']);
        Permission::create(['name' => 'delete competitions']);

        Permission::create(['name' => 'list competitionanswers']);
        Permission::create(['name' => 'view competitionanswers']);
        Permission::create(['name' => 'create competitionanswers']);
        Permission::create(['name' => 'update competitionanswers']);
        Permission::create(['name' => 'delete competitionanswers']);

        Permission::create(['name' => 'list competitionquestions']);
        Permission::create(['name' => 'view competitionquestions']);
        Permission::create(['name' => 'create competitionquestions']);
        Permission::create(['name' => 'update competitionquestions']);
        Permission::create(['name' => 'delete competitionquestions']);

        Permission::create(['name' => 'list configsites']);
        Permission::create(['name' => 'view configsites']);
        Permission::create(['name' => 'create configsites']);
        Permission::create(['name' => 'update configsites']);
        Permission::create(['name' => 'delete configsites']);

        Permission::create(['name' => 'list contacts']);
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'update contacts']);
        Permission::create(['name' => 'delete contacts']);

        Permission::create(['name' => 'list courses']);
        Permission::create(['name' => 'view courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'update courses']);
        Permission::create(['name' => 'delete courses']);

        Permission::create(['name' => 'list exercices']);
        Permission::create(['name' => 'view exercices']);
        Permission::create(['name' => 'create exercices']);
        Permission::create(['name' => 'update exercices']);
        Permission::create(['name' => 'delete exercices']);

        Permission::create(['name' => 'list exerciceqcms']);
        Permission::create(['name' => 'view exerciceqcms']);
        Permission::create(['name' => 'create exerciceqcms']);
        Permission::create(['name' => 'update exerciceqcms']);
        Permission::create(['name' => 'delete exerciceqcms']);

        Permission::create(['name' => 'list exercicestudents']);
        Permission::create(['name' => 'view exercicestudents']);
        Permission::create(['name' => 'create exercicestudents']);
        Permission::create(['name' => 'update exercicestudents']);
        Permission::create(['name' => 'delete exercicestudents']);

        Permission::create(['name' => 'list files']);
        Permission::create(['name' => 'view files']);
        Permission::create(['name' => 'create files']);
        Permission::create(['name' => 'update files']);
        Permission::create(['name' => 'delete files']);

        Permission::create(['name' => 'list formations']);
        Permission::create(['name' => 'view formations']);
        Permission::create(['name' => 'create formations']);
        Permission::create(['name' => 'update formations']);
        Permission::create(['name' => 'delete formations']);

        Permission::create(['name' => 'list formationdetails']);
        Permission::create(['name' => 'view formationdetails']);
        Permission::create(['name' => 'create formationdetails']);
        Permission::create(['name' => 'update formationdetails']);
        Permission::create(['name' => 'delete formationdetails']);

        Permission::create(['name' => 'list formationparticipants']);
        Permission::create(['name' => 'view formationparticipants']);
        Permission::create(['name' => 'create formationparticipants']);
        Permission::create(['name' => 'update formationparticipants']);
        Permission::create(['name' => 'delete formationparticipants']);

        Permission::create(['name' => 'list formationtypes']);
        Permission::create(['name' => 'view formationtypes']);
        Permission::create(['name' => 'create formationtypes']);
        Permission::create(['name' => 'update formationtypes']);
        Permission::create(['name' => 'delete formationtypes']);

        Permission::create(['name' => 'list levels']);
        Permission::create(['name' => 'view levels']);
        Permission::create(['name' => 'create levels']);
        Permission::create(['name' => 'update levels']);
        Permission::create(['name' => 'delete levels']);

        Permission::create(['name' => 'list livecourses']);
        Permission::create(['name' => 'view livecourses']);
        Permission::create(['name' => 'create livecourses']);
        Permission::create(['name' => 'update livecourses']);
        Permission::create(['name' => 'delete livecourses']);

        Permission::create(['name' => 'list liveformations']);
        Permission::create(['name' => 'view liveformations']);
        Permission::create(['name' => 'create liveformations']);
        Permission::create(['name' => 'update liveformations']);
        Permission::create(['name' => 'delete liveformations']);

        Permission::create(['name' => 'list liveformationparticipants']);
        Permission::create(['name' => 'view liveformationparticipants']);
        Permission::create(['name' => 'create liveformationparticipants']);
        Permission::create(['name' => 'update liveformationparticipants']);
        Permission::create(['name' => 'delete liveformationparticipants']);

        Permission::create(['name' => 'list liveparticipants']);
        Permission::create(['name' => 'view liveparticipants']);
        Permission::create(['name' => 'create liveparticipants']);
        Permission::create(['name' => 'update liveparticipants']);
        Permission::create(['name' => 'delete liveparticipants']);

        Permission::create(['name' => 'list menus']);
        Permission::create(['name' => 'view menus']);
        Permission::create(['name' => 'create menus']);
        Permission::create(['name' => 'update menus']);
        Permission::create(['name' => 'delete menus']);

        Permission::create(['name' => 'list pages']);
        Permission::create(['name' => 'view pages']);
        Permission::create(['name' => 'create pages']);
        Permission::create(['name' => 'update pages']);
        Permission::create(['name' => 'delete pages']);

        Permission::create(['name' => 'list parentes']);
        Permission::create(['name' => 'view parentes']);
        Permission::create(['name' => 'create parentes']);
        Permission::create(['name' => 'update parentes']);
        Permission::create(['name' => 'delete parentes']);

        Permission::create(['name' => 'list parentstudents']);
        Permission::create(['name' => 'view parentstudents']);
        Permission::create(['name' => 'create parentstudents']);
        Permission::create(['name' => 'update parentstudents']);
        Permission::create(['name' => 'delete parentstudents']);

        Permission::create(['name' => 'list partners']);
        Permission::create(['name' => 'view partners']);
        Permission::create(['name' => 'create partners']);
        Permission::create(['name' => 'update partners']);
        Permission::create(['name' => 'delete partners']);

        Permission::create(['name' => 'list plans']);
        Permission::create(['name' => 'view plans']);
        Permission::create(['name' => 'create plans']);
        Permission::create(['name' => 'update plans']);
        Permission::create(['name' => 'delete plans']);

        Permission::create(['name' => 'list questionexerciceqcms']);
        Permission::create(['name' => 'view questionexerciceqcms']);
        Permission::create(['name' => 'create questionexerciceqcms']);
        Permission::create(['name' => 'update questionexerciceqcms']);
        Permission::create(['name' => 'delete questionexerciceqcms']);

        Permission::create(['name' => 'list questionquizqcms']);
        Permission::create(['name' => 'view questionquizqcms']);
        Permission::create(['name' => 'create questionquizqcms']);
        Permission::create(['name' => 'update questionquizqcms']);
        Permission::create(['name' => 'delete questionquizqcms']);

        Permission::create(['name' => 'list quizqcms']);
        Permission::create(['name' => 'view quizqcms']);
        Permission::create(['name' => 'create quizqcms']);
        Permission::create(['name' => 'update quizqcms']);
        Permission::create(['name' => 'delete quizqcms']);

        Permission::create(['name' => 'list students']);
        Permission::create(['name' => 'view students']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'update students']);
        Permission::create(['name' => 'delete students']);

        Permission::create([
            'name' => 'list studentanswerquestionexerciceqcms',
        ]);
        Permission::create([
            'name' => 'view studentanswerquestionexerciceqcms',
        ]);
        Permission::create([
            'name' => 'create studentanswerquestionexerciceqcms',
        ]);
        Permission::create([
            'name' => 'update studentanswerquestionexerciceqcms',
        ]);
        Permission::create([
            'name' => 'delete studentanswerquestionexerciceqcms',
        ]);

        Permission::create(['name' => 'list studentanswerquizqcms']);
        Permission::create(['name' => 'view studentanswerquizqcms']);
        Permission::create(['name' => 'create studentanswerquizqcms']);
        Permission::create(['name' => 'update studentanswerquizqcms']);
        Permission::create(['name' => 'delete studentanswerquizqcms']);

        Permission::create(['name' => 'list subjects']);
        Permission::create(['name' => 'view subjects']);
        Permission::create(['name' => 'create subjects']);
        Permission::create(['name' => 'update subjects']);
        Permission::create(['name' => 'delete subjects']);

        Permission::create(['name' => 'list subscriptions']);
        Permission::create(['name' => 'view subscriptions']);
        Permission::create(['name' => 'create subscriptions']);
        Permission::create(['name' => 'update subscriptions']);
        Permission::create(['name' => 'delete subscriptions']);

        Permission::create(['name' => 'list teachers']);
        Permission::create(['name' => 'view teachers']);
        Permission::create(['name' => 'create teachers']);
        Permission::create(['name' => 'update teachers']);
        Permission::create(['name' => 'delete teachers']);

        Permission::create(['name' => 'list teacherpayments']);
        Permission::create(['name' => 'view teacherpayments']);
        Permission::create(['name' => 'create teacherpayments']);
        Permission::create(['name' => 'update teacherpayments']);
        Permission::create(['name' => 'delete teacherpayments']);

        Permission::create(['name' => 'list teachersalaries']);
        Permission::create(['name' => 'view teachersalaries']);
        Permission::create(['name' => 'create teachersalaries']);
        Permission::create(['name' => 'update teachersalaries']);
        Permission::create(['name' => 'delete teachersalaries']);

        Permission::create(['name' => 'list testimonials']);
        Permission::create(['name' => 'view testimonials']);
        Permission::create(['name' => 'create testimonials']);
        Permission::create(['name' => 'update testimonials']);
        Permission::create(['name' => 'delete testimonials']);

        Permission::create(['name' => 'list transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);

        Permission::create(['name' => 'list unitcourses']);
        Permission::create(['name' => 'view unitcourses']);
        Permission::create(['name' => 'create unitcourses']);
        Permission::create(['name' => 'update unitcourses']);
        Permission::create(['name' => 'delete unitcourses']);

        Permission::create(['name' => 'list videos']);
        Permission::create(['name' => 'view videos']);
        Permission::create(['name' => 'create videos']);
        Permission::create(['name' => 'update videos']);
        Permission::create(['name' => 'delete videos']);

        Permission::create(['name' => 'list wallets']);
        Permission::create(['name' => 'view wallets']);
        Permission::create(['name' => 'create wallets']);
        Permission::create(['name' => 'update wallets']);
        Permission::create(['name' => 'delete wallets']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }

        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);
    }
}
