<?php



Route::get('/',					['as' => 'login', 'uses' => 'UserController@getLogin']);
Route::post('/admin', 			['as' => 'asignin', 'uses' => 'UserController@postLogin']); 

Route::get('/studentlogin',		['as' => 'studlogin', 'uses' => 'UserController@getStudentLogin']);
Route::post('/student', 		['as' => 'ssignin', 'uses' => 'UserController@postStudentLogin']); 
Route::get('/student',			['as' => 'viewgrades', 'uses' => 'StudentController@getViewGrades']);

Route::group(['before' => 'auth'], function() {
	Route::get('/admin', 			['as' => 'amain', 'uses' => 'UserController@getMain']); // Redirects to if Admin
	(( Auth::check() && Auth::user()->type == 1) ? Route::get('/admin/search', 	['as' => 'asearch', 'uses' => 'AdminController@getSearch'])
	 : Route::get('/professor/search', ['as' => 'psearch', 'uses' => 'AdminController@getSearch']));
	((Auth::check() && Auth::user()->type == 1) ? Route::post('/admin/search', 	['before' => 'csrf','as' => 'asearchresults', 'uses' => 'AdminController@postSearch'])
	 : Route::post('/professor/search', 	['before' => 'csrf','as' => 'psearchresults', 'uses' => 'AdminController@postSearch']));
	Route::get('/admin/subjects', 	['as' => 'asubjects', 'uses' => 'AdminController@getSubjects']);
	Route::post('/admin/subjects', 	['before' => 'csrf', 'as' => 'aaddsub', 'uses' => 'AdminController@postAddSubject']);
	Route::delete('/admin/subjects/{id}', ['before' => 'csrf', 'as' => 'deletesubject', 'uses' => 'AdminController@deleteSubject']);
	Route::put('/admin/subjects/{id}', ['before' => 'csrf', 'as' => 'updatesubject', 'uses' => 'AdminController@updateSubject']);

	Route::get('/admin/rooms', 		['as' => 'arooms', 'uses' => 'AdminController@getRooms']);
	Route::post('/admin/rooms', 	['before' => 'csrf', 'as' => 'aaddroom', 'uses' => 'AdminController@postAddRoom']);
	Route::delete('/admin/rooms/{id}', ['before' => 'csrf', 'as' => 'deleteroom', 'uses' => 'AdminController@deleteRoom']);
	Route::put('/admin/rooms/{id}', ['before' => 'csrf', 'as' => 'updateroom', 'uses' => 'AdminController@updateRoom']);

	
	Route::get('/admin/yrsections', ['as' => 'ayrsections', 'uses' => 'AdminController@getYrSections']);
	Route::post('/admin/yrsections',['before' => 'csrf', 'as' => 'aaddyrsection', 'uses' => 'AdminController@postAddYrSection']);
	Route::delete('/admin/yrsections/{id}', ['before' => 'csrf', 'as' => 'deleteyrsection', 'uses' => 'AdminController@deleteYrSection']);
	Route::put('/admin/yrsections/{id}', ['before' => 'csrf', 'as' => 'updateyrsection', 'uses' => 'AdminController@updateYrSection']);


	Route::get('/admin/courses', 	['as' => 'acourses', 'uses' => 'AdminController@getCourses']);
	Route::post('/admin/courses',	['before' => 'csrf', 'as' => 'aaddcourse', 'uses' => 'AdminController@postAddCourse']);
	Route::delete('/admin/courses/{id}',['before' => 'csrf', 'as' => 'deletecourse', 'uses' => 'AdminController@deleteCourse']);
	Route::put('/admin/courses/{id}',['before' => 'csrf', 'as' => 'updatecourse', 'uses' => 'AdminController@updateCourse']);


	Route::get('/admin/students', 	['as' => 'astudents', 'uses' => 'AdminController@getStudents']);
	Route::post('/admin/students/create', 	['before' => 'csrf', 'as' => 'aaddstudent', 'uses' => 'AdminController@postAddStudents']);
	Route::get('/admin/students/create', 	['as' => 'acreatestudent', 'uses' => 'AdminController@getStudentsCreate']);
	Route::delete('/admin/students/{id}', 	['before' => 'csrf', 'as' => 'deletestudent', 'uses' => 'AdminController@deleteStudent']);
	

	Route::get('/admin/students/{id}/edit', ['as' => 'astudentsenroll', 'uses' => 'AdminController@getStudentsEnroll']);
	Route::post('/admin/students/{id}/edit', ['as' => 'aaddstudentenroll', 'uses' => 'AdminController@postAddStudentEnroll']);
	Route::delete('/admin/students/{id}/edit',['before' => 'csrf', 'as' => 'deletestudentenroll', 'uses' => 'AdminController@deleteStudentsEnroll']);
	Route::put('/admin/students/{id}/edit', ['as' => 'updatestudent', 'uses' => 'AdminController@updateStudent']);
	

	Route::get('/admin/admins', 	['as' => 'aadmins', 'uses' => 'AdminController@getAdmins']);
	Route::post('/admin/admins', 	['before' => 'csrf', 'as' => 'aaddadmins', 'uses' => 'AdminController@postAddAdmins']);
	Route::delete('/admin/admins/{id}',['before' => 'csrf', 'as' => 'deleteadmin', 'uses' => 'AdminController@deleteAdmin']);
	Route::put('/admin/admins/{id}', ['as' => 'updateadmin', 'uses' => 'AdminController@updateAdmin']);
	

	Route::get('/admin/admins/create', 	['as' => 'acreateadmin', 'uses' => 'AdminController@getAdminsCreate']);
	// admin/professors : professor/professors
	(( Auth::check() && Auth::user()->type == 1) ? Route::get('/admin/professors', ['as' => 'aprofessors', 'uses' => 'AdminController@getProfessors'])
	 : Route::get('/professor/professors', ['as' => 'pprofessors', 'uses' => 'AdminController@getProfessors']));
	
	// professor's task
	(( Auth::check() && Auth::user()->type == 1) ? Route::get('/admin/professors/{id}/edit', ['as' => 'aprofessorstasks', 'uses' => 'AdminController@getProfessorsTasks'])
	 : Route::get('/professor/professors/{id}', ['as' => 'pprofessorstasks', 'uses' => 'AdminController@getProfessorsTasks']));
	Route::post('/admin/professors/{id}/edit', ['as' => 'aaddprofessortask', 'uses' => 'AdminController@postAddProfessorsTasks']);
	
	Route::delete('/admin/professors/{id}', ['as' => 'deleteprof', 'uses' => 'AdminController@deleteProf']);
	Route::delete('/admin/professors/{id}/edit', ['as' => 'deleteproftasks', 'uses' => 'AdminController@deleteProfTasks']);
	Route::put('/admin/professors/{id}/edit', ['as' => 'updateprof', 'uses' => 'AdminController@updateProf']);
	
	Route::put('/admin/professors/lock/{id}', ['as' => 'enableencode', 'uses' => 'AdminController@updateLock']);
	

	// admin's task
	Route::get('/admin/admins/{id}', ['as' => 'aadminstasks', 'uses' => 'AdminController@getAdminsTasks']);
	

	//Route::post('/admin/professors',['before' => 'csrf', 'as' => 'aaddadmins', 'uses' => 'AdminController@postAddProfessors']);
	Route::get('/admin/professors/create', ['as' => 'acreateprof', 'uses' => 'AdminController@getProfessorsCreate']);
	Route::post('/admin/professors/create',['before' => 'csrf', 'as' => 'aaddprof', 'uses' => 'AdminController@postAddProfessors']);


	Route::get('/admin/users', 		['as' => 'ausers', 'uses' => 'AdminController@getUsers']);
	Route::post('/admin/users', 	['before' => 'csrf', 'as' => 'aadduser', 'uses' => 'AdminController@postAddUser']);	
	Route::delete('/admin/users/{id}',['before' => 'csrf', 'as' => 'deleteuser', 'uses' => 'AdminController@deleteUser']);


	Route::get('/admin/grades', 	['as' => 'agrades', 'uses' => 'AdminController@getGrades']);

	Route::get('/professor',		['as' => 'pmain', 'uses' =>'UserController@getMain']); // Redirects to if Professor
	
	Route::get('/professor/encode',	['as' => 'pencode', 'uses' =>'ProfessorController@getEncode']); 
	Route::post('/professor/encode',['as' => 'psectionstoencode', 'uses' =>'ProfessorController@postEncode']); 
	
	Route::post('/professor/encode',['as' => 'psectionstoencode', 'uses' =>'ProfessorController@postEncode']); 
	Route::post('/professor/encode/{id}', ['as' => 'paddstudentgrade', 'uses' => 'ProfessorController@postStudentGrade']);

	Route::get('/professor/scheds',	['as' => 'pscheds', 'uses' =>'ProfessorController@getScheds']); 
	//Route::get('/professor/search',	['as' => 'psearch', 'uses' =>'ProfessorController@getSearch']); 
	Route::get('/professor/submit',	['as' => 'psubmit', 'uses' =>'ProfessorController@getSubmit']); 

	Route::get('/logout',			['as'=>'logout','uses'=>'UserController@getLogout']);

});

