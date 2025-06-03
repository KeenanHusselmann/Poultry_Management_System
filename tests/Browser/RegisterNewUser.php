<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User; // Ensure this is the correct path to your User model

class RegisterNewUser extends DuskTestCase
{
    // Removed: use DatabaseMigrations;

    /**
     * Test that a new user can successfully register without database refresh.
     *
     * @return void
     */
    public function testNewUserCanRegister()
    {
        // Define a unique email for each run to avoid "email already exists" errors
        // This is crucial when not using DatabaseMigrations
        $uniqueId = uniqid();
        $uniqueEmail = 'dusk.register.' . $uniqueId . '@example.com';
        $userName = 'Dusk Registered User ' . $uniqueId;

        $this->browse(function (Browser $browser) use ($uniqueEmail, $userName) {
            // Ensure no user is logged in before starting the registration process
            $browser->logout()
                    ->visit(route('register')) // Visit the registration page
                    ->assertSee('Register') 
                    ->type('name', $userName) 
                    ->type('email', $uniqueEmail) 
                    ->type('password', 'password') 
                    ->type('password_confirmation', 'password') 
                    ->press('Register') // Click the register button
                    ->assertPathIs('/home') 
                    ->assertSee($userName); 
        });

        // Assert that the new user exists in the database
        $this->assertDatabaseHas('users', [
            'name' => $userName,
            'email' => $uniqueEmail,
        ]);

     
    }
}