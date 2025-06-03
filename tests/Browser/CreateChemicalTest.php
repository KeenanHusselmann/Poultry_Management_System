<?php



namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


//Purpose of the test: to verify that an admin user can access the chemical creation page successfully.;

//It ensures the route admin.create-chemicals.index is accessible by a logged-in admin.

//Basic smoke test to confirm no authentication or routing issues prevent reaching that page.
class CreateChemicalTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = User::find(1);// Find the user with ID 1 (usually the admin)

         // Start the browser test
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);//simulate the admin user logging in without going through the login form manually.

             // Visit the route named 'admin.create-chemicals.index'
            $browser->visit(route('admin.create-chemicals.index'));

             // Assert that the current route is indeed 'admin.create-chemicals.index'
            $browser->assertRouteIs('admin.create-chemicals.index');
        });
    }
}

