@extends('layouts.moderator_admin')

@section('content')

<main role="main" class="col-md-12 ml-sm-auto col-lg-12  mt-3 px-lg-5 mb-5">
                        <div class="card">
                            <div class="bg-dark p-3 text-light text-center">
                                <h4>Mettre à jour un  article</h4>
                            </div>

                            <div class="d-flex flex-row flex-wrap m-4 justify-content-center align-items-center">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <img src="{{ Storage::disk('s3')->url($article->image) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">
                                    <p>Image 01</p>
                                    <div class="d-flex flex-row">
                                        <div>
                
                                        <button class="btn btn-success m-2" onclick="enable_form('#pic1')"><i class="fa fa-edit"></i></button>  
                                      </div>
                                       
                                      </div>

                                    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <img src="{{ Storage::disk('s3')->url($article->image2) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">
                                    <p>
                                        Image 02
                                    </p>
                                    <div class="d-flex flex-row">
                                        <div>
                                        <button class="btn btn-success m-2" onclick="enable_form('#pic2')"><i class="fa fa-edit"></i></button>  
                                      </div>
                                      
                                      </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <img src="{{ Storage::disk('s3')->url($article->image3) }}" class="responsive rounded" width="250px"  height="200px" alt="koudami">
                                    <p>
                                        Image 03
                                    </p>
                                    <div class="d-flex flex-row">
                                        <div>
                                        <button class="btn btn-success m-2" onclick="enable_form('#pic3')"><i class="fa fa-edit"></i></button>  
                                      </div>
                                       
                                     
                                      </div>
                                   
                                </div>
                            </div>

                            <form class="p-4" action="{{ route('edit_article_image',$article)}}" enctype="multipart/form-data" id="myform" method="post">
                                @csrf
                                <div class="form-group row" hidden>
                                  <label for="pic1">Premiére image  <i class="fa fa-picture-o"></i> :&nbsp;</label>
                                  <input type="file" name="pic1" class="photo"  id="pic1"   accept="image/*">
                                 
                                </div>
                               <div class="form-group row" hidden>
                                <label for="pic2">Deuxiéme image <i class="fa fa-picture-o"></i> :&nbsp;</label>
                                <input type="file" name="pic2" class="photo"  id="pic2"   accept="image/*">
                               
                               </div>
                               <div class="form-group row" hidden>
                                <label for="pic3">Troisième image <i class="fa fa-picture-o"></i> :&nbsp;</label>
                                <input type="file" name="pic3" class="photo"  id="pic3"  accept="image/*">
                               
                               </div>
                               <div>
                              </div>
                               <div id="submit" hidden>
                                <input type="submit" value="Confirmer" class="btn btn-success">
                          
                               </div>
                            </form>

                            <div class="card-body p-3 row justify-content-center">

                          
                        <form action="{{ route('update_article',$article) }}" enctype="multipart/form-data" method="post" class="col-lg-8 d-flex flex-column flex-wrap p-4 shadow rounded">
                            @csrf
                        <div class="form-group row">
                        <label for="nom_article">Que publier vous ? &nbsp;</label>
                        <input type="text" name="nom_article" id="nom_article" value="{{ $article->nom_article }}" required>
                        </div>
                        <div class="form-group row">
                            <label for="categorie">Catégorie : &nbsp;</label>
                            <select name="categorie" class="selectpicker" data-live-search="true" id="categorie">
                                <option value="{{ $article->categorie }}"> {{ $article->categorie }}</option>
                                <option value="Véhicules">Véhicules</option>
                                <option value="Ventes immobilières">Ventes immobilières</option>
                                <option value="Locations immobilières">Locations immobilières</option>
                                <option value="Meubles">Meubles</option>
                                <option value="Pour la maison">Pour la maison</option>
                                <option value="Electroménager">Electroménager</option>
                                <option value="Outils">Outils</option>
                                <option value="Jardin">Jardin</option>
                                <option value="Electronique et ordinateurs">Electronique et ordinateurs</option>
                                <option value="Téléphones mobiles">Téléphones mobiles</option>
                                <option value="Vide-grenier">Vide-grenier</option>
                                <option value="Divers">Divers</option>
                                <option value="Sports et activités extérieurs">Sports et activités extérieurs</option>
                                <option value="Antiquités et objets de collection">Antiquités et objets de collection</option>
                                <option value="Instruments de musique">Instruments de musique</option>
                                <option value="Artisanat d'art">Artisanat d'art</option>
                                <option value="Pièces auto">Pièces auto</option>
                                <option value="Vélos">Vélos</option>
                                <option value="Vêtements et chaussures pour femmes">Vêtements et chaussures pour femmes</option>
                                <option value="Vêtements et chaussures pour hommes">Vêtements et chaussures pour hommes</option>
                                <option value="Bijoux et accessoires">Bijoux et accessoires</option>
                                <option value="Sacs et bagages">Sacs et bagages</option>
                                <option value="Puériculture et enfants">Puériculture et enfants</option>
                                <option value="Santé et beauté">Santé et beauté</option>
                                <option value="Jouets et jeux">Jouets et jeux</option>
                                <option value="Fournitures pour animaux">Fournitures pour animaux</option>
                                <option value="Jeux vidéo">Jeux vidéo</option>
                                <option value="Livres,films et musique">Livres, films et musique</option>
                            </select>


                        </div>
                    
                        <div class="form-group row">
                            <label for="prix">Prix :&nbsp;</label>
                        <input type="number"  min="0" step="50" name="prix" id="prix" value="{{ $article->prix }}">
                        </div>
                        <div class="form-group row">
                            <label for="description">Description d'article :&nbsp;</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ $article->description }}</textarea>
                        </div>
                        <div class="form-group row">
                            <label for="livraison">Livraison : &nbsp;</label>
                        <select name="livraison" id="livraison" class="selectpicker">
                            @if($article->livraison =="disponible")
                            <option value="disponible" selected>disponible</option>
                            <option value="non disponible">non disponible</option>
                            @else
                            <option value="disponible" >disponible</option>
                            <option value="non disponible" selected>non disponible</option>
                        
                            @endif
                        </select> 

                        </div>
                    
                    
                     <div class="d-flex flex-row justify-content-end">
                        <input type="submit" class="btn btn-success"  value="Confirmer">

                     </div>
                    
                </form>
            </div>
            </div>
                       



            
        </main>
        @endsection
  </div>
</div>
</body>
</html>
<script type="text/javascript">
$("textarea").change(function(){
var url = $("textarea").val();
url=" "+url;
var b = url.search(/\b(?:https?:\/\/)?[^\/:]+\/.*?/);
if(b >0 ) {
alert("votre description ne doit pas contenir une URL");
$("[type=submit]").prop('disabled',true);
}
else{
    
$("[type=submit]").prop('disabled',false);


} 


});

function change_lang()
{
    var obj={
            "language":"ar",
            }
        localStorage.setItem('myJavaScriptObject', JSON.stringify(obj));
  
          $.ajax({
        url: "/language",
        type:"GET",
        data:{
          language:'ar',
            
       
        },
        success:function(response){
           if(response){
            location.reload();

           }
        
        },
       });
}
function enable_form(param){
    var ele=$(param);
    var parent=ele.parent();

    $('#myform')[0].reset();

    parent.siblings().attr('hidden',true);
    parent.siblings().children().attr('required',false);

    ele.attr('required',true);
    $('#blah').attr('hidden',true);
    ele.parent().removeAttr('hidden');
   
    
    $('#submit').removeAttr('hidden');
    


  } 

  


</script>
<style>
    .container{
   min-width: 100%;
 }
 
 .responsive{
    width: 100%;
    max-height: 200px;
    height: auto;    
    }

    thead,.card-header{
    text-align: center;
    background: linear-gradient(130deg,dodgerblue,blueviolet);
    color: white;
} 


          @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
     
      }
      body {
  font-size: .875rem;
}

.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */
 .container{
   min-width: 100%;
 }


.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

@media (max-width: 767.98px) {
  .sidebar {
    top: 5rem;
  }
  .first{
      object-fit: cover;
      width: 100%;
      height:33vh;
      border-radius: 15px;

      }
      thead{
        background: dodgerblue;
      }
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}
.toggledText span.trimmed{
  display:none;
}
.read-more .more:before{
  content:'Voir plus';
}
.showAll .toggledText span.morePoints{
  display:none;
}
.showAll .toggledText span.trimmed{
  display:inline;
}
.showAll .read-more .more:before{
  content:'Voir moin';
}
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 5px;

}
 
::-webkit-scrollbar-thumb {
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    background: dodgerblue;

}
</style>