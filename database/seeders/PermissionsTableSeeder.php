<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'farm_create',
            ],
            [
                'id'    => 18,
                'title' => 'farm_edit',
            ],
            [
                'id'    => 19,
                'title' => 'farm_show',
            ],
            [
                'id'    => 20,
                'title' => 'farm_delete',
            ],
            [
                'id'    => 21,
                'title' => 'farm_access',
            ],
            [
                'id'    => 22,
                'title' => 'poultry_house_create',
            ],
            [
                'id'    => 23,
                'title' => 'poultry_house_edit',
            ],
            [
                'id'    => 24,
                'title' => 'poultry_house_show',
            ],
            [
                'id'    => 25,
                'title' => 'poultry_house_delete',
            ],
            [
                'id'    => 26,
                'title' => 'poultry_house_access',
            ],
            [
                'id'    => 27,
                'title' => 'egg_production_create',
            ],
            [
                'id'    => 28,
                'title' => 'egg_production_edit',
            ],
            [
                'id'    => 29,
                'title' => 'egg_production_show',
            ],
            [
                'id'    => 30,
                'title' => 'egg_production_delete',
            ],
            [
                'id'    => 31,
                'title' => 'egg_production_access',
            ],
            [
                'id'    => 32,
                'title' => 'egg_access',
            ],
            [
                'id'    => 33,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 35,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 36,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 37,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 38,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 39,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 40,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 41,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 42,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 43,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 44,
                'title' => 'task_create',
            ],
            [
                'id'    => 45,
                'title' => 'task_edit',
            ],
            [
                'id'    => 46,
                'title' => 'task_show',
            ],
            [
                'id'    => 47,
                'title' => 'task_delete',
            ],
            [
                'id'    => 48,
                'title' => 'task_access',
            ],
            [
                'id'    => 49,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 50,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 51,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 52,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 54,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 56,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 57,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 58,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 59,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 60,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 61,
                'title' => 'expense_create',
            ],
            [
                'id'    => 62,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 63,
                'title' => 'expense_show',
            ],
            [
                'id'    => 64,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 65,
                'title' => 'expense_access',
            ],
            [
                'id'    => 66,
                'title' => 'income_create',
            ],
            [
                'id'    => 67,
                'title' => 'income_edit',
            ],
            [
                'id'    => 68,
                'title' => 'income_show',
            ],
            [
                'id'    => 69,
                'title' => 'income_delete',
            ],
            [
                'id'    => 70,
                'title' => 'income_access',
            ],
            [
                'id'    => 71,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 72,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 73,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 74,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 75,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 76,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 77,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 78,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 79,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 80,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 81,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 82,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 83,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 84,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 85,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 86,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 87,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 88,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 89,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 90,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 91,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 92,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 93,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 94,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 95,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 96,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 97,
                'title' => 'team_create',
            ],
            [
                'id'    => 98,
                'title' => 'team_edit',
            ],
            [
                'id'    => 99,
                'title' => 'team_show',
            ],
            [
                'id'    => 100,
                'title' => 'team_delete',
            ],
            [
                'id'    => 101,
                'title' => 'team_access',
            ],
            [
                'id'    => 102,
                'title' => 'chemical_access',
            ],
            [
                'id'    => 103,
                'title' => 'create_chemical_create',
            ],
            [
                'id'    => 104,
                'title' => 'create_chemical_edit',
            ],
            [
                'id'    => 105,
                'title' => 'create_chemical_show',
            ],
            [
                'id'    => 106,
                'title' => 'create_chemical_delete',
            ],
            [
                'id'    => 107,
                'title' => 'create_chemical_access',
            ],
            [
                'id'    => 108,
                'title' => 'pesticide_create',
            ],
            [
                'id'    => 109,
                'title' => 'pesticide_edit',
            ],
            [
                'id'    => 110,
                'title' => 'pesticide_show',
            ],
            [
                'id'    => 111,
                'title' => 'pesticide_delete',
            ],
            [
                'id'    => 112,
                'title' => 'pesticide_access',
            ],
            [
                'id'    => 113,
                'title' => 'insecticide_create',
            ],
            [
                'id'    => 114,
                'title' => 'insecticide_edit',
            ],
            [
                'id'    => 115,
                'title' => 'insecticide_show',
            ],
            [
                'id'    => 116,
                'title' => 'insecticide_delete',
            ],
            [
                'id'    => 117,
                'title' => 'insecticide_access',
            ],
            [
                'id'    => 118,
                'title' => 'life_stock_create',
            ],
            [
                'id'    => 119,
                'title' => 'life_stock_edit',
            ],
            [
                'id'    => 120,
                'title' => 'life_stock_show',
            ],
            [
                'id'    => 121,
                'title' => 'life_stock_delete',
            ],
            [
                'id'    => 122,
                'title' => 'life_stock_access',
            ],
            [
                'id'    => 123,
                'title' => 'feed_managment_create',
            ],
            [
                'id'    => 124,
                'title' => 'feed_managment_edit',
            ],
            [
                'id'    => 125,
                'title' => 'feed_managment_show',
            ],
            [
                'id'    => 126,
                'title' => 'feed_managment_delete',
            ],
            [
                'id'    => 127,
                'title' => 'feed_managment_access',
            ],
            [
                'id'    => 128,
                'title' => 'disease_information_access',
            ],
            [
                'id'    => 129,
                'title' => 'disease_create',
            ],
            [
                'id'    => 130,
                'title' => 'disease_edit',
            ],
            [
                'id'    => 131,
                'title' => 'disease_show',
            ],
            [
                'id'    => 132,
                'title' => 'disease_delete',
            ],
            [
                'id'    => 133,
                'title' => 'disease_access',
            ],
            [
                'id'    => 134,
                'title' => 'health_record_create',
            ],
            [
                'id'    => 135,
                'title' => 'health_record_edit',
            ],
            [
                'id'    => 136,
                'title' => 'health_record_show',
            ],
            [
                'id'    => 137,
                'title' => 'health_record_delete',
            ],
            [
                'id'    => 138,
                'title' => 'health_record_access',
            ],
            [
                'id'    => 139,
                'title' => 'production_report_create',
            ],
            [
                'id'    => 140,
                'title' => 'production_report_edit',
            ],
            [
                'id'    => 141,
                'title' => 'production_report_show',
            ],
            [
                'id'    => 142,
                'title' => 'production_report_delete',
            ],
            [
                'id'    => 143,
                'title' => 'production_report_access',
            ],
            [
                'id'    => 144,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
