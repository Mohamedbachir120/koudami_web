<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Message;
use App\Models\Ad;
use App\Models\Chatt;
use App\Models\Comment;
use App\Models\OperationAdmin;
use App\Models\Galerie;
use App\Models\Rating;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Emploi;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_inscription',
        'name',
        'email',
        'password',
        'prenom',
        'phone_number',
        'function',
        'wilaya',
        'commune',
        'type_payement',
        'Ncompte',
        'adresse',
        'Rc',
        'Nif',
        'state',
        'date_valid',
        'nbr_visite',
        'categorie',

        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function signals()
    {
        return $this->morphMany('App\Models\Signal', 'signal');
    }


    function articles(){

        return $this->hasMany(Article::class,'publierPar_id');
    }

    function emplois(){

        return $this->hasMany(Emploi::class,'publierPar_id');
    }


    


    function messages(){

        return $this->hasMany(Message::class);
    } 

    
    function posts(){

        return $this->hasMany(Comment::class,'poster_id');

    }

    function comments(){

        return $this->hasMany(Comment::class,'owner_id');


    }
    public function liked(){
        return $this->belongsToMany(User::class,'user_user','liker_id','liked_by_id')->withTimestamps();
    }

    public function liked_by(){
        return $this->belongsToMany(User::class,'user_user','liked_by_id','liker_id')->withTimestamps();
    }

    public  function is_liked($id){

        return ($this->liked_by()->where('liker_id',$id)->exists());

        return false; 

    }
   
    function sended(){
        return $this->hasMany(Chatt::class,'sender_id');
    }
    function received(){
        return $this->hasMany(Chatt::class,'receiver_id');
    
    }

    function operations(){

        return $this->hasMany(OperationAdmin::class,'admin_id');
    }
 
    function galerie(){

       return $this->hasOne(Galerie::class);
   
    }
    function profile(){
        return $this->hasOne(Profile::class);
    }
    function rate(){

        return $this->hasMany(Rating::class,'rater_id');
        
    } 
    function rated_by(){

        return $this->hasMany(Rating::class,'rated_id');

    }
    public function is_rated_by($id){

            return ($this->rated_by()->where('rater_id',$id)->exists());
      

    } 
}
