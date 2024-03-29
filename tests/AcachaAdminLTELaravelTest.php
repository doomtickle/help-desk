<?php
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Support\Facades\Hash;

// /**
//  * Class AcachaAdminLTELaravelTest.
//  */
// class AcachaAdminLTELaravelTest extends TestCase
// {
//     use DatabaseMigrations;

//     /**
//      * Overwrite createApplication to add Http Kernel
//      * see: https://github.com/laravel/laravel/pull/3943
//      *      https://github.com/laravel/framework/issues/15426
//      */
//     public function createApplication()
//     {
//         $app = require __DIR__.'/../bootstrap/app.php';

//         $app->make(Illuminate\Contracts\Http\Kernel::class);

//         $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

//         return $app;
//     }

//     /**
//      * Set up tests.
//      */
//     public function setUp()
//     {
//         parent::setUp();
//         App::setLocale('en');
//         $user = factory('App\User')->create();
//     }

//     /**
//      * Set up before class.
//      */
//     public static function setUpBeforeClass()
//     {
//         passthru('composer dumpautoload');
//     }

//     /**
//      * Test Landing Page.
//      *
//      * @return void
//      */
//     public function testLandingPage()
//     {
//         $this->visit('/')
//              ->see('Create Task')
//              ->see('Kerigan');
//     }

//     /**
//      * Test Landing Page.
//      *
//      * @return void
//      */
//     public function testLandingPageWithUserLogged()
//     {
//         $user = factory(App\User::class)->create();

//         $this->actingAs($user)
//             ->visit('/')
//             ->see('Create Task')
//             ->see($user->name);
//     }

//     /**
//      * Test Login Page.
//      *
//      * @return void
//      */
//     public function testLoginPage()
//     {
//         $this->visit('/login')
//             ->see('Serious');
//     }

//     /**
//      * Test Login.
//      *
//      * @return void
//      */
//     public function testLogin()
//     {
//         $user = factory(App\User::class)->create(['password' => Hash::make('passw0RD')]);

//         $this->visit('/login')
//             ->type($user->email, 'email')
//             ->type('passw0RD', 'password')
//             ->press('Sign In')
//             ->seePageIs('/home')
//             ->see($user->name);
//     }

//     /**
//      * Test Login.
//      *
//      * @return void
//      */
//     public function testLoginRequiredFields()
//     {
//         $this->visit('/login')
//             ->type('', 'email')
//             ->type('', 'password')
//             ->press('Sign In')
//             ->see('The email field is required')
//             ->see('The password field is required');
//     }

//     /**
//      * Test Register Page.
//      *
//      * @return void
//      */
//     public function testRegisterPage()
//     {
//         $this->visit('/register')
//             ->see('Register a new membership');
//     }

//     /**
//      * Test Password reset Page.
//      *
//      * @return void
//      */
//     public function testPasswordResetPage()
//     {
//         $this->visit('/password/reset')
//             ->see('Reset Password');
//     }

//     /**
//      * Test home page is only for authorized Users.
//      *
//      * @return void
//      */
//     public function testHomePageForUnauthenticatedUsers()
//     {
//         $this->visit('/home')
//             ->seePageIs('/login');
//     }

//     /**
//      * Test home page works with Authenticated Users.
//      *
//      * @return void
//      */
//     public function testHomePageForAuthenticatedUsers()
//     {
//         $user = factory(App\User::class)->create();

//         $this->actingAs($user)
//             ->visit('/home')
//             ->see($user->name);
//     }

//     /**
//      * Test log out.
//      *
//      * @return void
//      */
//     public function testLogout()
//     {
//         $user = factory(App\User::class)->create();

//         $form = $this->actingAs($user)->visit('/home')->getForm('logout');

//         $this->actingAs($user)
//             ->visit('/home')
//             ->makeRequestUsingForm($form)
//             ->seePageIs('/');
//     }

//     /**
//      * Test 404 Error page.
//      *
//      * @return void
//      */
//     public function test404Page()
//     {
//         $this->get('asdasdjlapmnnk')
//             ->seeStatusCode(404)
//             ->see('404');
//     }

//     /**
//      * Test user registration.
//      *
//      * @return void
//      */
//     public function testNewUserRegistration()
//     {
//         $this->visit('/register')
//             ->type('Sergi Tur Badenas', 'name')
//             ->type('sergiturbadenas@gmail.com', 'email')
//             ->check('terms')
//             ->type('passw0RD', 'password')
//             ->type('passw0RD', 'password_confirmation')
//             ->press('Register')
//             ->seePageIs('/home')
//             ->seeInDatabase('users', ['email' => 'sergiturbadenas@gmail.com',
//                                       'name'  => 'Sergi Tur Badenas', ]);
//     }

//     /**
//      * Test required fields on registration page.
//      *
//      * @return void
//      */
//     public function testRequiredFieldsOnRegistrationPage()
//     {
//         $this->visit('/register')
//             ->press('Register')
//             ->see('The name field is required')
//             ->see('The email field is required')
//             ->see('The password field is required');
//     }

//     /**
//      * Test send password reset.
//      *
//      * @return void
//      */
//     public function testSendPasswordReset()
//     {
//         $user = factory(App\User::class)->create();

//         $this->visit('password/reset')
//             ->type($user->email, 'email')
//             ->press('Send Password Reset Link')
//             ->see('We have e-mailed your password reset link!');
//     }

//     /**
//      * Test send password reset user not exists.
//      *
//      * @return void
//      */
//     public function testSendPasswordResetUserNotExists()
//     {
//         $this->visit('password/reset')
//             ->type('notexistingemail@gmail.com', 'email')
//             ->press('Send Password Reset Link')
//             ->see('There were some problems with your input');
//     }

//     /**
//      * Test make:view command
//      *
//      */
//     public function testMakeViewCommand()
//     {
//         $view = 'ehqwiqweiohqweihoqweiohqweiojhqwejioqwejjqwe';
//         $viewPath= 'views/' . $view . '.blade.php';
//         try {
//             unlink(resource_path($view));
//         } catch (\Exception $e) {
//         }
//         $this->callArtisanMakeView($view);
//         $resultAsText = Artisan::output();
//         $expectedOutput = 'File ' . resource_path($viewPath) . ' created';
//         $this->assertEquals($expectedOutput, trim($resultAsText));
//         $this->assertFileExists(resource_path($viewPath));
//         $this->callArtisanMakeView($view);
//         $resultAsText = Artisan::output();
//         $this->assertEquals('File already exists', trim($resultAsText));
//         unlink(resource_path($viewPath));
//     }

//     /**
//      * Create view using make:view command.
//      *
//      * @param $view
//      */
//     protected function callArtisanMakeView($view)
//     {
//         Artisan::call('make:view', [
//             'name' => $view,
//         ]);
//     }
//     /**
//      * Test adminlte:admin command
//      *
//      */
//     public function testAdminlteAdminCommand()
//     {
//         $seed = database_path('seeds/AdminUserSeeder.php');
//         try {
//             unlink($seed);
//         } catch (\Exception $e) {
//         }
//         $this->callAdminlteAdminCommand();
//         $this->assertFileExists($seed);
//     }


//     /**
//      * Call adminlte:admin command.
//      */
//     protected function callAdminlteAdminCommand()
//     {
//         Artisan::call('adminlte:admin');
//     }

// }

