<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/testapihoc', function () {
//     return view('resultapi.api');
// });

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
  ]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {

//User routes
    Route::get('/users',[
        'uses'  => 'UserController@index',
        'as'    => 'users'
    ]);

    Route::get('/user/create',[
        'uses'  => 'UserController@create',
        'as'    => 'user.create'
    ]);

    Route::post('/user/update/{id}',[
        'uses'  => 'UserController@update',
        'as'    => 'user.update'
    ]);

    Route::get('/user/edit/{id}',[
        'uses' => 'UserController@edit',
        'as'   => 'user.edit'
    ]);

    Route::post('/user/store',[
        'uses'  => 'UserController@store',
        'as'    => 'user.store'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UserController@destroy',
        'as'   => 'user.delete'
    ]);

    Route::get('/userchangerole/{id}',[
        'uses' => 'UserController@changerole',
        'as'   => 'user.changerole'
    ]);
//

//Profession routes
    Route::get('/professions',[
        'uses'  => 'ProfessionController@index',
        'as'    => 'professions'
    ]);

    Route::get('/profession/create',[
        'uses'  => 'ProfessionController@create',
        'as'    => 'profession.create'
    ]);

    Route::post('/profession/update/{id}',[
        'uses'  => 'ProfessionController@update',
        'as'    => 'profession.update'
    ]);

    Route::get('/profession/edit/{id}',[
        'uses' => 'ProfessionController@edit',
        'as'   => 'profession.edit'
    ]);

    Route::post('/profession/store',[
        'uses'  => 'ProfessionController@store',
        'as'    => 'profession.store'
    ]);

    // Route::get('/profession/delete/{id}',[
    //     'uses' => 'ProfessionController@destroy',
    //     'as'   => 'profession.delete'
    // ]);
//

//User (user profile) routes
Route::get('user/profile', [
    'uses' => 'UserProfileController@index',
    'as' => 'user.profile'
]);

Route::get('user/profile/edit', [
    'uses' => 'UserProfileController@edit',
    'as' => 'user.profile.edit'
]);

Route::post('user/profile/update/{id}', [
    'uses' => 'UserProfilecontroller@update',
    'as' => 'user.profile.update'
]);

Route::get('user/profile/changepassword', [
    'uses' => 'UserProfileController@changepassword',
    'as' => 'user.profile.changepassword'
]);

Route::post('user/profile/updatepassword/{id}', [
    'uses' => 'UserProfileController@updatepassword',
    'as' => 'user.profile.updatepassword'
]);
//


//Coach routes
    Route::get('/coaches',[
        'uses'  => 'CoachController@index',
        'as'    => 'coaches'
    ]);

    Route::get('/coach/create',[
        'uses'  => 'CoachController@create',
        'as'    => 'coach.create'
    ]);

    Route::post('/coach/update/{id}',[
        'uses'  => 'CoachController@update',
        'as'    => 'coach.update'
    ]);

    Route::get('/coach/edit/{id}',[
        'uses' => 'CoachController@edit',
        'as'   => 'coach.edit'
    ]);

    Route::post('/coach/store',[
        'uses'  => 'CoachController@store',
        'as'    => 'coach.store'
    ]);

    // Route::get('/coach/delete/{id}',[
    //     'uses' => 'CoachController@destroy',
    //     'as'   => 'coach.delete'
    // ]);
//


//Salesperson routes
    Route::get('/salespersons',[
        'uses'  => 'SalespersonController@index',
        'as'    => 'salespersons'
    ]);

    Route::get('/salesperson/create',[
        'uses'  => 'SalespersonController@create',
        'as'    => 'salesperson.create'
    ]);

    Route::post('/salesperson/update/{id}',[
        'uses'  => 'SalespersonController@update',
        'as'    => 'salesperson.update'
    ]);

    Route::get('/salesperson/edit/{id}',[
        'uses' => 'SalespersonController@edit',
        'as'   => 'salesperson.edit'
    ]);

    Route::post('/salesperson/store',[
        'uses'  => 'SalespersonController@store',
        'as'    => 'salesperson.store'
    ]);

    // Route::get('/salesperson/delete/{id}',[
    //     'uses' => 'SalespersonController@destroy',
    //     'as'   => 'salesperson.delete'
    // ]);
//


//Know routes
    Route::get('/knows',[
        'uses'  => 'KnowController@index',
        'as'    => 'knows'
    ]);

    Route::get('/know/create',[
        'uses'  => 'KnowController@create',
        'as'    => 'know.create'
    ]);

    Route::post('/know/update/{id}',[
        'uses'  => 'KnowController@update',
        'as'    => 'know.update'
    ]);

    Route::get('/know/edit/{id}',[
        'uses' => 'KnowController@edit',
        'as'   => 'know.edit'
    ]);

    Route::post('/know/store',[
        'uses'  => 'KnowController@store',
        'as'    => 'know.store'
    ]);


//Jobconnector routes
    Route::get('/jobconnectors',[
        'uses'  => 'JobconnectorController@index',
        'as'    => 'jobconnectors'
    ]);

    Route::get('/jobconnector/create',[
        'uses'  => 'JobconnectorController@create',
        'as'    => 'jobconnector.create'
    ]);

    Route::post('/jobconnector/update/{id}',[
        'uses'  => 'JobconnectorController@update',
        'as'    => 'jobconnector.update'
    ]);

    Route::get('/jobconnector/edit/{id}',[
        'uses' => 'JobconnectorController@edit',
        'as'   => 'jobconnector.edit'
    ]);

    Route::post('/jobconnector/store',[
        'uses'  => 'JobconnectorController@store',
        'as'    => 'jobconnector.store'
    ]);

    // Route::get('/jobconnector/delete/{id}',[
    //     'uses' => 'JobconnectorController@destroy',
    //     'as'   => 'jobconnector.delete'
    // ]);
//


//Branch routes
    Route::get('/branches',[
        'uses'  => 'BranchController@index',
        'as'    => 'branches'
    ]);

    Route::get('/branch/create',[
        'uses'  => 'BranchController@create',
        'as'    => 'branch.create'
    ]);

    Route::post('/branch/update/{id}',[
        'uses'  => 'BranchController@update',
        'as'    => 'branch.update'
    ]);

    Route::get('/branch/edit/{id}',[
        'uses' => 'BranchController@edit',
        'as'   => 'branch.edit'
    ]);

    Route::post('/branch/store',[
        'uses'  => 'BranchController@store',
        'as'    => 'branch.store'
    ]);

    // Route::get('/branch/delete/{id}',[
    //     'uses' => 'BranchController@destroy',
    //     'as'   => 'branch.delete'
    // ]);
//


//Programnames routes
    Route::get('/programnames',[
        'uses'  => 'ProgramnameController@index',
        'as'    => 'programnames'
    ]);

    Route::get('/programname/create',[
        'uses'  => 'ProgramnameController@create',
        'as'    => 'programname.create'
    ]);

    Route::post('/programname/update/{id}',[
        'uses'  => 'ProgramnameController@update',
        'as'    => 'programname.update'
    ]);

    Route::get('/programname/edit/{id}',[
        'uses' => 'ProgramnameController@edit',
        'as'   => 'programname.edit'
    ]);

    Route::post('/programname/store',[
        'uses'  => 'ProgramnameController@store',
        'as'    => 'programname.store'
    ]);


//Program routes
    Route::get('/programs',[
        'uses'  => 'ProgramController@index',
        'as'    => 'programs'
    ]);

    Route::get('/program/create',[
        'uses'  => 'ProgramController@create',
        'as'    => 'program.create'
    ]);

    Route::post('/program/update/{id}',[
        'uses'  => 'ProgramController@update',
        'as'    => 'program.update'
    ]);

    Route::get('/program/edit/{id}',[
        'uses' => 'ProgramController@edit',
        'as'   => 'program.edit'
    ]);

    Route::post('/program/store',[
        'uses'  => 'ProgramController@store',
        'as'    => 'program.store'
    ]);

    // Route::get('/program/delete/{id}',[
    //     'uses' => 'ProgramController@destroy',
    //     'as'   => 'program.delete'
    // ]);
//


//Programcategory routes
    Route::get('/programcategories',[
        'uses'  => 'ProgramcategoryController@index',
        'as'    => 'programcategories'
    ]);

    Route::get('/programcategory/create',[
        'uses'  => 'ProgramcategoryController@create',
        'as'    => 'programcategory.create'
    ]);

    Route::post('/programcategory/update/{id}',[
        'uses'  => 'ProgramcategoryController@update',
        'as'    => 'programcategory.update'
    ]);

    Route::get('/programcategory/edit/{id}',[
        'uses' => 'ProgramcategoryController@edit',
        'as'   => 'programcategory.edit'
    ]);

    Route::post('/programcategory/store',[
        'uses'  => 'ProgramcategoryController@store',
        'as'    => 'programcategory.store'
    ]);

    // Route::get('/programcategory/delete/{id}',[
    //     'uses' => 'ProgramcategoryController@destroy',
    //     'as'   => 'programcategory.delete'
    // ]);
//


//CoachProgram routes
    Route::get('/coachprograms',[
        'uses'  => 'CoachProgramController@index',
        'as'    => 'coachprograms'
    ]);

    // Route::get('/coachprogram/create',[
    //     'uses'  => 'CoachProgramController@create',
    //     'as'    => 'coachprogram.create'
    // ]);

    Route::post('/coachprogram/update/{id}',[
        'uses'  => 'CoachProgramController@update',
        'as'    => 'coachprogram.update'
    ]);

    Route::get('/coachprogram/edit/{id}',[
        'uses' => 'CoachProgramController@edit',
        'as'   => 'coachprogram.edit'
    ]);

    // Route::post('/coachprogram/store',[
    //     'uses'  => 'CoachProgramController@store',
    //     'as'    => 'coachprogram.store'
    // ]);

    Route::get('/coachprogram/detail/{id}',[
        'uses' => 'CoachProgramController@detail',
        'as'   => 'coachprogram.detail'
    ]);

    // Route::get('/coachprogram/delete/{id}',[
    //     'uses' => 'CoachProgramController@destroy',
    //     'as'   => 'coachprogram.delete'
    // ]);
//


//Participant routes
    Route::get('/participants',[
        'uses'  => 'ParticipantController@index',
        'as'    => 'participants'
    ]);

    Route::get('/participant/create',[
        'uses'  => 'ParticipantController@create',
        'as'    => 'participant.create'
    ]);

    Route::post('/participant/update/{id}',[
        'uses'  => 'ParticipantController@update',
        'as'    => 'participant.update'
    ]);

    Route::get('/participant/edit/{id}',[
        'uses' => 'ParticipantController@edit',
        'as'   => 'participant.edit'
    ]);

    Route::post('/participant/store',[
        'uses'  => 'ParticipantController@store',
        'as'    => 'participant.store'
    ]);

//     Route::get('/participant/delete/{id}',[
//         'uses' => 'ParticipantController@destroy',
//         'as'   => 'participant.delete'
//     ]);

    Route::get('/participant/fetchknow',[
        'uses'  => 'ParticipantController@fetchknow',
        'as'    => 'participant.fetchknow'
    ]);

    Route::get('/participant/fetchbranch',[
        'uses'  => 'ParticipantController@fetchbranch',
        'as'    => 'participant.fetchbranch'
    ]);

    Route::get('/participant/fetchprofession',[
        'uses'  => 'ParticipantController@fetchprofession',
        'as'    => 'participant.fetchprofession'
    ]);

// //


//Reference routes
    Route::get('/references/{id}',[
        'uses'  => 'ReferenceController@index',
        'as'    => 'references'
    ]);
    Route::get('/reference/{id}/create',[
        'uses'  => 'ReferenceController@create',
        'as'    => 'reference.create'
    ]);
    Route::post('/reference/update/{id}',[
        'uses'  => 'ReferenceController@update',
        'as'    => 'reference.update'
    ]);

    Route::get('/reference/edit/{id}/{participantid}',[
        'uses' => 'ReferenceController@edit',
        'as'   => 'reference.edit'
    ]);

    Route::post('/reference/store',[
        'uses'  => 'ReferenceController@store',
        'as'    => 'reference.store'
    ]);

    Route::get('/reference/delete/{id}',[
        'uses' => 'ReferenceController@destroy',
        'as'   => 'reference.delete'
    ]);
//


//Interest routes
    Route::get('/interests/{id}',[
        'uses'  => 'InterestController@index',
        'as'    => 'interests'
    ]);
    Route::get('/interest/{id}/create',[
        'uses'  => 'InterestController@create',
        'as'    => 'interest.create'
    ]);
    Route::post('/interest/update/{id}',[
        'uses'  => 'InterestController@update',
        'as'    => 'interest.update'
    ]);

    Route::get('/interest/edit/{id}',[
        'uses' => 'InterestController@edit',
        'as'   => 'interest.edit'
    ]);

    Route::post('/interest/store',[
        'uses'  => 'InterestController@store',
        'as'    => 'interest.store'
    ]);

    Route::get('/interest/delete/{id}',[
        'uses' => 'InterestController@destroy',
        'as'   => 'interest.delete'
    ]);
//


//Transaction routes
    Route::get('/transactions',[
        'uses'  => 'TransactionController@index',
        'as'    => 'transactions'
    ]);
    Route::get('/transaction/create',[
        'uses'  => 'TransactionController@create',
        'as'    => 'transaction.create'
    ]);

    Route::get('/transaction/fetch',[
        'uses'  => 'TransactionController@fetch',
        'as'    => 'transaction.fetch'
    ]);

    Route::post('/transaction/update/{id}',[
        'uses'  => 'TransactionController@update',
        'as'    => 'transaction.update'
    ]);

    Route::get('/transaction/edit/{id}',[
        'uses' => 'TransactionController@edit',
        'as'   => 'transaction.edit'
    ]);

    Route::post('/transaction/store',[
        'uses'  => 'TransactionController@store',
        'as'    => 'transaction.store'
    ]);

    Route::get('/transaction/delete/{id}',[
        'uses' => 'TransactionController@destroy',
        'as'   => 'transaction.delete'
    ]);
//


//ResultById Routes
    Route::get('/resultbyid/{id}',[
        'uses'  => 'ResultByIdController@index',
        'as'    => 'resultbyid'
    ]);
    Route::get('/resultbyid/{id}/create',[
        'uses'  => 'ResultByIdController@create',
        'as'    => 'resultbyid.create'
    ]);
    Route::post('/resultbyid/update/{id}',[
        'uses'  => 'ResultByIdController@update',
        'as'    => 'resultbyid.update'
    ]);

    Route::get('/resultbyid/edit/{id}',[
        'uses' => 'ResultByIdController@edit',
        'as'   => 'resultbyid.edit'
    ]);

    Route::post('/resultbyid/store',[
        'uses'  => 'ResultByIdController@store',
        'as'    => 'resultbyid.store'
    ]);

    // Route::get('/resultbyid/delete/{id}',[
    //     'uses' => 'ResultByIdController@destroy',
    //     'as'   => 'resultbyid.delete'
    // ]);
//


//JobConnectorParticipant Routes
    Route::get('/jobconnectorparticipants',[
        'uses'  => 'JobConnectorParticipantController@index',
        'as'    => 'jobconnectorparticipants'
    ]);

    Route::get('/jobconnectorparticipant/create',[
        'uses'  => 'JobConnectorParticipantController@create',
        'as'    => 'jobconnectorparticipant.create'
    ]);

    Route::post('/jobconnectorparticipant/update/{id}',[
        'uses'  => 'JobConnectorParticipantController@update',
        'as'    => 'jobconnectorparticipant.update'
    ]);

    Route::get('/jobconnectorparticipant/edit/{id}',[
        'uses' => 'JobConnectorParticipantController@edit',
        'as'   => 'jobconnectorparticipant.edit'
    ]);

    Route::post('jobconnectorparticipant/store',[
        'uses'  => 'JobConnectorParticipantController@store',
        'as'    => 'jobconnectorparticipant.store'
    ]);

    Route::get('/jobconnectorparticipant/delete/{id}',[
        'uses' => 'JobConnectorParticipantController@destroy',
        'as'   => 'jobconnectorparticipant.delete'
    ]);
//

//Report Routes
    Route::get('/reports', [
        'uses' => 'ReportController@index',
        'as'   => 'reports'
    ]);
    Route::get('/report/{id}', [
        'uses' => 'ReportController@detail',
        'as'   => 'report.detail'
    ]);

});