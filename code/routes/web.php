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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','Admin@index');
Route::get('/admin/exam_categry','Admin@exam_category');
Route::post('/admin/add_new_category','Admin@add_new_category');
Route::get('/admin/delete_category/{id}','Admin@delete_category');
Route::get('/admin/edit_category/{id}','Admin@edit_category');
Route::post('admin/edit_new_category','Admin@edit_new_category');
Route::get('/admin/category_status/{id}','Admin@category_status');
Route::get('/admin/manage_exam','Admin@manage_exam');
Route::post('admin/add_new_exam','Admin@add_new_exam');
Route::get('/admin/exam_status/{id}','Admin@exam_status');
Route::get('/admin/delete_exam/{id}','Admin@delete_exam');
Route::get('/admin/edit_exam/{id}','Admin@edit_exam');
Route::post('/admin/edit_exam_sub','Admin@edit_exam_sub');
Route::get('admin/manage_students','Admin@manage_students');
Route::post('/admin/add_new_students','Admin@add_new_students');

Route::get('/admin/student_status/{id}','Admin@student_status');
Route::get('admin/delete_students/{id}','Admin@delete_students');
Route::get('admin/edit_students/{id}','Admin@edit_students');
Route::post('admin/edit_students_final','Admin@edit_students_final');
Route::get('admin/manage_portal','Admin@manage_portal');
Route::post('admin/add_new_portal','Admin@add_new_portal');
Route::get('/admin/portal_status/{id}','Admin@portal_status');
Route::get('/admin/delete_portal/{id}','Admin@delete_portal');
Route::get('/admin/edit_portal/{id}','Admin@edit_portal');
Route::post('/admin/edit_portal_sub','Admin@edit_portal_sub');
Route::get('admin/add_question/{id}','Admin@add_question');
Route::post('admin/add_new_question','Admin@add_new_question');
Route::get('admin/question_status/{id}','Admin@question_status');
Route::get('admin/delete_question/{id}','Admin@delete_question');
Route::get('/admin/update_question/{id}','Admin@update_question');
Route::post('/admin/edit_question_inner','Admin@edit_question_inner');
/*Portal*/
Route::get('portal/signup','PortalController@portal_singup');
Route::post('portal/signup_sub','PortalController@signup_sub');

Route::get('portal/login','PortalController@login');
Route::post('portal/login_sub','PortalController@login_sub');

Route::get('portal/dashboard','PortalOOperation@dashboard');
Route::get('portal/exam_from/{id}','PortalOOperation@exam_from');
Route::post('portal/exam_from_submit','PortalOOperation@exam_from_submit');
Route::get('portal/print/{id}','PortalOOperation@print');
Route::get('portal/update_form','PortalOOperation@update_form');
Route::get('portal/student_exam_info','PortalOOperation@student_exam_info');
Route::post('portal/student_exam_info_edit','PortalOOperation@student_exam_info_edit');
Route::get('portal/logout','PortalOOperation@logout');
Route::get('student/signup','StudentController@signup');
Route::post('student/login_sub','StudentController@login_sub');
Route::get('student/dashboard','StudentOperation@dashboard');
Route::get('student/logout','StudentOperation@logout');
Route::get('student/exam','StudentOperation@exam');
Route::get('student/join_exam/{id}','StudentOperation@join_exam');
Route::post('student/submit_question','StudentOperation@submit_question');

Route::get('student/show_result/{id}','StudentOperation@show_result');
