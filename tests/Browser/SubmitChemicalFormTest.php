<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class SubmitChemicalFormTest extends DuskTestCase
{

    public function testAdminCanSubmitChemicalForm()
    {
         $admin = User::find(1);

        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin)
                ->visit(route('admin.create-chemicals.create'))
                ->assertSee('Create Chemical') // Adjust this text to match your actual page
                ->type('name', 'DuskTest Chemical')
                ->type('description', 'This chemical was created during browser testing.')
                ->type('purchase_date', '2024-06-01')
                ->type('quantity', '500')
                ->press('Save')
                // Add either of these depending on how your app behaves after saving
                 ->assertRouteIs('admin.create-chemicals.index') // If redirected
                
                ;

         
        });

        // Assert database stored the new chemical details
        $this->assertDatabaseHas('create_chemicals', [
            'name' => 'DuskTest Chemical',
            'description' => 'This chemical was created during browser testing.',
            'quantity' => 500,
        ]);
    }
}
