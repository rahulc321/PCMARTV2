<?php
use App\Http\Controllers\LanguageController;
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
 
Route::any('/app/feedback/{id}','UsersController@feedback');
  Route::any('/app/feedback-submit/{id}','UsersController@feedbackSubmit');
  Route::any('/thankyou','UsersController@feedbackSubmit');
  Route::get('thankyou', function () {
    return view('admin.ticket.thank-you');
});

Route::get('/admin','Auth\LoginController@loginPageView');
Route::any('/loginPost','Auth\LoginController@loginPost');
Route::any('/logout1','Auth\LoginController@logout1');
Route::any('/otp','Auth\LoginController@otp');
Route::any('/verify-otp','Auth\LoginController@verifyOtp');
// dashboard Routes

Route::group(['middleware'=>'auth'], function () {
Route::any('/dashboard','UsersController@dashboardEcommerce')->name('dashboard-ecommerce');

});
Route::get('/dashboard-view','UsersController@dashboardView');
Route::get('/dashboardTicket','UsersController@dashboardTicket');

Route::group(['prefix' => 'dashboard'], function () {
  Route::get('ecommerce','DashboardController@dashboardEcommerce')->name('dashboard-ecommerce');
  Route::get('analytics','DashboardController@dashboardAnalytics')->name('dashboard-analytics');
});

//Application Routes
Route::group(['prefix' => 'app','middleware'=>'auth'], function () {
  Route::get('email','ApplicationController@emailApplication')->name('app-email');
  Route::get('chat','ApplicationController@chatApplication')->name('app-chat');
  Route::get('todo','ApplicationController@todoApplication')->name('app-todo');
  Route::get('calendar','ApplicationController@calendarApplication')->name('app-calendar');
  Route::get('kanban','ApplicationController@kanbanApplication')->name('app-kanban');
  Route::get('invoice/view','ApplicationController@invoiceApplication')->name('app-invoice-view');
  Route::get('invoice/list','ApplicationController@invoiceListApplication')->name('app-invoice-list');
  Route::get('invoice/edit','ApplicationController@invoiceEditApplication')->name('app-invoice-edit');
  Route::get('invoice/add','ApplicationController@invoiceAddApplication')->name('app-invoice-add');
  Route::get('file-manager','ApplicationController@fileManagerApplication')->name('app-file-manager');
  // User Route
  Route::get('users/list','UsersController@listUser')->name('app-users-list');
  Route::get('users/view','UsersController@viewUser')->name('app-users-view');
  Route::get('users/edit','UsersController@editUser')->name('app-users-edit');
  Route::get('user/edit/{id}','UsersController@editUserData')->name('app-users-edit');
  Route::any('admin/update','UsersController@adminUpdate');
  Route::any('copyCompanyname','UsersController@copyCompanyname');

  Route::any('add-user','UsersController@addUser');
  Route::any('user/store','UsersController@userStore');
  Route::get('delete/{id}','UsersController@deleteUser');
  Route::get('scheduling','UsersController@scheduling');

  Route::get('role/list','UsersController@roles');
  Route::get('add-role','UsersController@addRole');
  Route::any('role/store','UsersController@roleStore');
  Route::get('role/edit/{id}','UsersController@roleEdit');
  Route::any('role/update/{id}','UsersController@roleUpdate');
  Route::any('role/delete/{id}','UsersController@roleDelete');

  Route::any('update-theme','UsersController@updateTheme');
  Route::any('delete-record','UsersController@deleteRecord');

  // for upoad file
  Route::any('ictrain','UsersController@ictrain');
  Route::any('subscriptionictran','UsersController@subscriptionictran');
  Route::any('arcust','UsersController@arcust');
  Route::any('convert-date','UsersController@convertDate');
  Route::any('email-marketing','UsersController@emailMarketing');
  Route::any('subs-email-marketing','UsersController@subsEmailMarketing');
  Route::any('subsEmailMarketing2','UsersController@subsEmailMarketing2');




  Route::any('ictran/ticket/{id}','UsersController@ictranTicket');
  Route::any('ticket/store/{id}','UsersController@ticketStore');
  Route::any('ticket','UsersController@ticket');
  Route::any('ticket','UsersController@ticket');
  Route::any('ticket2','UsersController@ticket2');
  Route::any('update-setting','UsersController@updateSetting');
  Route::any('email-market','UsersController@emailMarket');
  Route::any('ticket/delete/{id}','UsersController@ticketDelete');
  Route::any('ticket/edit/{id}','UsersController@ticketEdit');
  Route::any('ticket/update/{id}','UsersController@ticketUpdate');
  Route::any('/reassign/{id}','UsersController@ticketReassign');
  Route::any('ticket/assignUpdate/{id}','UsersController@assignUpdate');
  Route::any('ticket/close/{id}','UsersController@ticketClose');
  Route::any('send-email','UsersController@sendEmail');
  Route::any('createSchedule','UsersController@createSchedule');
  Route::any('getDataCal','UsersController@getDataCal');
  Route::any('updateschedule/{id}','UsersController@updateschedule');


  Route::any('trainingUpload','UsersController@trainingUpload');
  Route::any('getNotification','UsersController@getNotification');
  Route::any('getCount','UsersController@getCount');
  Route::any('seen','UsersController@seen');
  Route::any('session/{id}/{sid}','UsersController@session');
  Route::any('schedulesession/{id}/{sid}','UsersController@schedulesession');
  Route::any('sessionView/{id}/{sId}','UsersController@sessionView');
  Route::any('updatesession/{id}/{sId}','UsersController@updatesession');
  Route::any('getTType','UsersController@getTType');
  Route::any('deleteSchedule/{id}','UsersController@deleteSchedule');
  Route::any('schedulingData1','UsersController@schedulingData1');
  Route::any('schedule/edit/{id}','UsersController@scheduleEdit');
  Route::any('updateschedulesession/{id}','UsersController@updateschedulesession');
  Route::any('getOname','UsersController@getOname');
  Route::any('getInfo','UsersController@getInfo1');
  Route::any('addInfo','UsersController@addInfo');
  Route::any('deleteInfo/{id}','UsersController@deleteInfo');

  Route::any('getcustInfo','UsersController@getcustInfo');
  Route::any('getcustInfo2','UsersController@getcustInfo2');


  




  Route::any('search','UsersController@search');
  Route::any('service-contract','UsersController@serviceContract');
  Route::any('service-contract1','UsersController@serviceContract1');
  Route::any('ictran/delete/{id}','UsersController@ictranDelete');

  Route::any('ictran/edit/{id}','UsersController@ictranEdit');
  Route::any('ictran/update/{id}','UsersController@ictranUpdate');
  Route::any('renew/{id}','UsersController@renew');
  Route::any('agree/{id}','UsersController@agree');
  Route::any('cancelled/{id}','UsersController@cancelled');


  /*************************************************************************/
Route::any('/dashboard/ictran/edit/{id}','DashboardController@ictranEdit');






  /*************************************************************************/
  Route::any('training','UsersController@training');
  Route::get('training/add','UsersController@trainingAdd');
  Route::any('training/store','UsersController@trainingStore');
  Route::get('training/edit/{id}','UsersController@trainingEdit');
  Route::any('training/update/{id}','UsersController@trainingUpdate');
  Route::any('training/delete/{id}','UsersController@trainingDelete');


  Route::get('trainer','UsersController@trainer');
  Route::get('trainer/add','UsersController@trainerAdd');
  Route::any('trainer/store','UsersController@trainerStore');
  Route::get('trainer/edit/{id}','UsersController@trainerEdit');
  Route::any('trainer/update/{id}','UsersController@trainerUpdate');
  Route::any('trainer/delete/{id}','UsersController@trainerDelete');






  Route::get('trainingSetting','UsersController@trainingSetting');
  Route::get('trainingSetting/add','UsersController@trainingSettingAdd');
  Route::any('trainingSetting/store','UsersController@trainingSettingStore');
  Route::get('trainingSetting/edit/{id}','UsersController@trainingSettingEdit');
  Route::any('trainingSetting/update/{id}','UsersController@trainingSettingUpdate');
  Route::any('trainingSetting/delete/{id}','UsersController@trainingSettingDelete');



    Route::get('category','UsersController@category');
  Route::get('category/add','UsersController@categoryAdd');
  Route::any('category/store','UsersController@categoryStore');
  Route::get('category/edit/{id}','UsersController@categoryEdit');
  Route::any('category/update/{id}','UsersController@categoryUpdate');
  Route::any('category/delete/{id}','UsersController@categoryDelete');

  /***********************************************************************/





  Route::any('user/update/{id}','UsersController@permstore');


  // for settings
  Route::get('settings/list','UsersController@settings');
  Route::get('settings/add','UsersController@settingsAdd');
  Route::any('settings/store','UsersController@settingsStore');
  Route::get('settings/edit/{id}','UsersController@settingsEdit');
  Route::any('settings/update/{id}','UsersController@settingsUpdate');
  Route::any('settings/delete/{id}','UsersController@settingsDelete');

  Route::get('subscription/list','SubscriptionSettingController@subscription');
  Route::get('subscription/add','SubscriptionSettingController@subscriptionAdd');
  Route::any('subscription/store','SubscriptionSettingController@subscriptionStore');
  Route::get('subscription/edit/{id}','SubscriptionSettingController@subscriptionEdit');
  Route::any('subscription/update/{id}','SubscriptionSettingController@subscriptionUpdate');
  Route::any('subscription/delete/{id}','SubscriptionSettingController@subscriptionDelete');
  Route::any('customer-detail/update/{id}','SubscriptionSettingController@customerUpdate');


  Route::any('customer-subscription/renew/{id}','SubscriptionSettingController@renew');
  Route::any('customer-subscription/agree/{id}','SubscriptionSettingController@agree');
  Route::any('customer-subscription/cancelled/{id}','SubscriptionSettingController@cancelled');

  Route::get('customer-subscription','SubscriptionSettingController@customerSubscription');  
  Route::any('customer-subscription-list','SubscriptionSettingController@customerSubscriptionList');  
  Route::any('customer-subscription-create/','SubscriptionSettingController@customerSubscriptionCreate');  
  Route::any('customer-subscription-store/','SubscriptionSettingController@customerSubscriptionStore');  
  Route::any('customer-subscription-edit/{id}','SubscriptionSettingController@customerSubscriptionEdit');  
  Route::any('customer-subscription-update/{id}','SubscriptionSettingController@customerSubscriptionUpdate');  
  Route::any('customer-subscription-delete/{id}','SubscriptionSettingController@customerSubscriptionDelete');

  Route::any('subscription-upload','SubscriptionSettingController@uploadFile');
  
  
  

  

  // For uploads file
  Route::any('uploads','UsersController@uploads');

  // For customer module
  Route::any('customer','UsersController@customerList');
  Route::any('cusomer2','UsersController@cusomer2');
  Route::any('customer/delete/{id}','UsersController@customerDelete');
  Route::any('customer/edit/{id}','UsersController@customerEdit');
  Route::any('customer/update/{id}','UsersController@customerUpdate');


  Route::any('info','UsersController@infoList');
  Route::any('info/{id}','UsersController@infoEdit');
  Route::any('info/update/{id}','UsersController@infoUpdate');
  Route::any('scheduling/delete/{id}','UsersController@schedulingDelete');


});

// Content Page Routes
Route::group(['prefix' => 'content'], function () {
  Route::get('grid','ContentController@gridContent')->name('content-grid');
  Route::get('typography','ContentController@typographyContent')->name('content-typography');
  Route::get('text-utilities','ContentController@textUtilitiesContent')->name('content-text-utilities');
  Route::get('syntax-highlighter','ContentController@contentSyntaxHighlighter')->name('content-syntax-highlighter');
  Route::get('helper-classes','ContentController@contentHelperClasses')->name('content-helper-classes');
  Route::get('colors','ContentController@colorContent')->name('content-colors');
});

// icons
Route::group(['prefix' => 'icons'], function () {
  Route::get('livicons','IconsController@liveIcons')->name('icons-livicons');
  Route::get('boxicons','IconsController@boxIcons')->name('icons-boxicons');
});

// card
Route::group(['prefix' => 'card'], function () {
  Route::get('basic','CardController@basicCard')->name('card-basic');
  Route::get('actions','CardController@actionCard')->name('card-actions');
  Route::get('widgets','CardController@widgets')->name('card-widgets');
});


// component route
Route::group(['prefix' => 'component'], function () {
  Route::get('alerts','ComponentController@alertComponenet')->name('component-alerts');
  Route::get('buttons-basic','ComponentController@buttonComponenet')->name('component-buttons-basic');
  Route::get('breadcrumbs','ComponentController@breadcrumbsComponenet')->name('component-breadcrumbs');
  Route::get('carousel','ComponentController@carouselComponenet')->name('component-carousel');
  Route::get('collapse','ComponentController@collapseComponenet')->name('component-collapse');
  Route::get('dropdowns','ComponentController@dropdownComponenet')->name('component-dropdowns');
  Route::get('list-group','ComponentController@listGroupComponenet')->name('component-list-group');
  Route::get('modals','ComponentController@modalComponenet')->name('component-modals');
  Route::get('pagination','ComponentController@paginationComponenet')->name('component-pagination');
  Route::get('navbar','ComponentController@navbarComponenet')->name('component-navbar');
  Route::get('tabs-component','ComponentController@tabsComponenet')->name('component-tabs-component');
  Route::get('pills-component','ComponentController@pillComponenet')->name('component-pills-component');
  Route::get('tooltips','ComponentController@tooltipsComponenet')->name('component-tooltips');
  Route::get('popovers','ComponentController@popoversComponenet')->name('component-popovers');
  Route::get('badges','ComponentController@badgesComponenet')->name('component-badges');
  Route::get('pill-badges','ComponentController@pillBadgesComponenet')->name('component-pill-badges');
  Route::get('progress','ComponentController@progressComponenet')->name('component-progress');
  Route::get('media-objects','ComponentController@mediaObjectComponenet')->name('component-media-objects');
  Route::get('spinner','ComponentController@spinnerComponenet')->name('component-spinner');
  Route::get('bs-toast','ComponentController@toastsComponenet')->name('component-bs-toast');
});

// extra component
Route::group(['prefix' => 'extra-component'], function () {
  Route::get('avatar','ExComponentController@avatarComponent')->name('extra-component-avatar');
  Route::get('chips','ExComponentController@chipsComponent')->name('extra-component-chips');
  Route::get('divider','ExComponentController@dividerComponent')->name('extra-component-divider');
});

// form elements
Route::group(['prefix' => 'form'], function () {
  Route::get('inputs','FormController@inputForm')->name('form-inputs');
  Route::get('input-groups','FormController@inputGroupForm')->name('form-input-groups');
  Route::get('number-input','FormController@numberInputForm')->name('form-number-input');
  Route::get('select','FormController@selectForm')->name('form-select');
  Route::get('radio','FormController@radioForm')->name('form-radio');
  Route::get('checkbox','FormController@checkboxForm')->name('form-checkbox');
  Route::get('switch','FormController@switchForm')->name('form-switch');
  Route::get('textarea','FormController@textareaForm')->name('form-textarea');
  Route::get('quill-editor','FormController@quillEditorForm')->name('form-quill-editor');
  Route::get('file-uploader','FormController@fileUploaderForm')->name('form-file-uploader');
  Route::get('date-time-picker','FormController@datePickerForm')->name('form-date-time-picker');
  Route::get('layout','FormController@formLayout')->name('form-layout');
  Route::get('wizard','FormController@formWizard')->name('form-wizard');
  Route::get('validation','FormController@formValidation')->name('form-validation');
  Route::get('repeater','FormController@formRepeater')->name('form-repeater');
});

// table route
Route::group(['prefix' => 'table'], function () {
  Route::get('','TableController@basicTable')->name('table');
  Route::get('extended','TableController@extendedTable')->name('table-extended');
  Route::get('datatable','TableController@dataTable')->name('table-datatable');
});

// page Route
Route::group(['prefix' => 'page'], function () {
  Route::get('user/profile','PageController@userProfilePage')->name('page-user-profile');
  Route::get('faq','PageController@faqPage')->name('page-faq');
  Route::get('knowledge-base','PageController@knowledgeBasePage')->name('page-knowledge-base');
  Route::get('knowledge-base/categories','PageController@knowledgeCatPage')->name('page-knowledge-base');
  Route::get('knowledge-base/categories/question','PageController@knowledgeQuestionPage')->name('page-knowledge-base');
  Route::get('search','PageController@searchPage')->name('page-search');
  Route::get('account-settings','PageController@accountSettingPage')->name('page-account-settings');
});

// Authentication  Route
Route::group(['prefix' => 'auth'], function () {
  Route::get('login','AuthenticationController@loginPage')->name('auth-login');
  Route::get('register','AuthenticationController@registerPage')->name('auth-register');
  Route::get('forgot-password','AuthenticationController@forgetPasswordPage')->name('auth-forgot-password');
  Route::get('reset-password','AuthenticationController@resetPasswordPage')->name('auth-reset-password');
  Route::get('lock-screen','AuthenticationController@authLockPage')->name('auth-lock-screen');
});

// Miscellaneous
Route::group(['prefix' => 'misc'], function () {
  Route::get('coming-soon','MiscellaneousController@comingSoonPage')->name('misc-coming-soon');
  Route::get('error-404','MiscellaneousController@error404Page')->name('misc-error-404');
  Route::get('error-500','MiscellaneousController@error500Page')->name('misc-error-500');
  Route::get('not-authorized','MiscellaneousController@notAuthPage')->name('misc-not-authorized');
  Route::get('maintenance','MiscellaneousController@maintenancePage')->name('misc-maintenance');
});

// Charts Route
Route::group(['prefix' => 'chart'], function () {
  Route::get('apex','ChartController@apexChart')->name('chart-apex');
  Route::get('chartjs','ChartController@chartJs')->name('chart-chartjs');
  Route::get('chartist','ChartController@chartist')->name('chart-chartist');
});

 Route::get('maps/leaflet','ChartController@leafletMap')->name('maps-leaflet');

// extension route
Route::group(['prefix' => 'extension'], function () {
  Route::get('sweet-alerts','ExtensionsController@sweetAlert')->name('extension-sweet-alerts');
  Route::get('toastr','ExtensionsController@toastr')->name('extension-toastr');
  Route::get('noui-slider','ExtensionsController@noUiSlider')->name('extension-noui-slider');
  Route::get('drag-drop','ExtensionsController@dragComponent')->name('extension-drag-drop');
  Route::get('tour','ExtensionsController@tourComponent')->name('extension-tour');
  Route::get('swiper','ExtensionsController@swiperComponent')->name('extension-swiper');
  Route::get('treeview','ExtensionsController@treeviewComponent')->name('extension-treeview');
  Route::get('block-ui','ExtensionsController@blockUIComponent')->name('extension-block-ui');
  Route::get('media-player','ExtensionsController@mediaComponent')->name('extension-media-player');
  Route::get('miscellaneous','ExtensionsController@miscellaneous')->name('extension-miscellaneous');
  Route::get('locale','ExtensionsController@locale')->name('extension-locale');
  Route::get('ratings','ExtensionsController@ratings')->name('extension-ratings');
});

// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap'])->name('lang-locale');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
