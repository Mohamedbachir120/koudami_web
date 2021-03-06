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
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Num??ro de T??l??phone</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" value="{{ $user->phone_number }}" name="phone_number"  >
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">Votre cat??gorie:</label>
                             <select name="categorie" class="selectpicker" id="categorie">
                             <option value="{{ $user->categorie}}" selected>{{ $user->categorie}}</option>
                                <option value="Constructions et Travaux">Constructions et Travaux</option>
                                <option value="Industrie et fabrication">Industrie et fabrication</option>
                                <option value="D??coration et Am??nagement">D??coration et Am??nagement</option>
                                <option value="Traiteurs et Gateaux">Traiteurs et Gateaux</option>
                                <option value="Nettoyage et jardinage">Nettoyage et jardinage</option>
                                <option value="Location de v??hicules">Location de v??hicules</option>
                                <option value="Securit?? et Alarme">Securit?? et Alarme</option>
                                <option value="Menuiserie et Meubles">Menuiserie et Meubles</option>
                                <option value="H??tellerie">H??tellerie</option>
                                <option value="Esth??tique et Beaut??">Esth??tique et Beaut??</option>
                                <option value="Comptabilit?? et Economie">Comptabilit?? et Economie</option>
                                <option value="Maintenance et infromatique">Maintenance et infromatique</option>
                                <option value="Paraboles et d??mos">Paraboles et d??mos</option>
                                <option value="R??paration Electromenager">R??paration Electromenager</option>
                                <option value="Juridique">Juridique</option>
                                <option value="Ecoles et formations">Ecoles et formations</option>
                                <option value="Transport et d??m??nagement">Transport et d??m??nagement</option>
                                <option value="Publicit?? et communication">Publicit?? et communication</option>
                                <option value="Froid et climatisation">Froid et climatisation</option>
                                <option value="M??decine et sant??">M??decine et sant??</option>
                                <option value="R??paration auto et diagnostic">R??paration auto et diagnostic</option>
                                <option value="Projet et ??tudes">Projet et ??tudes</option>
                                <option value="Bureautique et internet">Bureautique et internet</option>
                                <option value="Impression et ??dition">Impression et ??dition</option>
                                <option value="Image et son">Image et son</option>
                                <option value="Couture et confection">Couture et confection</option>
                                <option value="Ev??nement et Divertissement">Ev??nement et Divertissement</option>
                                <option value="R??paration Electronique">R??paration Electronique</option>
                                <option value="Voyage">Voyage</option>
                                <option value="Jeux">Jeux</option>
                                 <option value="Accessoires et Modes">Accessoires et Modes</option>
                                <option value="V??tements et Chaussures">V??tements et Chaussures </option>
                                                                
                            </select>  
                            </div>                        

                  
                        
                            <div class="form-group row">
                                <label for="function" class="col-md-4 col-form-label text-md-right">L'activit??:</label>                   
                            <textarea name="function" id="function" placeholder="Example : Soudeur , Ma??on , peintre , Vendeur , Comptable , Avocat ..." list="functions" cols="30" rows="10">
                                {{ $user->function }}
                            </textarea>

                            </div>

                            <div class="form-group row" hidden>
                                <label for="type_payement" class="col-md-4 col-form-label text-md-right">Moyen de payement:</label>
    
                                <div class="col-md-6">
                                    <select name="type_payement" class="form-control" id="type_payement">
                                        <option value="CCP" selected>1- CCP </option>
                                        <option value="Carte Edahabia">2- Carte Edahabia </option>
                                        <option value="en esp??ces">3- Payement en esp??ces </option>
                         
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
                                <option value="B??ja??a">06  B??ja??a  </option> 
                                <option value="Biskra">07  Biskra  </option> 
                                <option value="B??char">08  B??char  </option> 
                                <option value="Blida">09  Blida  </option> 
                                <option value="Bouira">10  Bouira  </option> 
                                <option value="Tamanrasset">11  Tamanrasset  </option> 
                                <option value="T??bessa">12  T??bessa  </option> 
                                <option value="Tlemcen">13  Tlemcen  </option> 
                                <option value="Tiaret">14  Tiaret  </option> 
                                <option value="Tizi Ouzou">15  Tizi-Ouzou  </option> 
                                <option value="Alger">16  Alger  </option> 
                                <option value="Djelfa">17  Djelfa  </option> 
                                <option value="Jijel">18  Jijel  </option> 
                                <option value="S??tif">19  S??tif  </option> 
                                <option value="Saida">20  Saida  </option> 
                                <option value="Skikda">21  Skikda  </option> 
                                <option value="Sidi-Bel- Abb??s">22  Sidi-Bel- Abb??s </option> 
                                <option value="Annaba">23  Annaba  </option> 
                                <option value="Guelma">24  Guelma  </option> 
                                <option value="Constantine">25  Constantine  </option> 
                                <option value="M??d??a">26  M??d??a  </option> 
                                <option value="Mostaganem">27  Mostaganem  </option> 
                                <option value="M'Sila">28  M'Sila  </option> 
                                <option value="Mascara">29  Mascara  </option> 
                                <option value="Ouargla">30  Ouargla  </option> 
                                <option value="Oran">31  Oran  </option> 
                                <option value="illizi">33  illizi  </option> 
                                <option value="Bordj Bou Arreridj">34  Bordj-Bou- Arreridj </option> 
                                <option value="Boumerd??s">35  Boumerd??s  </option> 
                                <option value="El Tarf">36  El-Taref  </option> 
                                <option value="Tindouf">37  Tindouf  </option> 
                                <option value="Tissemsilt">38  Tissemsilt  </option> 
                                <option value="El Oued">39  El-Oued  </option> 
                                <option value="Khenchela">40  Khenchela  </option> 
                                <option value="Souk Ahras">41  Souk-Ahras  </option> 
                                <option value="Tipaza">42  Tipaza  </option> 
                                <option value="Mila">43  Mila  </option> 
                                <option value="A??n Defla">44  A??n-Defla  </option> 
                                <option value="Na??ma">45  Na??ma  </option> 
                                <option value="A??n T??mouchent">46  A??n- T??mouchent </option> 
                                <option value="Ghardaia">47  Ghardaia  </option> 
                                <option value="Relizane">48  Relizane  </option> 
                                <option value="Timimoun">49 Timimoun</option>
                                <option value="Bordj Badji Mokhtar">50 Bordj Badji Mokhtar</option>
                                <option value="Ouled Djellal">51 Ouled Djellal</option>
                                <option value="B??ni Abb??s">52 B??ni Abb??s</option>
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
                                <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N??Compte:</label>
                                
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
