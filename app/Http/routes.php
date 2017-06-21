<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;


Route::auth();
//route
Route::group(['middleware'=>['web']], function (){
    //search
    Route::get('search',['as'=>'search','uses'=>'SearchController@search']);
    Route::post('search',['as'=>'search','uses'=>'SearchController@index']);
    //submenu
    Route::get('index/{id}',['as'=>'index.submenu','uses'=>'MenuController@submenu']);
    //menu
    Route::get('/','MenuController@home');
    Route::post('/{locale}',['middleware' => 'language','uses' => 'MenuController@locale']);
    Route::get('index',['as'=>'index','uses'=>'MenuController@home']);
    Route::get('contact',['as'=>'contact','uses'=>'MenuController@contact']);
    Route::get('news',['as'=>'news','uses'=>'MenuController@news']);
    Route::get('news/{id}',['as'=>'newId','uses'=>'MenuController@newId']);
    Route::get('agent',['as'=>'agent','uses'=>'MenuController@agent']);
    Route::get('partners',['as'=>'partners','uses'=>'MenuController@partners']);
    Route::get('feedback',['as'=>'feedback','uses'=>'MenuController@feedback']);
    Route::get('about',['as'=>'about','uses'=>'MenuController@about']);
    Route::get('calculator',['as'=>'calc','uses'=>'SubmenuController@calc']);
});

Route::group(['prefix' => 'admin','middleware' => ['web','auth','admin']], function () {
    Route::get('index',['as'=>'admin.index','uses'=>'AdminController@index']);
    Route::get('/',['as'=>'admin.index','uses'=>'AdminController@index']);
    //sub menu
    Route::get('menu/delete/{id}',['as'=>'admin.menu.delete','uses'=>'SubmenuController@destroy']);
    Route::resource('menu','SubmenuController');

    Route::get('menu/create/{id}',['as'=>'admin.menu.create.item','uses'=>'SubmenuController@item']);
    //about menu
    Route::get('about',['as'=>'admin.about.index','uses'=>'AboutController@index']);
    Route::get('about/edit/{id}',['as'=>'admin.about.edit','uses'=>'AboutController@edit']);
    Route::get('about/create',['as'=>'admin.about.create','uses'=>'AboutController@create']);
    Route::post('about/create',['as'=>'admin.about.store','uses'=>'AboutController@store']);
    Route::post('about/update/{id}',['as'=>'admin.about.update','uses'=>'AboutController@update']);
    //news
    Route::resource('news','NewsController');
    Route::get('news/delete/{id}',['as'=>'admin.news.delete','uses'=>'NewsController@destroy']);
    //partners
    Route::resource('partners','PartnerController');
    Route::resource('partners/image','ImageController');
    Route::post('partners/{id}',['as'=>'admin.partners.update','uses'=>'PartnerController@update']);
    Route::post('partners/image/{id}',['as'=>'admin.partners.image.update','uses'=>'ImageController@update']);
    Route::get('partners/image/{id}/delete',['as'=>'admin.partners.image.delete','uses'=>'ImageController@destroy']);
    //feedback
    Route::get('feedback',['as'=>'admin.feedback.index','uses'=>'FeedbackController@index']);
    Route::post('feedback',['as'=>'admin.feedback.store','uses'=>'FeedbackController@store']);
    Route::get('feedback/{id}',['as'=>'admin.feedback.show','uses'=>'FeedbackController@show']);
    Route::get('feedback/{id}/delete',['as'=>'admin.feedback.delete','uses'=>'FeedbackController@destroy']);
    //contact
    Route::get('contact',['as'=>'admin.contact.index','uses'=>'ContactController@index']);
    Route::get('contact/create',['as'=>'admin.contact.create','uses'=>'ContactController@create']);
    Route::post('contact/create',['as'=>'admin.contact.store','uses'=>'ContactController@store']);
    Route::get('contact/edit/{id}',['as'=>'admin.contact.edit','uses'=>'ContactController@edit']);
    Route::post('contact/update/{id}',['as'=>'admin.contact.update','uses'=>'ContactController@update']);
    Route::get('contact/{id}',['as'=>'admin.contact.show','uses'=>'ContactController@show']);
    //agent
    Route::get('agent',['as'=>'admin.agent.index','uses'=>'AgentController@index']);
    Route::get('agent/create',['as'=>'admin.agent.create','uses'=>'AgentController@create']);
    Route::post('agent/create',['as'=>'admin.agent.store','uses'=>'AgentController@store']);
    Route::get('agent/edit/{id}',['as'=>'admin.agent.edit','uses'=>'AgentController@edit']);
    Route::post('agent/update/{id}',['as'=>'admin.agent.update','uses'=>'AgentController@update']);
    Route::get('agent/{id}',['as'=>'admin.agent.show','uses'=>'AgentController@show']);
    Route::get('agent/{id}/delete',['as'=>'admin.agent.delete','uses'=>'AgentController@destroy']);

});
Route::get('/home', 'HomeController@index');
Route::get('example', 'AboutController@example');
