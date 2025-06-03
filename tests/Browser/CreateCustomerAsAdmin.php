<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;



class CreateCustomerAsAdmin extends DuskTestCase
{
 
    public function testAdminCanCreateCustomer()
    {
        $admin = User::find(1);

        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin)
                ->visit(route('admin.crm-customers.create')) 
                ->assertSee('Create Customer')
                ->type('first_name', 'Dusk')
                ->type('last_name', 'TestCustomer')
                ->assertVisible('select[name="status_id"]') 
                ->select('status_id', '1')
                ->type('email', 'dusk.test@example.com')
                ->type('phone', '1234567890')
                ->type('address', '123 Dusk Test Street')
                ->type('description', 'This customer was created during browser testing by an admin.')
                ->press('Save')
                ->assertPathIs('/admin/crm-customers')

               ;
               
        });

        // Assert that the customer was stored in the database
        $this->assertDatabaseHas('crm_customers', [
            'first_name' => 'Dusk',
            'last_name' => 'TestCustomer',
            'email' => 'dusk.test@example.com',
           
  ]);
          
        
    }
}