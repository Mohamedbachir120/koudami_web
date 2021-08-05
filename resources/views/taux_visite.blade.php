@extends('layouts.moderator_admin')

@section('content')

            <div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>Taux de visites</h4></div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex flex-wrap"> 
                     <div class="col-sm-5 d-flex flex-column param mr-4">
                    <div class="dropdown py-4">
                        veuillez choisir une option:
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Options
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="/taux_visite/jours">par jour</a>
                          <a class="dropdown-item" href="/taux_visite/semaine">par semaine</a>
                          <a class="dropdown-item" href="/taux_visite/mois">par mois</a>
                       
                        </div>
                      </div>
                     <div> <h5>  {{ $phr }}  visites</h5></div>   
                    </div>
                      <div class="col-sm-6 param py-4"> 
                         <h3>Vérification pendant une date donnée :</h3>  
                      <form action="/get_visits_between" class="form-class" method="GET">
                        @csrf
                        <label for="debut">Date Début:</label>
                        <input type="date" name="debut" id="debut">
                        <label for="fin">Date fin:</label>
                        <input type="date" name="fin" id="fin">
                        <button class="btn btn-primary" type="submit">
                            Valider
                        </button>
            
                      </form>
            
            
                    
                    </div>
            
                </div>

                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var v="{{ session('msg') }}";
    if(v.length>0){
        alert(v);
    }
</script>
<style>

@media screen and (max-width: 650px) {
}
    .param{
        border-radius: 6px;
        padding: 10px;
        max-width: fit-content;
    }
    h4{
        margin: 10px;
    }
</style>
