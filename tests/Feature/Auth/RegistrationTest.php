<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }



    /*
 * @return array[]
*/


    public static function userDataProvider(): array
    {
        $users = [];
        for ($i = 1; $i <= 100; $i++) {
            $users[] = [
                'name' => 'TEST_USER_' . $i,
                'email' => 'test_' . $i . '@example.com',
                'password' => 'Password123!',
            ];
        }
        return $users;
    }



    /**
     * @dataProvider userDataProvider
     */



    public function test_new_users_can_register($name, $email, $password)
    {
        $response = $this->post('/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(route('dashboard'));
    }
}
