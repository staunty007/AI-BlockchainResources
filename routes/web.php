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
Auth::routes();

Route::get('/','User\JobController@index')->name('welcome');
Route::get('/about', 'User\JobController@about')->name('about');
Route::get('/contact', 'User\JobController@contact')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('job/{job}','User\JobController@job')->name('job');
Route::get('jobs','User\JobController@jobs')->name('jobs');
Route::get('myresume','User\JobController@resume')->name('job.resume');
Route::post('myresume','User\JobController@uploadResume');
Route::post('job/apply/{id}','User\JobController@apply')->name('job.apply');
Route::get('myresume/public/resume/{filename}','User\JobController@pdf');

Route::get('user/profile', 'User\UserController@show')->name('user.profile.show');
Route::get('user/profile/{user}/edit', 'User\UserController@edit')->name('user.profile.edit');
Route::put('user/profile/{user}', 'User\UserController@update')->name('user.profile.update');

Route::resource('admin/category','Admin\CategoryController');
Route::resource('admin/user','Admin\UserController');
Route::resource('admin/role','Admin\RoleController');
Route::resource('admin/permission','Admin\PermissionController');

Route::get('admin/profile', 'AdminController@profileShow')->name('admin.profile.show');
Route::get('admin/profile/{user}/edit', 'AdminController@profileEdit')->name('admin.profile.edit');
Route::put('admin/profile/{user}', 'AdminController@profileUpdate')->name('admin.profile.update');

Route::get('admin/home', 'AdminController@index')->name('admin.home');

//For Freelancers
Route::get('admin/freelancers', 'AdminController@freelancers')->name('admin.freelancers');

Route::put('admin/freelancers/{id}', 'AdminController@resetFreelancerPass')->name('admin.freelancers.reset-password');

Route::get('admin/freelancer/posts/{id}','AdminController@freelancePosts')->name('admin.freelancer.posts');

Route::post('admin/publish_post/{id}', 'AdminController@publishPost')->name('admin.publish_post');
Route::post('admin/unpublish_post/{id}', 'AdminController@unpublishPost')->name('admin.unpublish_post');

Route::post('admin/freelancedisable/{id}', 'AdminController@freelanceDisable')->name('admin.freelancedisable');
Route::post('admin/freelanceenable/{id}', 'AdminController@freelanceEnable')->name('admin.freelanceenable');

//For Employers
Route::get('admin/employers/employerinfo/{id}', 'AdminController@companyInfo')->name('admin.employers.employerinfo');
Route::get('admin/employer/applicants/{job}','AdminController@viewApplicants')->name('admin.employer.applicants');
Route::get('admin/employers', 'AdminController@employers')->name('admin.employers');

Route::put('admin/employers/{id}', 'AdminController@resetEmployerPass')->name('admin.employers.reset-password');

Route::post('admin/employerdisable/{id}', 'AdminController@employerDisable')->name('admin.employerdisable');
Route::post('admin/employerenable/{id}', 'AdminController@employerEnable')->name('admin.employerenable');

//For Applicants
Route::get('admin/applicants', 'AdminController@applicants')->name('admin.applicants');

Route::put('admin/applicants/{id}', 'AdminController@resetApplicantPass')->name('admin.applicants.reset-password');

Route::post('admin/applicantdisable/{id}', 'AdminController@applicantDisable')->name('admin.applicantdisable');
Route::post('admin/applicantenable/{id}', 'AdminController@applicantEnable')->name('admin.applicantenable');

Route::post('admin/login','Admin\LoginController@login');
Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');

//Route::get('/logout','Admin\LoginController@logout')->name('admin.logout');

Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Employers
Route::get('employer/home', 'EmployerController@index')->name('employer.home');
Route::get('employer/user', 'EmployerController@show')->name('employer.user.show');
Route::get('employer/user/{user}/edit', 'EmployerController@edit')->name('employer.user.edit');
Route::put('employer/user/{user}', 'EmployerController@update')->name('employer.user.update');

Route::group(['namespace' => 'Employer'], function(){

Route::post('employer/login','LoginController@login');
Route::get('employer/login','LoginController@showLoginForm')->name('employer.login');
//Route::get('/logout','LoginController@logout')->name('employer.logout');

Route::post('employer/register','RegisterController@register');
Route::get('employer/register','RegisterController@showRegistrationForm')->name('employer.register');

Route::post('employer-password/email','ForgotPasswordController@sendResetLinkEmail')->name('employer.password.email');
Route::get('admin-password/reset','ForgotPasswordController@showLinkRequestForm')->name('employer.password.request');
Route::post('employer-password/reset','ResetPasswordController@reset');
Route::get('employer-password/reset/{token}','ResetPasswordController@showResetForm')->name('employer.password.reset');

Route::get('verifyEmployerEmailFirst','RegisterController@verifyEmailFirst')->name('verifyEmployerEmailFirst');

Route::get('verifyEmployer/{email}/{verifyToken}','RegisterController@sendEmployerEmailDone')->name('sendEmployerEmailDone');

Route::resource('employer/job','JobController');
Route::get('employer/applicants/{job}','JobController@viewApplicants')->name('employer.applicants');

});


//Freelance
Route::resource('freelance/post','Freelancer\PostController');
Route::resource('freelance/tag','Freelancer\TagController');

Route::get('freelance/home','FreelancerController@index')->name('freelance.home');
Route::get('freelance/user', 'FreelancerController@show')->name('freelance.user.show');
Route::get('freelance/user/{user}/edit', 'FreelancerController@edit')->name('freelance.user.edit');
Route::put('freelance/user/{user}', 'FreelancerController@update')->name('freelance.user.update');

Route::post('freelance/login','Freelancer\LoginController@login');
Route::get('freelance/login','Freelancer\LoginController@showLoginForm')->name('freelance.login');
//Route::get('/logout','LoginController@logout')->name('employer.logout');

Route::post('freelance/register','Freelancer\RegisterController@register');
Route::get('freelance/register','Freelancer\RegisterController@showRegistrationForm')->name('freelance.register');

Route::get('verifyFreelancerEmailFirst','Freelancer\RegisterController@verifyEmailFirst')->name('verifyFreelancerEmailFirst');

Route::get('verifyFreelancer/{email}/{verifyToken}','Freelancer\RegisterController@sendFreelancerEmailDone')->name('sendFreelancerEmailDone');


Route::get('article/{post}','PostController@post')->name('article');
Route::get('articles','PostController@article')->name('articles');
Route::get('/tag/{tag}','PostController@tag')->name('tags');
