<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\Visit;
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

    $vr="";



        if(Carbon::now('Africa/Algiers')->hour >= 12 ){
            $ads=Ad::where('state','visible')
            ->whereDate('fin','>=',Carbon::now('Africa/Algiers')->toDateString())
            ->get();
    

        }else {
            $ads=Ad::where('state','visible')
            ->where('mode','full')
            ->whereDate('fin','>=',Carbon::now('Africa/Algiers')->toDateString())
            ->get();
    


        }
    

    $users=User::where('type_compte','simple')
    ->where('state','actif')
    ->orderBy('nbr_visite','desc')
    ->take(3)->get();


   
    $visit=new Visit();
    $visit->save();
    return view('welcome',['ads'=>$ads,'vr'=>$vr,'users'=>$users]);
});

Route::get('/ar', function () {

    $vr="";



        if(Carbon::now('Africa/Algiers')->hour >= 12 ){
            $ads=Ad::where('state','visible')
            ->whereDate('fin','>=',Carbon::now('Africa/Algiers')->toDateString())
            ->get();
    

        }else {
            $ads=Ad::where('state','visible')
            ->where('mode','full')
            ->whereDate('fin','>=',Carbon::now('Africa/Algiers')->toDateString())
            ->get();
    


        }
    

    $nb=User::where('type_compte','simple')->count();
    $users=User::where('type_compte','simple')
    ->where('state','actif')
    ->orderBy('nbr_visite','desc')
    ->take(3)->get();


    $visit=new Visit();
    $visit->save();
    return view('ar.ar_welcome',['ads'=>$ads,'vr'=>$vr,'users'=>$users]);
});

Route::get('/{lg}/conditions_utilisation',function($lg){

    $view="";
    ($lg=="fr") ? $view="condition":$view="ar_condition";

    return view($view);
});

Auth::routes(['verify' => true]);


Route::get('/register/{lg}',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm']);

Route::get('/home/show_users', [App\Http\Controllers\HomeController::class, 'show_users'])->name('show_users')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/home/show_users/detail_user/{id}',[App\Http\Controllers\HomeController::class, 'detail_user'])->name('detail_user');
Route::get('/modify_user_info/{id}',[App\Http\Controllers\HomeController::class, 'modify_user_info'])->name('modify_user_info')->middleware('auth');;
Route::post('/update_user/{id}',[App\Http\Controllers\HomeController::class, 'update_user'])->middleware('auth');;
Route::delete('/delete_user/{id}',[App\Http\Controllers\HomeController::class, 'destroy_user'])->name('user.destroy')->middleware('auth');;
Route::get('/location',[App\Http\Controllers\HomeController::class, 'location'])->middleware('auth');
Route::get('/fr/our_clients',[App\Http\Controllers\HomeController::class, 'our_clients']);
Route::get('/ar/our_clients',[App\Http\Controllers\HomeController::class, 'ar_our_clients']);
Route::get('/position/{id}',[App\Http\Controllers\HomeController::class, 'position']);
Route::get('/fix_issues',[App\Http\Controllers\HomeController::class,'check_issues']);
Route::get('/taux_visite/{param}',[App\Http\Controllers\HomeController::class,'taux_visites']);
Route::get('/get_visits_between',[App\Http\Controllers\HomeController::class,'get_visites_between']);
Route::get('/add_profil_pic',[App\Http\Controllers\HomeController::class,'add_profil_pic'])->middleware('auth');
Route::post('/save_pic',[App\Http\Controllers\HomeController::class,'save_pic'])->middleware('auth');
Route::get('/language',[App\Http\Controllers\HomeController::class,'languge']);
Route::get('/getmail',[App\Http\Controllers\HomeController::class,'getmail']);

Route::get('/mettre_ajour_statut',[App\Http\Controllers\HomeController::class,'mettre_ajour_statut'])->middleware('auth');
Route::get('/set_cookie/{lg}',[App\Http\Controllers\HomeController::class,"set_language_cookie"]);
Route::get('/ar/login',[App\Http\Controllers\HomeController::class,'ar_login'])->middleware('guest');
Route::get('/confirm_email',[App\Http\Controllers\HomeController::class,'confirm_email'])->middleware('auth');

Route::get('/edit_quittance/{id}',[App\Http\Controllers\MessageController::class, 'edit'])->middleware('auth');
Route::delete('/delete_quittance/{id}',[App\Http\Controllers\MessageController::class, 'destroy'])->middleware('auth');
Route::post('/update_quittance/{id}',[App\Http\Controllers\MessageController::class, 'update'])->name('update_quittance')->middleware('auth');
Route::get('/envoyer_quittance',[App\Http\Controllers\MessageController::class, 'create'])->middleware('auth');
Route::post('/store_quittance',[App\Http\Controllers\MessageController::class, 'store'])->name('store_quittance')->middleware('auth');
Route::get('/toutes_les_quittances',[App\Http\Controllers\MessageController::class, 'index'])->name('index_quittance')->middleware('auth');
Route::get('/archive_des_quittances',[App\Http\Controllers\MessageController::class, 'archive'])->name('archive_quittance')->middleware('auth');
Route::post('/activer/{iduser}/article/{idarticle}',[App\Http\Controllers\MessageController::class, 'activer'])->name('activer')->middleware('auth');
Route::get('/{lg}/contact_client/{id}',[App\Http\Controllers\MessageController::class, 'contact_client'])->name('contact_client');
Route::get('/messagerie',[App\Http\Controllers\MessageController::class, 'messagerie'])->name('messagerie')->middleware('auth');
Route::get('/get_file/{id}',[App\Http\Controllers\MessageController::class,'get_file'])->middleware('auth');

Route::get('/room/{id}',[App\Http\Controllers\MessageController::class, 'room'])->name('room')->middleware('auth');
Route::post('/send/{id}',[App\Http\Controllers\MessageController::class, 'send'])->name('send')->middleware('auth');
Route::get('/chatts/{id}',[App\Http\Controllers\MessageController::class, 'chatts'])->name('chatts')->middleware('auth');
Route::delete('/delete_chatt/{id}',[App\Http\Controllers\MessageController::class, 'delete_chatt'])->middleware('auth');
Route::get('/all_chatts',[App\Http\Controllers\MessageController::class,'all_chatts'])->middleware('auth');
Route::delete('/delete_selected_chatts',[App\Http\Controllers\MessageController::class,'delete_selected'])->middleware('auth')->name('delete_selected_chatts');
ROute::get('/find_message',[App\Http\Controllers\MessageController::class,'find_message'])->middleware('auth');
Route::get('/delete_old_messages',[App\Http\Controllers\MessageController::class,'delete_old_messages'])->middleware('auth');

Route::get('/create_ads',[App\Http\Controllers\AdController::class, 'create'])->name('create_ads')->middleware('auth');
Route::post('/store_ads',[App\Http\Controllers\AdController::class, 'store'])->name('store_ads')->middleware('auth');
Route::get('/show_ads',[App\Http\Controllers\AdController::class, 'index'])->name('show_ads')->middleware('auth');
Route::get('/edit_ads/{id}',[App\Http\Controllers\AdController::class, 'edit'])->name('edit_ads')->middleware('auth');
Route::get('/masquer/{id}',[App\Http\Controllers\AdController::class,'masquer'])->middleware('auth');
Route::get('/demasquer/{id}',[App\Http\Controllers\AdController::class,'demasquer'])->middleware('auth');
Route::post('/update_ads/{id}',[App\Http\Controllers\AdController::class, 'update'])->name('update_ads')->middleware('auth');
Route::delete('/delete_ads/{id}',[App\Http\Controllers\AdController::class, 'destroy'])->name('ads.destroy')->middleware('auth');;
Route::delete('/delete_selected',[App\Http\Controllers\AdController::class, 'delete_selected'])->name('delete_selected')->middleware('auth');;


Route::get('/create_moderator',[App\Http\Controllers\ModeratorController::class, 'create_moderator'])->name('create_moderator')->middleware('auth');
Route::post('/store_moderator',[App\Http\Controllers\ModeratorController::class, 'store_moderator'])->name('store_moderator')->middleware('auth');
Route::get('/show_moderators',[App\Http\Controllers\ModeratorController::class, 'show_moderators'])->name('show_moderators')->middleware('auth');
Route::get('/edit_moderator/{id}',[App\Http\Controllers\ModeratorController::class, 'edit_moderator'])->name('edit_moderator')->middleware('auth');
Route::post('/update_moderator/{id}',[App\Http\Controllers\ModeratorController::class, 'update_moderator'])->name('update_moderator')->middleware('auth');
Route::delete('/delete_moderator/{id}',[App\Http\Controllers\ModeratorController::class, 'destroy_moderator'])->name('moderator.destroy')->middleware('auth');;
Route::get('/detail_moderator/{id}',[App\Http\Controllers\ModeratorController::class, 'moderator_detail'])->name('moderator_detail')->middleware('auth');


Route::post('/store_comment/{owner}',[App\Http\Controllers\CommentController::class, 'store'])->name('store')->middleware('auth');
Route::get('/show_comments',[App\Http\Controllers\CommentController::class, 'index'])->name('show_comments')->middleware('auth');
Route::delete('/delete_comment/{id}',[App\Http\Controllers\CommentController::class,'destroy'])->name('delete_comment')->middleware('auth');
Route::get('/stats/{param}',[App\Http\Controllers\CommentController::class,'stats'])->middleware('auth');
Route::get('/find_comment',[App\Http\Controllers\CommentController::class,'find_comment'])->middleware('auth');
Route::get('/find_user',[App\Http\Controllers\CommentController::class,'find_user'])->middleware('auth');

Route::get('/stats_client',[App\Http\Controllers\VisitorController::class, 'stats_client'])->middleware('auth');
Route::get('/edit_password/{id}',[App\Http\Controllers\VisitorController::class, 'edit_password'])->name('edit_password')->middleware('auth');
Route::post('/update_password/{id}',[App\Http\Controllers\VisitorController::class, 'update_password'])->name('update_password')->middleware('auth');
Route::get('/detail_visitor/{id}',[App\Http\Controllers\VisitorController::class, 'detail_user'])->name('detail_visitor')->middleware('auth');
Route::get('/edit_visitor/{id}',[App\Http\Controllers\VisitorController::class, 'edit_visitor'])->name('edit_visitor')->middleware('auth');
Route::post('/update_visitor/{id}',[App\Http\Controllers\VisitorController::class, 'update_visitor'])->name('update_visitor')->middleware('auth');
Route::get('/likes/{id}',[App\Http\Controllers\VisitorController::class, 'likes'])->name('update_visitor')->middleware('auth');
Route::get('/filter_by_position',[App\Http\Controllers\VisitorController::class,'filter_by_position'])->name('filter_by_position');
Route::get('/ar/filter_by_position',[App\Http\Controllers\VisitorController::class,'ar_filter_by_position'])->name('filter_by_position');
Route::get('/service/{service}',[App\Http\Controllers\VisitorController::class,'service']);
Route::get('/ar/service/{service}',[App\Http\Controllers\VisitorController::class,'ar_service']);
Route::get('/generer_visites',[App\Http\Controllers\VisitorController::class,'create_visits']);

Route::get('/show_operations',[App\Http\Controllers\OperationAdminController::class,'index'])->middleware('auth');
Route::get('/find_operations',[App\Http\Controllers\OperationAdminController::class,'find_operation'])->middleware('auth');
Route::delete('/delete_operation/{id}',[App\Http\Controllers\OperationAdminController::class,'destroy'])->middleware('auth');

Route::get('/create_galerie',[App\Http\Controllers\GalerieController::class,'create'])->middleware('auth');
Route::post('/add_to_galerie',[App\Http\Controllers\GalerieController::class,'store'])->middleware('auth');
Route::post('/delete_pic/{pic}',[App\Http\Controllers\GalerieController::class,'delete_pic'])->middleware('auth');

Route::post('/set_rate/{id}',[App\Http\Controllers\RatingController::class,'set_rate'])->middleware('auth');

Route::get('/store/create_article',[App\Http\Controllers\ArticleController::class,'create'])->middleware('auth');
Route::post('/store/add_new_article',[App\Http\Controllers\ArticleController::class,'store'])->middleware('auth');
Route::get('/{lg}/store/show_articles',[App\Http\Controllers\ArticleController::class,'index']);
Route::get('/store/consulter_mes_articles',[App\Http\Controllers\ArticleController::class,'show'])->middleware('auth');
Route::delete('/store/delete_article/{id}',[App\Http\Controllers\ArticleController::class,'destroy'])->middleware('auth');
Route::get('/{lg}/store/find_article',[App\Http\Controllers\ArticleController::class,'find_article']);

Route::get('/store/edit_article/{id}',[App\Http\Controllers\ArticleController::class,'edit']);
Route::post('/store/update_article/{article}',[App\Http\Controllers\ArticleController::class,'update'])->name('update_article');
Route::post('/store/change_article_image/{article}',[App\Http\Controllers\ArticleController::class,'edit_image'])->name('edit_article_image');
Route::get('/store/show_articles_admin',[App\Http\Controllers\ArticleController::class,'show_articles_admin']);
Route::get('/find_article_admin',[App\Http\Controllers\ArticleController::class,'find_article_admin']);
Route::get('/store/article_detail/{id}',[App\Http\Controllers\ArticleController::class,'article_detail']);
Route::get('/{lg}/store/article_search',[App\Http\Controllers\ArticleController::class,'article_search']);
Route::get('/{lg}/store/buy_article/{article}',[App\Http\Controllers\ArticleController::class,'buy_article'])->name('buy_article');

Route::get('/{lg}/jobs/find_article',[App\Http\Controllers\EmploiController::class,'find_article']);
Route::get('/{lg}/jobs/article_search',[App\Http\Controllers\EmploiController::class,'article_search']);
Route::get('/{lg}/jobs/all_articles',[App\Http\Controllers\EmploiController::class,'index']);
Route::get('/jobs/create_article',[App\Http\Controllers\EmploiController::class,'create'])->middleware('auth');
Route::post('/jobs/store_article',[App\Http\Controllers\EmploiController::class,'store'])->middleware('auth');
Route::get('/jobs/mes_articles',[App\Http\Controllers\EmploiController::class,'show'])->middleware('auth');
Route::get('/jobs/article_detail/{emploi}',[App\Http\Controllers\EmploiController::class,'detail_article_user'])->middleware('auth')->name('jobs_article_detail');
Route::delete('/jobs/delete_article/{emploi}',[App\Http\Controllers\EmploiController::class,'destroy'])->middleware('auth')->name('delete_emploi');
Route::get('/jobs/edit_article/{emploi}',[App\Http\Controllers\EmploiController::class,'edit'])->middleware('auth')->name('edit_job');
Route::post('/jobs/update_article/{emploi}',[App\Http\Controllers\EmploiController::class,'update'])->middleware('auth')->name('update_job');

Route::post('/profile/edit/{user}',[App\Http\Controllers\ProfileController::class,'create'])->middleware('auth')->name('create_profile');

Route::post('/envoyer_rapport',[App\Http\Controllers\SignalController::class,'store'])->middleware("auth");
