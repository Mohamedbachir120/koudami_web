@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Modifier les informations de {{ $user->name }} - {{ $user->prenom }} :</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                    <form method="POST" action="/update_user/{{ $id }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                     
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numéro de Téléphone</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" value="{{ $user->phone_number }}" name="phone_number"  >
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">Votre catégorie:</label>
                             <select name="categorie" class="selectpicker" id="categorie">
                             <option value="{{ $user->categorie}}" selected>{{ $user->categorie}}</option>
                                <option value="Constructions et Travaux">Constructions et Travaux</option>
                                <option value="Industrie et fabrication">Industrie et fabrication</option>
                                <option value="Décoration et Aménagement">Décoration et Aménagement</option>
                                <option value="Traiteurs et Gateaux">Traiteurs et Gateaux</option>
                                <option value="Nettoyage et jardinage">Nettoyage et jardinage</option>
                                <option value="Location de véhicules">Location de véhicules</option>
                                <option value="Securité et Alarme">Securité et Alarme</option>
                                <option value="Menuiserie et Meubles">Menuiserie et Meubles</option>
                                <option value="Hôtellerie">Hôtellerie</option>
                                <option value="Esthétique et Beauté">Esthétique et Beauté</option>
                                <option value="Comptabilité et Economie">Comptabilité et Economie</option>
                                <option value="Maintenance et infromatique">Maintenance et infromatique</option>
                                <option value="Paraboles et démos">Paraboles et démos</option>
                                <option value="Réparation Electromenager">Réparation Electromenager</option>
                                <option value="Juridique">Juridique</option>
                                <option value="Ecoles et formations">Ecoles et formations</option>
                                <option value="Transport et déménagement">Transport et déménagement</option>
                                <option value="Publicité et communication">Publicité et communication</option>
                                <option value="Froid et climatisation">Froid et climatisation</option>
                                <option value="Médecine et santé">Médecine et santé</option>
                                <option value="Réparation auto et diagnostic">Réparation auto et diagnostic</option>
                                <option value="Projet et études">Projet et études</option>
                                <option value="Bureautique et internet">Bureautique et internet</option>
                                <option value="Impression et édition">Impression et édition</option>
                                <option value="Image et son">Image et son</option>
                                <option value="Couture et confection">Couture et confection</option>
                                <option value="Evènement et Divertissement">Evènement et Divertissement</option>
                                <option value="Réparation Electronique">Réparation Electronique</option>
                                <option value="Voyage">Voyage</option>
                                <option value="Jeux">Jeux</option>
                                 <option value="Accessoires et Modes">Accessoires et Modes</option>
                                <option value="Vêtements et Chaussures">Vêtements et Chaussures </option>
                                                                
                            </select>  
                            </div>                        

                  
                        
                            <div class="form-group row">
                                <label for="function" class="col-md-4 col-form-label text-md-right">L'activité:</label>                   
                            <textarea name="function" id="function" placeholder="Example : Soudeur , Maçon , peintre , Vendeur , Comptable , Avocat ..." list="functions" cols="30" rows="10">
                                {{ $user->function }}
                            </textarea>

                            </div>

                            <div class="form-group row" hidden>
                                <label for="type_payement" class="col-md-4 col-form-label text-md-right">Moyen de payement:</label>
    
                                <div class="col-md-6">
                                    <select name="type_payement" class="form-control" id="type_payement">
                                        <option value="CCP" selected>1- CCP </option>
                                        <option value="Carte Edahabia">2- Carte Edahabia </option>
                                        <option value="en espèces">3- Payement en espèces </option>
                         
                                    </select>
                                </div>
                       
                            </div>   
                            
                            <div class="form-group row">
                                <label for="wilaya" class="col-md-4 col-form-label text-md-right">Wilaya</label>
                          
                                <div class="col-md-6">
                                 
                            <select name="wilaya" class="form-control" id="wilaya" required>
                                <option value="{{ $user->wilaya }}" selected> {{ $user->wilaya }}</option>
                                <option value="Adrar">01  Adrar  </option> 
                                <option value="Chlef">02  Chlef  </option> 
                                <option value="Laghouat">03  Laghouat  </option> 
                                <option value="Oum el Bouaghi">04  Oum-El- Bouaghi </option> 
                                <option value="Batna">05  Batna  </option> 
                                <option value="Béjaïa">06  Béjaïa  </option> 
                                <option value="Biskra">07  Biskra  </option> 
                                <option value="Béchar">08  Béchar  </option> 
                                <option value="Blida">09  Blida  </option> 
                                <option value="Bouira">10  Bouira  </option> 
                                <option value="Tamanrasset">11  Tamanrasset  </option> 
                                <option value="Tébessa">12  Tébessa  </option> 
                                <option value="Tlemcen">13  Tlemcen  </option> 
                                <option value="Tiaret">14  Tiaret  </option> 
                                <option value="Tizi Ouzou">15  Tizi-Ouzou  </option> 
                                <option value="Alger">16  Alger  </option> 
                                <option value="Djelfa">17  Djelfa  </option> 
                                <option value="Jijel">18  Jijel  </option> 
                                <option value="Sétif">19  Sétif  </option> 
                                <option value="Saida">20  Saida  </option> 
                                <option value="Skikda">21  Skikda  </option> 
                                <option value="Sidi-Bel- Abbès">22  Sidi-Bel- Abbès </option> 
                                <option value="Annaba">23  Annaba  </option> 
                                <option value="Guelma">24  Guelma  </option> 
                                <option value="Constantine">25  Constantine  </option> 
                                <option value="Médéa">26  Médéa  </option> 
                                <option value="Mostaganem">27  Mostaganem  </option> 
                                <option value="M'Sila">28  M'Sila  </option> 
                                <option value="Mascara">29  Mascara  </option> 
                                <option value="Ouargla">30  Ouargla  </option> 
                                <option value="Oran">31  Oran  </option> 
                                <option value="illizi">33  illizi  </option> 
                                <option value="Bordj Bou Arreridj">34  Bordj-Bou- Arreridj </option> 
                                <option value="Boumerdès">35  Boumerdès  </option> 
                                <option value="El Tarf">36  El-Taref  </option> 
                                <option value="Tindouf">37  Tindouf  </option> 
                                <option value="Tissemsilt">38  Tissemsilt  </option> 
                                <option value="El Oued">39  El-Oued  </option> 
                                <option value="Khenchela">40  Khenchela  </option> 
                                <option value="Souk Ahras">41  Souk-Ahras  </option> 
                                <option value="Tipaza">42  Tipaza  </option> 
                                <option value="Mila">43  Mila  </option> 
                                <option value="Aïn Defla">44  Aïn-Defla  </option> 
                                <option value="Naâma">45  Naâma  </option> 
                                <option value="Aïn Témouchent">46  Aïn- Témouchent </option> 
                                <option value="Ghardaia">47  Ghardaia  </option> 
                                <option value="Relizane">48  Relizane  </option> 
                                <option value="Timimoun">49 Timimoun</option>
                                <option value="Bordj Badji Mokhtar">50 Bordj Badji Mokhtar</option>
                                <option value="Ouled Djellal">51 Ouled Djellal</option>
                                <option value="Béni Abbès">52 Béni Abbès</option>
                                <option value="In Salah">53 In Salah</option>
                                <option value="In Guezzam">54 In Guezzam</option>
                                <option value="Touggourt">55 Touggourt</option>
                                <option value="Djanet">56 Djanet</option>
                                <option value="El M'Gahir">57 El M'Gahir</option>
                                <option value="El Meniaa">58 El Meniaa</option>
    

                            </select>
                         
                         </div>
                    
                       </div>
                       <div class="form-group row">
                        <label for="commune" class="col-md-4 col-form-label text-md-right">Commune</label>
                   
                        <div class="col-md-6">
                            <select name="commune"  id="commune"  required>
                                <option value="{{ $user->commune }}" selected> {{ $user->commune }}</option>

                            </select>
                        </div>
                   
                    </div>
                            <div class="form-group row" hidden>
                                <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N°Compte:</label>
                                
                                <div class="col-md-6">
                                <input id="Ncompte" type="text" class="form-control" name="Ncompte" value="0000000" >
                                </div>
                
                           </div>

                       @if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
                     
                      @endif
                       <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" id="submit">
                             Valider
                            </button>
                        </div>
                    </div>               
                
                    

                    </form>                   
                    

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style> 
li{
    list-style: none;
    letter-spacing: 1px;
    font-weight:  bold;
    color: rgb(50,50,50);
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

   $('#state').change(function(){
    if($(this).val()=="actif" || $(this).val()=="inactif")
        {
            $('#submit').prop('disabled',false);
        }
        else{

            $('#submit').prop('disabled',true);
            alert('le champ accepte que deux valeur actif ou inactif');
            
        }

   });
    

});


$(document).ready(function () {
   /* $('select').selectize({
        sortField: 'text'
    });
*/

var tab=myMap.get("{{ $user->wilaya }}");
  var i=0;
  for(i=0;i<tab.length;i++){
    $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }
});


$(document).ready(function(){
    $("select#wilaya").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        $("select#commune").empty();
        var tab=myMap.get(selectedCountry);
        var i=0;
        for(i=0;i<tab.length;i++){
         $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }

    });
});
</script>
