<?php

use App\Http\Controllers\AttemptExamContentController;
use App\Http\Controllers\AudioContentController;
use App\Http\Controllers\CourseContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseInstructorController;
use App\Http\Controllers\CourseModulesController;
use App\Http\Controllers\DocumentContentController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\InstituitionController;
use App\Http\Controllers\LectureContentController;
use App\Http\Controllers\ScoreboardContentController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\VideoContentController;
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

Route::get('UserRegistration', [UserAccountController::class, 'UserRegistration'])->name('UserRegistration');

Route::get('AdminConsole', [UserAccountController::class, 'AdminConsole'])->name('AdminConsole')->middleware("auth");

Route::post('AttendLecturesSelectCourse', [LectureContentController::class, 'AttendLecturesSelectCourse'])->name('AttendLecturesSelectCourse')->middleware("auth");

Route::get('SelectCourseAttendLectures', [LectureContentController::class, 'SelectCourseAttendLectures'])->name('SelectCourseAttendLectures')->middleware("auth");

Route::get('ReAttemptExam/{id}', [ScoreboardContentController::class, 'ReAttemptExam'])->name('ReAttemptExam')->middleware("auth");

Route::post('StudentScoreboard', [ScoreboardContentController::class, 'StudentScoreboard'])->name('StudentScoreboard')->middleware("auth");

Route::get('ScoreboardSelectCourse', [ScoreboardContentController::class, 'ScoreboardSelectCourse'])->name('ScoreboardSelectCourse')->middleware("auth");

Route::post('SubmitExamAnswer', [AttemptExamContentController::class, 'SubmitExamAnswer'])->name('SubmitExamAnswer')->middleware("auth");

Route::get('GetSelectExam/{id}', [AttemptExamContentController::class, 'GetSelectExam'])->name('GetSelectExam')->middleware("auth");

Route::post('SelectExam', [AttemptExamContentController::class, 'SelectExam'])->name('SelectExam')->middleware("auth");

Route::post('AttemptExamSelectModule', [AttemptExamContentController::class, 'AttemptExamSelectModule'])->name('AttemptExamSelectModule')->middleware("auth");

Route::get('AttemptExam', [AttemptExamContentController::class, 'AttemptExam'])->name('AttemptExam')->middleware("auth");

Route::post('UpdateExams', [ExamsController::class, 'UpdateExams'])->name('UpdateExams')->middleware("auth");

Route::get('DeleteExamQuestion/{id}/{Module}', [ExamsController::class, 'DeleteExamQuestion'])->name('DeleteExamQuestion')->middleware("auth");

Route::get('GetManageExamsContent/{id}', [ExamsController::class, 'GetManageExamsContent'])->name('GetManageExamsContent')->middleware("auth");

Route::post('CreateExams', [ExamsController::class, 'CreateExams'])->name('CreateExams')->middleware("auth");

Route::post('ManageExamsContent', [ExamsController::class, 'ManageExamsContent'])->name('ManageExamsContent')->middleware("auth");

Route::post('ExamSelectModule', [ExamsController::class, 'ExamSelectModule'])->name('ExamSelectModule')->middleware("auth");

Route::get('ExamSelectCourse', [ExamsController::class, 'ExamSelectCourse'])->name('ExamSelectCourse')->middleware("auth");

Route::post('PostDocumentContent', [DocumentContentController::class, 'PostDocumentContent'])->name('PostDocumentContent')->middleware("auth");

Route::get('DeleteDocumentFile/{id}/{Module}', [DocumentContentController::class, 'DeleteDocumentFile'])->name('DeleteDocumentFile')->middleware("auth");

Route::get('GetManageDocumentContent/{id}', [DocumentContentController::class, 'GetManageDocumentContent'])->name('GetManageDocumentContent')->middleware("auth");

Route::post('ManageDocumentContent', [DocumentContentController::class, 'ManageDocumentContent'])->name('ManageDocumentContent')->middleware("auth");

Route::post('DocumentSelectModule', [DocumentContentController::class, 'DocumentSelectModule'])->name('DocumentSelectModule')->middleware("auth");

Route::get('DocumentSelectCourse', [DocumentContentController::class, 'DocumentSelectCourse'])->name('DocumentSelectCourse')->middleware("auth");

Route::get('DeleteVideoFile/{id}/{Module}', [VideoContentController::class, 'DeleteVideoFile'])->name('DeleteVideoFile')->middleware("auth");

Route::get('GetManageVideoContent/{id}', [VideoContentController::class, 'GetManageVideoContent'])->name('GetManageVideoContent')->middleware("auth");

Route::post('PostVideoContent', [VideoContentController::class, 'PostVideoContent'])->name('PostVideoContent')->middleware("auth");

Route::post('ManageVideoContent', [VideoContentController::class, 'ManageVideoContent'])->name('ManageVideoContent')->middleware("auth");

Route::post('VideoSelectModule', [VideoContentController::class, 'VideoSelectModule'])->name('VideoSelectModule')->middleware("auth");

Route::get('VideoSelectCourse', [VideoContentController::class, 'VideoSelectCourse'])->name('VideoSelectCourse')->middleware("auth");

Route::get('DeleteAudioFile/{id}/{Module}', [AudioContentController::class, 'DeleteAudioFile'])->name('DeleteAudioFile')->middleware("auth");

Route::get('GetManageAudioContent/{id}', [AudioContentController::class, 'GetManageAudioContent'])->name('GetManageAudioContent')->middleware("auth");

Route::post('PostAduioContent', [AudioContentController::class, 'PostAduioContent'])->name('PostAduioContent')->middleware("auth");

Route::post('ManageAudioContent', [AudioContentController::class, 'ManageAudioContent'])->name('ManageAudioContent')->middleware("auth");

Route::post('AudioSelectModule', [AudioContentController::class, 'AudioSelectModule'])->name('AudioSelectModule')->middleware("auth");

Route::get('AudioSelectCourse', [AudioContentController::class, 'AudioSelectCourse'])->name('AudioSelectCourse')->middleware("auth");

Route::post('CreateTextNotes', [CourseContentController::class, 'CreateTextNotes'])->name('CreateTextNotes')->middleware("auth");

Route::get('DeleteCourseTextNotes/{id}/{Module}', [CourseContentController::class, 'DeleteCourseTextNotes'])->name('DeleteCourseTextNotes')->middleware("auth");

Route::get('GetManageTextNotes/{id}', [CourseContentController::class, 'GetManageTextNotes'])->name('GetManageTextNotes')->middleware("auth");

Route::post('ManageTextNotes', [CourseContentController::class, 'ManageTextNotes'])->name('ManageTextNotes')->middleware("auth");

Route::post('NotesSelectModule', [CourseContentController::class, 'NotesSelectModule'])->name('NotesSelectModule')->middleware("auth");

Route::get('NotesContentSelectCourse', [CourseContentController::class, 'NotesContentSelectCourse'])->name('NotesContentSelectCourse')->middleware("auth");

Route::get('DeleteCourseModule/{id}', [CourseModulesController::class, 'DeleteCourseModule'])->name('DeleteCourseModule')->middleware("auth");

Route::post('CreateNewModule', [CourseModulesController::class, 'CreateNewModule'])->name('CreateNewModule')->middleware("auth");

Route::get('ManageCourseModules/{id}', [CourseModulesController::class, 'ManageCourseModules'])->name('ManageCourseModules')->middleware("auth");

Route::get('CourseModuleSelectCourse', [CourseModulesController::class, 'CourseModuleSelectCourse'])->name('CourseModuleSelectCourse')->middleware("auth");

Route::get('DeleteInstructor/{id}/{Departments}', [CourseInstructorController::class, 'DeleteInstructor'])->name('DeleteInstructor')->middleware("auth");

Route::get('DeleteCourse/{id}/{instructor}', [CourseController::class, 'DeleteCourse'])->name('DeleteCourse')->middleware("auth");

Route::post('CreateCourseLogic', [CourseController::class, 'CreateCourseLogic'])->name('CreateCourseLogic')->middleware("auth");

Route::get('GetCreateCourse/{id}', [CourseController::class, 'GetCreateCourse'])->name('GetCreateCourse')->middleware("auth");

Route::post('CreateCourse', [CourseController::class, 'CreateCourse'])->name('CreateCourse')->middleware("auth");

Route::post('SelectCourseDepartment', [CourseController::class, 'SelectCourseDepartment'])->name('SelectCourseDepartment')->middleware("auth");

Route::post('CourseInstitutionSelected', [CourseController::class, 'CourseInstitutionSelected'])->name('CourseInstitutionSelected')->middleware("auth");

Route::get('SelectCourseInstitution', [CourseController::class, 'SelectCourseInstitution'])->name('SelectCourseInstitution')->middleware("auth");

Route::post('SubmitInstructor', [CourseInstructorController::class, 'SubmitInstructor'])->name('SubmitInstructor')->middleware("auth");

Route::get('GetCreateCourseInstructor/{id}', [CourseInstructorController::class, 'GetCreateCourseInstructor'])->name('GetCreateCourseInstructor')->middleware("auth");

Route::post('CreateCourseInstructor', [CourseInstructorController::class, 'CreateCourseInstructor'])->name('CreateCourseInstructor')->middleware("auth");

Route::get('CourseInstructorSelectInstitution', [CourseInstructorController::class, 'CourseInstructorSelectInstitution'])->name('CourseInstructorSelectInstitution')->middleware("auth");

Route::post('CourseInstructorInstitutionSelected', [CourseInstructorController::class, 'CourseInstructorInstitutionSelected'])->name('CourseInstructorInstitutionSelected')->middleware("auth");

/*Route::get('CourseSelectInstitution', [CourseInstructorController::class, 'CourseSelectInstitution'])->name('CourseSelectInstitution')->middleware("auth");*/

Route::get('DeleteDepartment/{id}', [InstituitionController::class, 'DeleteDepartment'])->name('DeleteDepartment')->middleware("auth");

Route::get('ManageDepartments/{id}', [InstituitionController::class, 'ManageDepartments'])->name('ManageDepartments')->middleware("auth");

Route::post('CreateDepartment', [InstituitionController::class, 'CreateDepartment'])->name('CreateDepartment')->middleware("auth");

Route::post('SubmitSelectInstitution', [InstituitionController::class, 'SubmitSelectInstitution'])->name('SubmitSelectInstitution')->middleware("auth");

Route::get('SelectInstitution', [InstituitionController::class, 'SelectInstitution'])->name('SelectInstitution')->middleware("auth");

Route::get('DeleteInstitution/{id}', [InstituitionController::class, 'DeleteInstitution'])->name('DeleteInstitution')->middleware("auth");

Route::post('CreateInstitution', [InstituitionController::class, 'CreateInstitution'])->name('CreateInstitution')->middleware("auth");

Route::get('ManageInstitutions', [InstituitionController::class, 'ManageInstitutions'])->name('ManageInstitutions')->middleware("auth");

Route::get('/', [UserAccountController::class, 'CloudDrive'])->middleware("auth");

Route::get('/CloudDrive', [UserAccountController::class, 'CloudDrive'])->name('CloudDrive')->middleware("auth");

Route::get('/ManageCountries', [InstituitionController::class, 'ManageCountries'])->name('ManageCountries')->middleware("auth");

Route::post('/CreateCountry', [InstituitionController::class, 'CreateCountry'])->name('CreateCountry')->middleware("auth");

Route::get('/DeleteCountry/{id}', [InstituitionController::class, 'DeleteCountry'])->name('DeleteCountry')->middleware("auth");
