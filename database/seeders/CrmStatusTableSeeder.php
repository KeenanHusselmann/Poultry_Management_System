<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2023-12-13 19:52:36',
                'updated_at' => '2023-12-13 19:52:36',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2023-12-13 19:52:36',
                'updated_at' => '2023-12-13 19:52:36',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2023-12-13 19:52:36',
                'updated_at' => '2023-12-13 19:52:36',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
