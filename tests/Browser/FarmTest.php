<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class FarmTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin =User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.farms.index'));
            $browser->assertRouteIs('admin.farms.index');
        });
    }
}
