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
//    Route::get("/chartjs", "HomeController@Chartjs");

    //Permission
    Route::prefix('/permissions')->group(function (): void {
        Route::get('/', 'PermissionController@index')->name('admin.permissions.index');
        Route::post('/', 'PermissionController@searchRow')->name('admin.permissions.search-row');
        Route::get('/create', 'PermissionController@createForm')->name('admin.permissions.create');
        Route::post('/store', 'PermissionController@store')->name('admin.permissions.store');
        Route::post('/destroy', 'PermissionController@destroy')->name('admin.permissions.destroy');
        Route::post('/destroy-select', 'PermissionController@destroySelect')->name('admin.permissions.destroy-select');
    });

    //Roles
    Route::prefix('/roles')->group(function (): void {
        Route::get('/', 'RoleController@index')->name('admin.roles.index');
        Route::post('/', 'RoleController@searchRow')->name('admin.roles.search-row');
        Route::get('/create', 'RoleController@createForm')->name('admin.roles.create');
        Route::post('/store', 'RoleController@store')->name('admin.roles.store');
        Route::post('/destroy', 'RoleController@destroy')->name('admin.roles.destroy');
        Route::post('/destroy-select', 'RoleController@destroySelect')->name('admin.roles.destroy-select');
    });

    //User
    Route::prefix('/users')->group(function (): void {
        Route::get('/', 'UserController@index')->name('admin.users.index');
        Route::post('/', 'UserController@searchRow')->name('admin.users.search-row');
        Route::get('/create', 'UserController@createForm')->name('admin.users.create');
        Route::post('/store', 'UserController@store')->name('admin.users.store');
        Route::post('/destroy', 'UserController@destroy')->name('admin.users.destroy');
        Route::post('/destroy-select', 'UserController@destroySelect')->name('admin.users.destroy-select');
    });

    //Position (staff)
    Route::prefix('/positions')->group(function(): void {
        Route::get('/', 'PositionController@index')->name('admin.positions.index');
        Route::post('/', 'PositionController@searchRow')->name('admin.positions.search-row');
        Route::get('/create', 'PositionController@createForm')->name('admin.positions.create');
        Route::post('/store', 'PositionController@store')->name('admin.positions.store');
        Route::post('/destroy', 'PositionController@destroy')->name('admin.positions.destroy');
        Route::post('/destroy-select', 'PositionController@destroySelect')->name('admin.positions.destroy-select');
    });

    //Departments
    Route::prefix('/departments')->group(function (): void {
        Route::get('/', 'DepartmentController@index')->name('admin.departments.index');
        Route::post('/', 'DepartmentController@searchRow')->name('admin.departments.search-row');
        Route::get('/create', 'DepartmentController@createForm')->name('admin.departments.create');
        Route::post('/store', 'DepartmentController@store')->name('admin.departments.store');
        Route::post('/destroy', 'DepartmentController@destroy')->name('admin.departments.destroy');
        Route::post('/destroy-select', 'DepartmentController@destroySelect')->name('admin.departments.destroy-select');
        Route::get('/trash', 'DepartmentController@trashIndex')->name('admin.departments.trash-index');
        Route::post('/trash', 'DepartmentController@trashSearchRow')->name('admin.departments.trash-search-row');
        Route::post('/trash/force', 'DepartmentController@forceDelete')->name('admin.departments.trash-force');
        Route::post('/trash/force-select', 'DepartmentController@forceDeleteSelect')->name('admin.departments.trash-force-select');
        Route::post('/trash/restore', 'DepartmentController@restore')->name('admin.departments.trash-restore');
    });

    //Staff
    Route::prefix('/staffs')->group(function(): void {
        Route::get('/', 'StaffController@index')->name('admin.staffs.index');
        Route::post('/', 'StaffController@searchRow')->name('admin.staffs.search-row');
        Route::get('/create', 'StaffController@createForm')->name('admin.staffs.create');
        Route::post('/store', 'StaffController@store')->name('admin.staffs.store');
        Route::post('/destroy', 'StaffController@destroy')->name('admin.staffs.destroy');
        Route::post('/destroy-select', 'StaffController@destroySelect')->name('admin.staffs.destroy-select');

    });


    //customer management
    Route::prefix('/customers')->group(function (): void {
        Route::get('/', 'CustomerController@index')->name('admin.customers.index');
        Route::post('/', 'CustomerController@searchRow')->name('admin.customers.search-row');
        Route::get('/{id}/show', 'CustomerController@show')->name('admin.customers.show');
        Route::get('/create', 'CustomerController@entry')->name('admin.customers.create');
        Route::get('/{id}/edit', 'CustomerController@entry')->name('admin.customers.edit');
        Route::post('/store', 'CustomerController@store')->name('admin.customers.store');
        Route::post('/destroy', 'CustomerController@destroy')->name('admin.customers.destroy');
        Route::post('/destroy-select', 'CustomerController@destroySelect')->name('admin.customers.destroy-select');
    });
    //category_topic management
    Route::prefix('/category-topic')->group(function(): void{
        Route::get('/', 'Category_topicController@index')->name('admin.category-topic.index');
        Route::post('/', 'Category_topicController@searchRow')->name('admin.category-topic.search-row');
        Route::get('/create', 'Category_topicController@entry')->name('admin.category-topic.create');
        Route::get('/{id}/edit', 'Category_topicController@entry')->name('admin.category-topic.edit');
        Route::post('/store', 'Category_topicController@store')->name('admin.category-topic.store');
        Route::post('/destroy', 'Category_topicController@destroy')->name('admin.category-topic.destroy');
        Route::post('/destroy-select', 'Category_topicController@destroySelect')->name('admin.category-topic.destroy-select');
    });
    //topics management
    Route::prefix('/topics')->group(function(): void{
        Route::get('/', 'TopicController@index')->name('admin.topic.index');
        Route::post('/', 'TopicController@searchRow')->name('admin.topic.search-row');
        Route::get('/create', 'TopicController@entry')->name('admin.topic.create');
        Route::get('/{id}/edit', 'TopicController@entry')->name('admin.topic.edit');
        Route::post('/store', 'TopicController@store')->name('admin.topic.store');
        Route::post('/destroy', 'TopicController@destroy')->name('admin.topic.destroy');
        Route::post('/destroy-select', 'TopicController@destroySelect')->name('admin.topic.destroy-select');
    });
    //internship management
    Route::prefix('/internships')->group(function(): void{
        Route::get('/', 'InternshipController@index')->name('admin.internship.index');
        Route::post('/', 'InternshipController@searchRow')->name('admin.internship.search-row');
        Route::get('/{id}/show', 'InternshipController@show')->name('admin.internship.show');
        Route::get('/create', 'InternshipController@entry')->name('admin.internship.create');
        Route::get('/{id}/edit', 'InternshipController@entry')->name('admin.internship.edit');
        Route::post('/store', 'InternshipController@store')->name('admin.internship.store');
        Route::post('/destroy', 'InternshipController@destroy')->name('admin.internship.destroy');
     Route::post('/destroy-select', 'InternshipController@destroySelect')->name('admin.internship.destroy-select');
//        Route::post('/register','InternshipController@register')->name('admin.internship.register');

    });
    //internship_topic management
    Route::prefix('/internship-topic')->group(function(): void{
        Route::get('/', 'InternshipTopicController@index')->name('admin.internship-topic.index');
        Route::post('/', 'InternshipTopicController@searchRow')->name('admin.internship-topic.search-row');
        Route::get('/{id}/show', 'InternshipTopicController@show')->name('admin.internship-topic.show');
        Route::get('/{id}/edit', 'InternshipTopicController@entry')->name('admin.internship-topic.edit');
        Route::post('/store', 'InternshipTopicController@Update')->name('admin.internship-topic.store');
        Route::post('/destroy', 'InternshipTopicController@destroy')->name('admin.internship-topic.destroy');
        Route::post('/inserttopic','InternshipTopicController@insert')->name('admin.internship-topic.insert');
        Route::post('/destroy-select', 'InternshipTopicController@destroySelect')->name('admin.internship-topic.destroy-select');
        // Route::post('/showinternshiptopic','InternshipController@internshiptopic')->name('admin.internship.internshiptopic');
    });
    //contract
    Route::prefix('/contract')->group(function (): void {
        Route::get('/', 'ContractController@index')->name('admin.contract.index');
        Route::post('/', 'ContractController@searchRow')->name('admin.contract.search-row');
        Route::post('/filter','ContractController@getFilter')->name('admin.contract.filter');
        Route::get('/{id}/show','ContractController@show')->name('admin.contract.show');
        Route::get('/{id}/edit','ContractController@entry')->name('admin.contract.edit');
        Route::post('/store','ContractController@store')->name('admin.contract.store');
        Route::post('/destroy','ContractController@destroy')->name('admin.contract.destroy');
        Route::post('/destroy-select', 'ContractController@destroySelect')->name('admin.contract.destroy-select');

        Route::get('/software', 'ContractController@software')->name('admin.contract.software');
        Route::post('/viewSW', 'ContractController@view')->name('admin.contract.viewSW');
        Route::post('/print-Website','ContractController@print')->name('admin.contract.printWS');
        Route::post('/printwebsite','ContractController@print_website')->name('admin.contract.print_website');

        Route::get('/vps', 'ContractController@VPS')->name('admin.contract.vps');
        Route::post('/review-VPS', 'ContractController@reviewVPS')->name('admin.contract.reviewVPS');
        Route::post('/print-VPS','ContractController@printVPS')->name('admin.contract.printVPS');
        Route::post('/printVPS','ContractController@print_vps')->name('admin.contract.print_vps');

        Route::get('/domain', 'ContractController@domain')->name('admin.contract.domain');
        Route::post('/review-domain', 'ContractController@reviewDomain')->name('admin.contract.reviewDomain');
        Route::post('/print-domain','ContractController@printDomain')->name('admin.contract.printDomain');
        Route::post('/printdomain','ContractController@print_domain')->name('admin.contract.print_domain');


        Route::get('/hosting', 'ContractController@hosting')->name('admin.contract.hosting');
        Route::post('/review-hosting', 'ContractController@reviewHosting')->name('admin.contract.reviewHosting');
        Route::post('/print-hosting','ContractController@printHosting')->name('admin.contract.printHosting');
        Route::post('/printhosting','ContractController@print_hosting')->name('admin.contract.print_hosting');




    });
    //domain management
    Route::prefix('/domains')->group(function(): void{
        Route::get('/', 'DomainController@index')->name('admin.domains.index');
        Route::post('/', 'DomainController@searchRow')->name('admin.domains.search-row');
        Route::get('/create', 'DomainController@entry')->name('admin.domains.create');
        Route::get('/{id}/edit', 'DomainController@entry')->name('admin.domains.edit');
        Route::post('/store', 'DomainController@store')->name('admin.domains.store');
        Route::post('/destroy', 'DomainController@destroy')->name('admin.domains.destroy');
    });
    //hosting management
    Route::prefix('/hostings')->group(function(): void{
        Route::get('/', 'HostingController@index')->name('admin.hostings.index');
        Route::post('/', 'HostingController@searchRow')->name('admin.hostings.search-row');
        Route::get('/create', 'HostingController@entry')->name('admin.hostings.create');
        Route::get('/{id}/edit', 'HostingController@entry')->name('admin.hostings.edit');
        Route::post('/store', 'HostingController@store')->name('admin.hostings.store');
        Route::post('/destroy', 'HostingController@destroy')->name('admin.hostings.destroy');
    });
    //vps management
    Route::prefix('/vpss')->group(function(): void{
        Route::get('/', 'VPSController@index')->name('admin.vpss.index');
        Route::post('/', 'VPSController@searchRow')->name('admin.vpss.search-row');
        Route::get('/create', 'VPSController@entry')->name('admin.vpss.create');
        Route::get('/{id}/edit', 'VPSController@entry')->name('admin.vpss.edit');
        Route::post('/store', 'VPSController@store')->name('admin.vpss.store');
        Route::post('/destroy', 'VPSController@destroy')->name('admin.vpss.destroy');
    });
    //email management
    Route::prefix('/emails')->group(function(): void{
        Route::get('/', 'EmailController@index')->name('admin.emails.index');
        Route::post('/', 'EmailController@searchRow')->name('admin.emails.search-row');
        Route::get('/create', 'EmailController@entry')->name('admin.emails.create');
        Route::get('/{id}/edit', 'EmailController@entry')->name('admin.emails.edit');
        Route::post('/store', 'EmailController@store')->name('admin.emails.store');
        Route::post('/destroy', 'EmailController@destroy')->name('admin.emails.destroy');


    });
    //ssl management
    Route::prefix('/ssls')->group(function(): void{
        Route::get('/', 'SslController@index')->name('admin.ssls.index');
        Route::post('/', 'SslController@searchRow')->name('admin.ssls.search-row');
        Route::get('/create', 'SslController@entry')->name('admin.ssls.create');
        Route::get('/{id}/edit', 'SslController@entry')->name('admin.ssls.edit');
        Route::post('/store', 'SslController@store')->name('admin.ssls.store');
        Route::post('/destroy', 'SslController@destroy')->name('admin.ssls.destroy');
    });
    //website management
    Route::prefix('/websites')->group(function(): void{
        Route::get('/', 'WebsiteController@index')->name('admin.websites.index');
        Route::post('/', 'WebsiteController@searchRow')->name('admin.websites.search-row');
        Route::get('/create', 'WebsiteController@entry')->name('admin.websites.create');
        Route::get('/{id}/edit', 'WebsiteController@entry')->name('admin.websites.edit');
        Route::post('/store', 'WebsiteController@store')->name('admin.websites.store');
        Route::post('/destroy', 'WebsiteController@destroy')->name('admin.websites.destroy');
    });
    //register service management
    Route::prefix('/list-services')->group(function(): void{
        Route::get('/index', 'RegisterServiceController@index')->name('admin.list-services.index');
        Route::post('/', 'RegisterServiceController@searchRow')->name('admin.list-services.search-row');
        Route::post('/filter','RegisterServiceController@getFilter')->name('admin.list-services.filter');
        Route::get('/{id}/edit', 'RegisterServiceController@entry')->name('admin.list-services.edit');
        Route::post('/store', 'RegisterServiceController@store')->name('admin.list-services.store');
        Route::post('/destroy', 'RegisterServiceController@destroy')->name('admin.list-services.destroy');
        Route::post('/destroy-select', 'RegisterServiceController@destroySelect')->name('admin.list-services.destroy-select');
        //register
        Route::get('/registerdomain', 'RegisterServiceController@registerdomain')->name('admin.list-services.registerdomain');
        Route::get('/registerhosting', 'RegisterServiceController@registerhosting')->name('admin.list-services.registerhosting');
        Route::get('/registervps', 'RegisterServiceController@registervps')->name('admin.list-services.registervps');
        Route::get('/registeremail', 'RegisterServiceController@registeremail')->name('admin.list-services.registeremail');
        Route::get('/registerssl', 'RegisterServiceController@registerssl')->name('admin.list-services.registerssl');
        Route::get('/registerwebsite', 'RegisterServiceController@registerwebsite')->name('admin.list-services.registerwebsite');
        Route::post('/post', 'RegisterServiceController@addpost')->name('admin.list-services.post');
        //search
        Route::get('/search', 'RegisterServiceController@search')->name('admin.list-services.search');
        //Extend
        Route::GET('/{id}/extend', 'RegisterServiceController@extend')->name('admin.list-services.extend');
        Route::post('/storeextend', 'RegisterServiceController@storeextend')->name('admin.list-services.storeextend');


        //domain using
        Route::GET('/domain-using', 'RegisterServiceController@domainusing')->name('admin.list-services.domainusing');
        Route::GET('/hosting-using', 'RegisterServiceController@hostingusing')->name('admin.list-services.hostingusing');
        Route::GET('/vps-using', 'RegisterServiceController@vpsusing')->name('admin.list-services.vpsusing');
        Route::GET('/email-using', 'RegisterServiceController@emailusing')->name('admin.list-services.emailusing');
        Route::GET('/website-using', 'RegisterServiceController@websiteusing')->name('admin.list-services.websiteusing');
        Route::GET('/soft-using', 'RegisterServiceController@softusing')->name('admin.list-services.softusing');

    });
    //register software management
    Route::prefix('/register-softs')->group(function(): void{
        Route::get('/', 'RegisterSoftController@index')->name('admin.register-softs.index');

        Route::get('/{id}/edit', 'RegisterSoftController@entry')->name('admin.register-softs.edit');
        Route::get('/create', 'RegisterSoftController@entry')->name('admin.register-softs.create');
        Route::post('/store', 'RegisterSoftController@store')->name('admin.register-softs.store');

        Route::post('/destroy', 'RegisterSoftController@destroy')->name('admin.register-softs.destroy');
        //search
        Route::GET('/search', 'RegisterSoftController@action')->name('admin.register-softs.action');
        //Extend
        Route::GET('/{id}/extend', 'RegisterSoftController@extend')->name('admin.register-softs.extend');
        Route::post('/storeextend', 'RegisterSoftController@storeextend')->name('admin.register-softs.storeextend');


    });
    //softwares management
    Route::prefix('/softwares')->group(function(): void{
        Route::get('/', 'SoftwareController@index')->name('admin.softwares.index');
        Route::post('/', 'SoftwareController@searchRow')->name('admin.softwares.search-row');
        Route::get('/create', 'SoftwareController@entry')->name('admin.softwares.create');
        Route::get('/{id}/edit', 'SoftwareController@entry')->name('admin.softwares.edit');
        Route::post('/store', 'SoftwareController@store')->name('admin.softwares.store');
        Route::post('/destroy', 'SoftwareController@destroy')->name('admin.softwares.destroy');
    });
    //typesoftwares management
    Route::prefix('/typesoftwares')->group(function(): void{
        Route::get('/', 'TypeSoftwareController@index')->name('admin.typesoftwares.index');
        Route::post('/', 'TypeSoftwareController@searchRow')->name('admin.typesoftwares.search-row');
        Route::get('/create', 'TypeSoftwareController@entry')->name('admin.typesoftwares.create');
        Route::get('/{id}/edit', 'TypeSoftwareController@entry')->name('admin.typesoftwares.edit');
        Route::post('/store', 'TypeSoftwareController@store')->name('admin.typesoftwares.store');
        Route::post('/destroy', 'TypeSoftwareController@destroy')->name('admin.typesoftwares.destroy');
        Route::post('/destroy-select', 'TypeSoftwareController@destroySelect')->name('admin.typesoftwares.destroy-select');
    });
    //order management
    Route::prefix('/order')->group(function(): void{

        //order soft
        Route::get('/software', 'OrderController@software')->name('admin.order.software');
        Route::post('/updatetssoft', 'OrderController@updatetssoft')->name('admin.order.updatetssoft');
        Route::post('/search-soft', 'OrderController@searchRowSoft')->name('admin.order.search-row-soft');
        Route::post('/destroy-select-soft', 'OrderController@destroySelectSoft')->name('admin.order.destroy-select-soft');
        //order service
        Route::get('/services', 'OrderController@services')->name('admin.order.services');
        Route::post('/updatetservices', 'OrderController@updatetservices')->name('admin.order.updatetservices');
        Route::post('/destroy-select', 'OrderController@destroySelect')->name('admin.order.destroy-select');
        Route::post('/', 'OrderController@searchRow')->name('admin.order.search-row');
        route::get('sendmail','OrderController@sendmail')->name('admin.order.sendmail');
//        Route::get('/order', 'OrderController@index')->name('admin.order.index');
    });
    //invoice management
    Route::prefix('/invoices')->group(function(): void{
        Route::get('/{id}/show', 'InvoiceController@show')->name('admin.invoices.show');
        Route::get('/create', 'InvoiceController@entry')->name('admin.invoices.create');
        Route::get('/{id}/edit', 'InvoiceController@entry')->name('admin.invoices.edit');
        Route::post('/store', 'InvoiceController@store')->name('admin.invoices.store');
//Sổ quỹ
        Route::get('/receipts', 'InvoiceController@receipts')->name('admin.invoices.receipts');
        Route::post('/', 'InvoiceController@searchRow')->name('admin.invoices.search-row');

        //lập phiếu thu
        Route::get('/addreceipts', 'InvoiceController@addreceipts')->name('admin.invoices.addreceipts');
        Route::post('/receiptsstore', 'InvoiceController@receiptsstore')->name('admin.invoices.receiptsstore');
        Route::post('/destroy-select', 'InvoiceController@destroySelect')->name('admin.invoices.destroy-select');




    });
    //revenue
    Route::prefix('/revenue')->group(function(): void{
        Route::get('/', 'RevenueController@index')->name('admin.revenue.index');
        Route::post('/', 'RevenueController@searchRow')->name('admin.revenue.search-row');
        Route::post('/print','RevenueController@print')->name('admin.revenue.print');
        Route::get('/{id}/edit', 'RevenueController@entry')->name('admin.revenue.edit');
        Route::post('/destroy', 'RevenueController@destroy')->name('admin.revenue.destroy');
        Route::post('/destroy-select', 'RevenueController@destroySelect')->name('admin.revenue.destroy-select');
    });


    //expenditure
    Route::prefix('/expenditure')->group(function(): void{
        Route::get('/', 'ExpenditureController@index')->name('admin.expenditure.index');
        Route::post('/', 'ExpenditureController@searchRow')->name('admin.expenditure.search-row');
        Route::post('/print','ExpenditureController@print')->name('admin.expenditure.print');
        Route::get('/create', 'ExpenditureController@entry')->name('admin.expenditure.create');
        Route::get('/{id}/edit', 'ExpenditureController@entry')->name('admin.expenditure.edit');
        Route::post('/store','ExpenditureController@store')->name('admin.expenditure.store');
        Route::post('/destroy', 'ExpenditureController@destroy')->name('admin.expenditure.destroy');
        Route::post('/destroy-select', 'ExpenditureController@destroySelect')->name('admin.expenditure.destroy-select');
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

    Route::get('/print', function () {
        return view('template.print');
    })->name('admin.print');
//    Route::view('/print', 'template.print');
});



Route::namespace('Register')->prefix('/register')->group(function ():void{
    Route::get('/','Register_InternshipController@get_register')->name('register.internship.get_register');
    Route::post('/register','Register_InternshipController@register')->name('register.internship.register');
});

