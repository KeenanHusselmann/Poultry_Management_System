<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Farm
    Route::delete('farms/destroy', 'FarmController@massDestroy')->name('farms.massDestroy');
    Route::resource('farms', 'FarmController');

    // Poultry House
    Route::delete('poultry-houses/destroy', 'PoultryHouseController@massDestroy')->name('poultry-houses.massDestroy');
    Route::resource('poultry-houses', 'PoultryHouseController');

    // Egg Production
    Route::delete('egg-productions/destroy', 'EggProductionController@massDestroy')->name('egg-productions.massDestroy');
    Route::resource('egg-productions', 'EggProductionController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Create Chemical
    Route::delete('create-chemicals/destroy', 'CreateChemicalController@massDestroy')->name('create-chemicals.massDestroy');
    Route::resource('create-chemicals', 'CreateChemicalController');

    // Pesticide
    Route::delete('pesticides/destroy', 'PesticideController@massDestroy')->name('pesticides.massDestroy');
    Route::resource('pesticides', 'PesticideController');

    // Insecticide
    Route::delete('insecticides/destroy', 'InsecticideController@massDestroy')->name('insecticides.massDestroy');
    Route::resource('insecticides', 'InsecticideController');

    // Life Stock
    Route::delete('life-stocks/destroy', 'LifeStockController@massDestroy')->name('life-stocks.massDestroy');
    Route::resource('life-stocks', 'LifeStockController');

    // Feed Managment
    Route::delete('feed-managments/destroy', 'FeedManagmentController@massDestroy')->name('feed-managments.massDestroy');
    Route::resource('feed-managments', 'FeedManagmentController');

    // Disease
    Route::delete('diseases/destroy', 'DiseaseController@massDestroy')->name('diseases.massDestroy');
    Route::resource('diseases', 'DiseaseController');

    // Health Record
    Route::delete('health-records/destroy', 'HealthRecordController@massDestroy')->name('health-records.massDestroy');
    Route::resource('health-records', 'HealthRecordController');

    // Production Report
    Route::delete('production-reports/destroy', 'ProductionReportController@massDestroy')->name('production-reports.massDestroy');
    Route::resource('production-reports', 'ProductionReportController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Farm
    Route::delete('farms/destroy', 'FarmController@massDestroy')->name('farms.massDestroy');
    Route::resource('farms', 'FarmController');

    // Poultry House
    Route::delete('poultry-houses/destroy', 'PoultryHouseController@massDestroy')->name('poultry-houses.massDestroy');
    Route::resource('poultry-houses', 'PoultryHouseController');

    // Egg Production
    Route::delete('egg-productions/destroy', 'EggProductionController@massDestroy')->name('egg-productions.massDestroy');
    Route::resource('egg-productions', 'EggProductionController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Create Chemical
    Route::delete('create-chemicals/destroy', 'CreateChemicalController@massDestroy')->name('create-chemicals.massDestroy');
    Route::resource('create-chemicals', 'CreateChemicalController');

    // Pesticide
    Route::delete('pesticides/destroy', 'PesticideController@massDestroy')->name('pesticides.massDestroy');
    Route::resource('pesticides', 'PesticideController');

    // Insecticide
    Route::delete('insecticides/destroy', 'InsecticideController@massDestroy')->name('insecticides.massDestroy');
    Route::resource('insecticides', 'InsecticideController');

    // Life Stock
    Route::delete('life-stocks/destroy', 'LifeStockController@massDestroy')->name('life-stocks.massDestroy');
    Route::resource('life-stocks', 'LifeStockController');

    // Feed Managment
    Route::delete('feed-managments/destroy', 'FeedManagmentController@massDestroy')->name('feed-managments.massDestroy');
    Route::resource('feed-managments', 'FeedManagmentController');

    // Disease
    Route::delete('diseases/destroy', 'DiseaseController@massDestroy')->name('diseases.massDestroy');
    Route::resource('diseases', 'DiseaseController');

    // Health Record
    Route::delete('health-records/destroy', 'HealthRecordController@massDestroy')->name('health-records.massDestroy');
    Route::resource('health-records', 'HealthRecordController');

    // Production Report
    Route::delete('production-reports/destroy', 'ProductionReportController@massDestroy')->name('production-reports.massDestroy');
    Route::resource('production-reports', 'ProductionReportController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
