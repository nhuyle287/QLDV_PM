<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('admin.index'));
});
// Admin pages
Route::namespace('Admin')->prefix('/admin')->group(function (): void {
    // Login
    Route::get('/login', 'LoginController@getLogin')->name('login');
    Route::post('/login', 'LoginController@postLogin')->name('postLogin');

    //Logout
    Route::post('/logout', 'LoginController@postLogout')->name('logout');
    Route::get('/','HomeController@index')->name('admin.index');

    //role management
    Route::prefix('/roles')->group(function (): void {
        Route::get('/', 'RoleController@index')->name('admin.roles.index');
        Route::get('/create', 'RoleController@entry')->name('admin.roles.create');
        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
        Route::get('/{id}/show', 'RoleController@show')->name('admin.roles.show');
        Route::post('/{id}/destroy', 'RoleController@destroy')->name('admin.roles.destroy');
    });

    //user management
    Route::prefix('/users')->group(function (): void {
        Route::get('/', 'UserController@index')->name('admin.users.index');
        Route::get('/create', 'UserController@entry')->name('admin.users.create');
        Route::get('/{id}/edit', 'UserController@entry')->name('admin.users.edit');
        Route::post('/store', 'UserController@store')->name('admin.users.store');
    });

    //department management
    Route::prefix('/departments')->group(function (): void {
        Route::get('/', 'DepartmentController@index')->name('admin.departments.index');
        Route::get('/{id}/show', 'DepartmentController@show')->name('admin.departments.show');
        Route::get('/create', 'DepartmentController@entry')->name('admin.departments.create');
//        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
//        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
    });
    //customer management
    Route::prefix('/customers')->group(function (): void {
        Route::get('/', 'CustomerController@index')->name('admin.customers.index');
        Route::get('/{id}/show', 'CustomerController@show')->name('admin.customers.show');
        Route::get('/create', 'CustomerController@entry')->name('admin.customers.create');
        Route::get('/{id}/edit', 'CustomerController@entry')->name('admin.customers.edit');
        Route::post('/store', 'CustomerController@store')->name('admin.customers.store');
        Route::post('/{id}/destroy', 'CustomerController@destroy')->name('admin.customers.destroy');
    });
    //category_topic management
    Route::prefix('/category_topic')->group(function(): void{
        Route::get('/', 'Category_topicController@index')->name('admin.category_topic.index');
        Route::get('/{id}/show', 'Category_topicController@show')->name('admin.category_topic.show');
        Route::get('/create', 'Category_topicController@entry')->name('admin.category_topic.create');
        Route::get('/{id}/edit', 'Category_topicController@entry')->name('admin.category_topic.edit');
        Route::post('/store', 'Category_topicController@store')->name('admin.category_topic.store');
        Route::post('/{id}/destroy', 'Category_topicController@destroy')->name('admin.category_topic.destroy');
    });
    //topics management
    Route::prefix('/topics')->group(function(): void{
        Route::get('/', 'TopicController@index')->name('admin.topic.index');
        Route::get('/{id}/show', 'TopicController@show')->name('admin.topic.show');
        Route::get('/create', 'TopicController@entry')->name('admin.topic.create');
        Route::get('/{id}/edit', 'TopicController@entry')->name('admin.topic.edit');
        Route::post('/store', 'TopicController@store')->name('admin.topic.store');
        Route::post('/{id}/destroy', 'TopicController@destroy')->name('admin.topic.destroy');
    });
    //internship management
    Route::prefix('/internships')->group(function(): void{
        Route::get('/', 'InternshipController@index')->name('admin.internship.index');

        Route::get('/{id}/show', 'InternshipController@show')->name('admin.internship.show');
        Route::get('/create', 'InternshipController@entry')->name('admin.internship.create');
        Route::get('/{id}/edit', 'InternshipController@entry')->name('admin.internship.edit');
        Route::post('/store', 'InternshipController@store')->name('admin.internship.store');
        Route::post('/{id}/destroy', 'InternshipController@destroy')->name('admin.internship.destroy');
//        Route::get('/dang_ky','InternshipController@dk')->name('admin.internship.dang_ky');
//        Route::post('/register','InternshipController@register')->name('admin.internship.register');

    });
    //internship_topic management
    Route::prefix('/internship_topic')->group(function(): void{
        Route::get('/', 'InternshipTopicController@index')->name('admin.internship_topic.index');
        Route::get('/{id}/show', 'InternshipTopicController@show')->name('admin.internship_topic.show');
        Route::get('/{id}/edit', 'InternshipTopicController@entry')->name('admin.internship_topic.edit');
        Route::post('/store', 'InternshipTopicController@Update')->name('admin.internship_topic.store');
        Route::post('/{id}/destroy', 'InternshipTopicController@destroy')->name('admin.internship_topic.destroy');
        Route::post('/inserttopic','InternshipTopicController@insert')->name('admin.internship_topic.insert');
       // Route::post('/showinternshiptopic','InternshipController@internshiptopic')->name('admin.internship.internshiptopic');
    });
    //domain management
    Route::prefix('/domains')->group(function(): void{
        Route::get('/', 'DomainController@index')->name('admin.domains.index');
        Route::get('/{id}/show', 'DomainController@show')->name('admin.domains.show');
        Route::get('/create', 'DomainController@entry')->name('admin.domains.create');
        Route::get('/{id}/edit', 'DomainController@entry')->name('admin.domains.edit');
        Route::post('/store', 'DomainController@store')->name('admin.domains.store');
        Route::post('/{id}/destroy', 'DomainController@destroy')->name('admin.domains.destroy');
    });
    //hosting management
    Route::prefix('/hostings')->group(function(): void{
        Route::get('/', 'HostingController@index')->name('admin.hostings.index');
        Route::get('/{id}/show', 'HostingController@show')->name('admin.hostings.show');
        Route::get('/create', 'HostingController@entry')->name('admin.hostings.create');
        Route::get('/{id}/edit', 'HostingController@entry')->name('admin.hostings.edit');
        Route::post('/store', 'HostingController@store')->name('admin.hostings.store');
        Route::post('/{id}/destroy', 'HostingController@destroy')->name('admin.hostings.destroy');
    });
    //vps management
    Route::prefix('/vpss')->group(function(): void{
        Route::get('/', 'VPSController@index')->name('admin.vpss.index');
        Route::get('/{id}/show', 'VPSController@show')->name('admin.vpss.show');
        Route::get('/create', 'VPSController@entry')->name('admin.vpss.create');
        Route::get('/{id}/edit', 'VPSController@entry')->name('admin.vpss.edit');
        Route::post('/store', 'VPSController@store')->name('admin.vpss.store');
        Route::post('/{id}/destroy', 'VPSController@destroy')->name('admin.vpss.destroy');
    });
    //email management
    Route::prefix('/emails')->group(function(): void{
        Route::get('/', 'EmailController@index')->name('admin.emails.index');
        Route::get('/{id}/show', 'EmailController@show')->name('admin.emails.show');
        Route::get('/create', 'EmailController@entry')->name('admin.emails.create');
        Route::get('/{id}/edit', 'EmailController@entry')->name('admin.emails.edit');
        Route::post('/store', 'EmailController@store')->name('admin.emails.store');
        Route::post('/{id}/destroy', 'EmailController@destroy')->name('admin.emails.destroy');
    });
    //ssl management
    Route::prefix('/ssls')->group(function(): void{
        Route::get('/', 'SslController@index')->name('admin.ssls.index');
        Route::get('/{id}/show', 'SslController@show')->name('admin.ssls.show');
        Route::get('/create', 'SslController@entry')->name('admin.ssls.create');
        Route::get('/{id}/edit', 'SslController@entry')->name('admin.ssls.edit');
        Route::post('/store', 'SslController@store')->name('admin.ssls.store');
        Route::post('/{id}/destroy', 'SslController@destroy')->name('admin.ssls.destroy');
    });
    //website management
    Route::prefix('/websites')->group(function(): void{
        Route::get('/', 'WebsiteController@index')->name('admin.websites.index');
        Route::get('/{id}/show', 'WebsiteController@show')->name('admin.websites.show');
        Route::get('/create', 'WebsiteController@entry')->name('admin.websites.create');
        Route::get('/{id}/edit', 'WebsiteController@entry')->name('admin.websites.edit');
        Route::post('/store', 'WebsiteController@store')->name('admin.websites.store');
        Route::post('/{id}/destroy', 'WebsiteController@destroy')->name('admin.websites.destroy');
    });
    //register service management
    Route::prefix('/register_services')->group(function(): void{
        Route::get('/', 'RegisterServiceController@index')->name('admin.register_services.index');
        Route::get('/{id}/show', 'RegisterServiceController@show')->name('admin.register_services.show');
        Route::get('/{id}/edit', 'RegisterServiceController@entry')->name('admin.register_services.edit');
        Route::get('/create', 'RegisterServiceController@addget')->name('admin.register_services.create');
        Route::post('/post', 'RegisterServiceController@addpost')->name('admin.register_services.post');
        Route::post('/store', 'RegisterServiceController@store')->name('admin.register_services.store');
        Route::post('/{id}/destroy', 'RegisterServiceController@destroy')->name('admin.register_services.destroy');
    //register
        Route::get('/registerdomain', 'RegisterServiceController@registerdomain')->name('admin.register_services.registerdomain');
        Route::get('/registerhosting', 'RegisterServiceController@registerhosting')->name('admin.register_services.registerhosting');
        Route::get('/registervps', 'RegisterServiceController@registervps')->name('admin.register_services.registervps');
        Route::get('/registeremail', 'RegisterServiceController@registeremail')->name('admin.register_services.registeremail');
        Route::get('/registerssl', 'RegisterServiceController@registerssl')->name('admin.register_services.registerssl');
        Route::get('/registerwebsite', 'RegisterServiceController@registerwebsite')->name('admin.register_services.registerwebsite');
     //search
        Route::GET('/search', 'RegisterServiceController@action')->name('admin.register_services.action');


    });
    //register software management
    Route::prefix('/register_softs')->group(function(): void{
        Route::get('/', 'RegisterSoftController@index')->name('admin.register_softs.index');
        Route::get('/{id}/show', 'RegisterSoftController@show')->name('admin.register_softs.show');
        Route::get('/{id}/edit', 'RegisterSoftController@entry')->name('admin.register_softs.edit');
        Route::get('/create', 'RegisterSoftController@entry')->name('admin.register_softs.create');
        Route::post('/store', 'RegisterSoftController@store')->name('admin.register_softs.store');
        Route::post('/store', 'RegisterSoftController@store')->name('admin.register_softs.store');
        Route::post('/{id}/destroy', 'RegisterSoftController@destroy')->name('admin.register_softs.destroy');
    });
    //softwares management
    Route::prefix('/softwares')->group(function(): void{
        Route::get('/', 'SoftwareController@index')->name('admin.softwares.index');
        Route::get('/{id}/show', 'SoftwareController@show')->name('admin.softwares.show');
        Route::get('/create', 'SoftwareController@entry')->name('admin.softwares.create');
        Route::get('/{id}/edit', 'SoftwareController@entry')->name('admin.softwares.edit');
        Route::post('/store', 'SoftwareController@store')->name('admin.softwares.store');
        Route::post('/{id}/destroy', 'SoftwareController@destroy')->name('admin.softwares.destroy');
    });
    //typesoftwares management
    Route::prefix('/typesoftwares')->group(function(): void{
        Route::get('/', 'TypeSoftwareController@index')->name('admin.typesoftwares.index');
        Route::get('/{id}/show', 'TypeSoftwareController@show')->name('admin.typesoftwares.show');
        Route::get('/create', 'TypeSoftwareController@entry')->name('admin.typesoftwares.create');
        Route::get('/{id}/edit', 'TypeSoftwareController@entry')->name('admin.typesoftwares.edit');
        Route::post('/store', 'TypeSoftwareController@store')->name('admin.typesoftwares.store');
        Route::post('/{id}/destroy', 'TypeSoftwareController@destroy')->name('admin.typesoftwares.destroy');
    });
    //staffs management
    Route::prefix('/staffs')->group(function(): void{
        Route::get('/', 'StaffController@index')->name('admin.staffs.index');
        Route::get('/{id}/show', 'StaffController@show')->name('admin.staffs.show');
        Route::get('/create', 'StaffController@entry')->name('admin.staffs.create');
        Route::get('/{id}/edit', 'StaffController@entry')->name('admin.staffs.edit');
        Route::post('/store', 'StaffController@store')->name('admin.staffs.store');
        Route::post('/{id}/destroy', 'StaffController@destroy')->name('admin.staffs.destroy');
    });
    //invoice management

    Route::prefix('/invoices')->group(function(): void{
        Route::get('/', 'InvoiceController@index')->name('admin.invoices.index');
        Route::get('/{id}/show', 'InvoiceController@show')->name('admin.invoices.show');
        Route::get('/create', 'InvoiceController@entry')->name('admin.invoices.create');
        Route::get('/{id}/edit', 'InvoiceController@entry')->name('admin.invoices.edit');
        Route::post('/store', 'InvoiceController@store')->name('admin.invoices.store');
        Route::post('/{id}/destroy', 'InvoiceController@destroy')->name('admin.invoices.destroy');
    });
    //typestaffs management
    Route::prefix('/typestaffs')->group(function(): void{
        Route::get('/', 'TypeStaffController@index')->name('admin.typestaffs.index');
        Route::get('/{id}/show', 'TypeStaffController@show')->name('admin.typestaffs.show');
        Route::get('/create', 'TypeStaffController@entry')->name('admin.typestaffs.create');
        Route::get('/{id}/edit', 'TypeStaffController@entry')->name('admin.typestaffs.edit');
        Route::post('/store', 'TypeStaffController@store')->name('admin.typestaffs.store');
        Route::post('/{id}/destroy', 'TypeStaffController@destroy')->name('admin.typestaffs.destroy');
    });

    //product management
    Route::prefix('/products')->group(function (): void {
        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::get('/{id}/show', 'ProductController@show')->name('admin.products.show');
        Route::get('/create', 'ProductController@entry')->name('admin.products.create');
//        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
//        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
        Route::post('/{id}/destroy', 'ProductController@destroy')->name('admin.products.destroy');
    });


    //unit management
    Route::prefix('/units')->group(function (): void {
        Route::get('/', 'UnitController@index')->name('admin.units.index');
        Route::get('/{id}/show', 'UnitController@show')->name('admin.units.show');
        Route::get('/create', 'UnitController@entry')->name('admin.units.create');

//        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
//        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
    });

    //purpose management
    Route::prefix('/purposes')->group(function (): void {
        Route::get('/', 'PurposeController@index')->name('admin.purposes.index');
        Route::get('/{id}/show', 'PurposeController@show')->name('admin.purposes.show');
        Route::get('/create', 'PurposeController@entry')->name('admin.purposes.create');
//        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
//        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
    });
    //purchase management
    Route::prefix('/purchases')->group(function (): void {
        Route::get('/', 'PurchaseController@index')->name('admin.purchases.index');
        Route::get('/{id}/show', 'PurchaseController@show')->name('admin.purchases.show');
        Route::get('/create', 'PurchaseController@entry')->name('admin.purchases.create');
//        Route::get('/{id}/edit', 'RoleController@entry')->name('admin.roles.edit');
//        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
    });

    //contract
    Route::prefix('/contract')->group(function (): void {
        Route::get('/software', 'ContractController@software')->name('admin.contract.software');
        Route::post('/viewSW', 'ContractController@view')->name('admin.contract.viewSW');

    });

    Route::get('/print', function () {
        return view('template.print');
    })->name('admin.print');
//    Route::view('/print', 'template.print');



});



Route::namespace('Register')->prefix('/register')->group(function ():void{
    Route::get('/dang_ky','Register_InternshipController@dangky')->name('register.internship.dang_ky');
    Route::post('/register','Register_InternshipController@register')->name('register.internship.register');
});

