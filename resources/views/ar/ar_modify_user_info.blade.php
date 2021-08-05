@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light text-center">  {{ $user->name }} - {{ $user->prenom }}  تغيير المعلومات الشخصية ب </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                   
                    @endif
                 
                    <form method="POST" action="/update_user/{{ $id }}">
                        @csrf

                        <div class="form-group row justify-content-end">

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="name" class="col-md-3 col-form-label text-md-right">اللقب</label>

                        </div>
                        <div class="form-group row justify-content-end">
                         
                            <div class="col-md-4">
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $user->prenom }}"  >
                            </div>
                            <label for="prenom" class="col-md-3 col-form-label text-md-right">الاسم</label>

                        </div>
                     
                        <div class="form-group row justify-content-end">
                           
                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-3 col-form-label text-md-right">البريد الالكتروني</label>

                        </div>
                        <div class="form-group row justify-content-end">
                           
                            <div class="col-md-4">
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" value="{{ $user->phone_number }}" name="phone_number"  >
                            </div>
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">رقم الهاتف</label>

                        </div>
                     
                        <div class="form-group row justify-content-end">
                             <select name="categorie" class="selectpicker" id="categorie">
                             <option value="{{ $user->categorie}}" selected>{{ $user->categorie}}</option>
                             <option value="Constructions et Travaux">الانشاءات والاعمال</option>
                             <option value="Industrie et fabrication">الصناعة والتصنيع</option>
                             <option value="Décoration et Aménagement">الديكور والترتيب</option>
                             <option value="Traiteurs et Gateaux">حلويات</option>
                             <option value="Nettoyage et jardinage">التنظيف والبستنة</option>
                             <option value="Location de véhicules">تأجير المركبات</option>
                             <option value="Securité et Alarme">أجهزة الامان</option>
                             <option value="Menuiserie et Meubles">النجارة والأثاث</option>
                             <option value="Hôtellerie">فندقة</option>
                             <option value="Esthétique et Beauté">تجميل</option>
                             <option value="Comptabilité et Economie">المحاسبة والاقتصاد</option>
                             <option value="Maintenance et infromatique">الصيانة و اعلام آلي</option>
                             <option value="Paraboles et démos">تثبيت أجهزة الاستقبال</option>
                             <option value="Réparation Electromenager">إصلاح الاجهزة المنزلية</option>
                             <option value="Juridique">قانون</option>
                             <option value="Ecoles et formations">المدارس و التكوين</option>
                             <option value="Transport et déménagement">نقل و المواصلات</option>
                             <option value="Publicité et communication">اعلان و المواصلات</option>
                             <option value="Froid et climatisation">التبريد والتكييف</option>
                             <option value="Médecine et santé">الطب والصحة</option>
                             <option value="Réparation auto et diagnostic">إصلاح وتشخيص السيارات</option>
                             <option value="Projet et études">بحوث و مشاريع</option>
                             <option value="Bureautique et internet">مكتبيات و انترنت</option>
                             <option value="Impression et édition">طباعة و نشر</option>
                             <option value="Image et son">سمعي بصري</option>
                             <option value="Couture et confection">الخياطة والتفصيل</option>
                             <option value="Evènement et Divertissement">ترفيه و لقاءات</option>
                             <option value="Réparation Electronique">تصليح اجهزة الكترونية</option>
                             <option value="Voyage">سفر</option>
                             <option value="Jeux">الالعاب</option>
                             <option value="Accessoires et Modes">إكسسوارات وأزياء</option>
                             <option value="Vêtement et chaussures">ألبسة و أحذية</option>
                            
                            </select>  
                            <label for="categorie" class="col-md-3 col-form-label text-md-right">الصنف</label>

                            </div>                        

                  <div class="form-group row justify-content-end">

                  <textarea name="function" id="function" placeholder="مثال : بناء ، لحام ، دهان ، جزار ، محامي " list="functions" cols="30" rows="10">{{ $user->function}} </textarea>

                    <label for="function" class="col-md-3 col-form-label text-md-right">الوظيفة</label>

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
                <div class="form-group row" hidden>
                    <label for="Ncompte" class="col-md-4 col-form-label text-md-right">N°Compte:</label>
                    
                    <div class="col-md-6">
                    <input id="Ncompte" type="text" class="form-control" name="Ncompte" value="0000000" >
                    </div>
    
               </div>

                 

                        
                        @if(Auth::user()->type_compte=="admin" || Auth::user()->type_compte=="moderator")
                     
                       <div class="form-group row">
                       <label for="date_valid" class="col-md-4 col-form-label text-md-right">Date du prochaine payement:</label>

                       <div class="col-md-6">

                       <input id="date_valid" type="text" class="form-control" name="date_valid"  value="{{ $user->date_valid}}">
                       </div>
                       </div>

                       <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-right">état:</label>
 
                       <div class="col-md-6">

                        <input id="state" type="text" class="form-control" name="state"  value="{{ $user->state}}">
                        </div>
                        
                       </div>
                      @endif
                       <div class="form-group row   justify-content-start mx-2">
                            <button type="submit" class="btn btn-primary" id="submit">
                            تأكيد
                            </button>
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

const myMap = new Map();
myMap.set('Adrar',['Adrar', 'Tamest', 'Charouine', 'Reggane', 'InZghmir', 'Tit', 'KsarKaddour', 'Tsabit', 'Timimoun', 'OuledSaïd', 'ZaouietKounta', 'Aoulef', 'Tamekten', 'Tamantit', 'Fenoughil', 'Tinerkouk', 'Deldoul', 'Sali', 'Akabli', 'Metarfa', 'OuledAhmedTammi', 'Bouda', 'Aougrout', 'Talmine', 'BordjBadjiMokhtar', 'Sebaa', 'OuledAïssa', 'Timiaouine']);
myMap.set('Chlef',['Chlef','Ténès','Bénairia','El Karimia','Tadjena	Abou','Taougrite','Beni Haoua','Sobha','Harchoun','Ouled Fares','Sidi Akkacha','Boukadir','Beni Rached','Talassa','Harenfa','Oued Goussine','Dahra','Ouled Abbes','Sendjas','Zeboudja','Oued Sly','Abou El Hassan','El Marsa','Chettia','Sidi Abderrahmane','Moussadek','El Hadjadj','Labiod Medjadja','Oued Fodda','Ouled Ben','Bouzeghaia','Aïn Merane','Oum Drou','Breira','Beni Bouateb']);    
myMap.set('Laghouat',['Laghouat','Ksar El Hirane','Bennasser Benchohra','Sidi Makhlouf','Hassi Delaa','Hassi R\'Mel','Aïn Madhi','Tadjemout','Kheneg','Gueltat Sidi Saad','Aïn Sidi Ali','Beidha','Brida','El Ghicha','Hadj Mechri','Sebgag','Taouiala','Tadjrouna','Aflou','El Assafia','Oued Morra','Oued M\'Zi','El Houaita','Sidi Bouzid']); 
myMap.set('Oum el Bouaghi',["Oum el Bouaghi","Aïn Beïda","Aïn M'lila","Behir Chergui","El Amiria","Sigus","El Belala","Aïn Babouche","Berriche","Ouled Hamla","Dhalaa","Aïn Kercha","Hanchir Toumghani","El Djazia","Aïn Diss","Fkirina","Souk Naamane","Zorg","El Fedjoudj Boughrara Saoudi","Ouled Zouaï","Bir Chouhada","Ksar Sbahi","Oued Nini","Meskiana","Aïn Fakroun","Rahia","Aïn Zitoun","Ouled Gacem","El Harmilia"]);
myMap.set('Batna',["Batna","Ghassira","Maafa","Merouana","Seriana","Menaa","ElMadher","Tazoult","N'Gaous","Guigba","Inoughissen","OuyounElAssafir","Djerma","Bitam","AbdelkaderAzil","Arris","Kimmel","Tilatou","AïnDjasser","OuledSellam","Tigherghar","AïnYagout","Sefiane","Fesdis","Rahbat","Tighanimine","Lemsane","KsarBellezma","Seggana","Ichmoul","FoumToub","BenFoudhalaElHakania","OuedElMa","Talkhamt","Bouzina","Chemora","OuedChaaba","Taxlent","Gosbat","OuledAouf","Boumagueur","Barika","Djezar","T'Kout","AïnTouta","Hidoussa","TenietElAbed","OuedTaga","OuledFadel","Timgad","RasElAioun","Chir","OuledSiSlimane","ZanatElBeida","M'doukel","OuledAmmar","ElHassi","Lazrou","Boumia(Batna)","Boulhilat","Larbaâ",]);
myMap.set('Béjaïa',["Béjaïa","Amizour","Ferraoun","Taourirt Ighil","Chellata","Tamokra","Timezrit","Souk El Ténine","M'cisna","Tinabdher","Tichy","Semaoun","Kendira","Tifra","Ighram","Amalou","Ighil Ali","Fenaïa Ilmaten","Toudja","Darguina","Sidi-Ayad","Aokas","Ait Djellil","Adekar","Akbou","Seddouk","Tazmalt","Aït-R'zine","Chemini","Souk-Oufella","Taskriout","Tibane","Tala Hamza","Barbacha","Aït Ksila","Ouzellaguen","Bouhamza","Beni Mellikeche","Sidi-Aïch","El Kseur","Melbou","Akfadou","Leflaye","Kherrata","Draâ El-Kaïd","Tamridjet","Aït-Smail","Boukhelifa","Tizi N'Berber","Aït Maouche","Oued Ghir","Boudjellil"]);
myMap.set('Biskra',["Aïn Naga","Aïn Zaatout","Biskra","Bordj Ben Azzouz","Bouchagroune","Branis","Chetma","Djemorah","El Feidh","El Ghrous","El Hadjeb","El Haouch","El Kantara","El Mizaraa","El Outaya","Foughala","Khenguet Sidi Nadji","Lichana","Lioua","M'Chouneche","Mekhadma","M'Lili","Oumache","Ourlal","Sidi Okba","Tolga","Zeribet El Oued"]);
myMap.set('Béchar',["Béchar","Erg Ferradj","Ouled Khoudir","Meridja ","Timoudi","Lahmar	","Béni Abbès","Beni Ikhlef","Mechraa Houari Boumedienne","Kenadsa","Igli","Tabelbala","Taghit","El Ouata","Boukais ","Mougheul","Abadla","Kerzaz","Ksabi","Tamtert","Beni Ounif"]);
myMap.set('Blida',["Blida","Chebli","Bouinan","Oued Alleug","Ouled Yaïch","Chréa","El Affroun","Chiffa","Hammam Melouane","Benkhelil","Soumaa","Mouzaia","Souhane","Meftah","Ouled Slama","Boufarik","Larbaa","Oued Djer","Beni Tamou","Bouarfa","Beni Mered","Bougara","Guerouaou","Aïn Romana","Djebabra"]);
myMap.set('Bouira',["Aïn Bessem","Hanif","Aghbalou","Aïn El Hadjar","Ahl El Ksar","Aïn Laloui","Ath Mansour","Aomar","Aïn El Turc","Aït Laziz","Bouderbala","Bechloul","Bir Ghbalou","Boukram","Bordj Okhriss","Bouira","Chorfa","Dechmia","Dirrah","Djebahia","El Hakimia","El Hachimia","El Adjiba","El Khabouzia","El Mokrani","El Asnam","Guerrouma","Haizer","Hadjera Zerga","Kadiria","Lakhdaria","M'Chedallah","Mezdour","Maala","Maamora","Oued El Berdi","Ouled Rached","Raouraoua","Ridane","Saharidj","Sour El Ghouzlane","Souk El Khemis","Taguedit","Taghzout","Zbarbar"]);
myMap.set('Tamanrasset',["Tamanrasset","Abalessa","In Ghar","In Guezzam","Idles","Tazrouk","Tin Zaouatine","In Salah","In Amguel","Foggaret Ezzaouia"]);
myMap.set('Tébessa',["Tébessa","Bir el-Ater","Cheria","Stah Guentis","El Aouinet","El Houidjbet","Safsaf El Ouesra","Hammamet","Negrine","Bir Mokkadem","El Kouif","Morsott","El Ogla","Bir Dheb","Ogla Melha","Guorriguer","Bekkaria","Boukhadra","Ouenza","El Ma Labiodh","Oum Ali","Tlidjene","Aïn Zerga","El Meridj","Boulhaf Dir","Bedjene","El Mezeraa","Ferkane"]);
myMap.set('Tlemcen',["Tlemcen","Beni Mester","Aïn Tallout","Remchi","El Fehoul","Sabra","Ghazaouet","Souani","Djebala","El Gor","Oued Lakhdar","Aïn Fezza","Ouled Mimoun","Amieur","Aïn Youcef","Zenata","Beni Snous","Bab El Assa","Dar Yaghmouracene","Fellaoucene","Azails","Sebaa Chioukh","Terny Beni Hdiel","Bensekrane","Aïn Nehala","Hennaya","Maghnia","Hammam Boughrara","Souahlia","MSirda Fouaga","Aïn Fetah","El Aricha","Souk Tlata","Sidi Abdelli","Sebdou","Beni Ouarsous","Sidi Medjahed","Beni Boussaid","Marsa Ben M'Hidi","Nedroma","Sidi Djillali","Beni Bahdel","El Bouihi","Honaïne","Tienet","Ouled Riyah","Bouhlou","Beni Khellad","Aïn Ghoraba","Chetouane","Mansourah","Beni Semiel","Aïn Kebira",]);
myMap.set('Tiaret',["Aïn Bouchekif","Aïn Deheb","Aïn El Hadid","Aïn Kermes","Aïn Dzarit","Bougara","Chehaima","Dahmouni","Djebilet Rosfa","Djillali Ben Amar","Faidja","Frenda","Guertoufa","Hamadia","Ksar Chellala","Madna","Mahdia","Mechraa Safa","Medrissa","Medroussa","Meghila","Mellakou","Nadorah","Naima","Oued Lilli","Rahouia","Rechaïga","Sebaïne","Sebt","Serghine","Si Abdelghani","Sidi Abderahmane","Sidi Ali Mellal","Sidi Bakhti","Sidi Hosni","Sougueur","Tagdemt","Takhemaret","Tiaret","Tidda","Tousnina","Zmalet El Emir Abdelkader",]);
myMap.set('Tizi Ouzou',["Tizi Ouzou","Ain El Hammam","Akbil","Freha","Souamaâ","Mechtras","Irdjen","Timizart","Makouda","Draâ El Mizan","Tizi Gheniff","Bounouh","Aït Chafâa","Frikat","Beni Aïssi","Aït Zmenzer","Iferhounène","Azazga","Illoula Oumalou","Yakouren","Larbaâ Nath Irathen","Tizi Rached","Zekri","Ouaguenoun","Aïn Zaouia","Imkiren","Aït Yahia","Aït Mahmoud","Mâatkas","Aït Boumahdi","Abi Youcef","Beni Douala","Illilten","Bouzeguène","Aït Aggouacha","Ouadhia","Azeffoun","Tigzirt","Aït Aïssa Mimoun","Boghni","Ifigha","Aït Oumalou","Tirmitine","Akerrou","Yatafen","Ath Zikki","Draâ Ben Khedda","Aït Ouacif","Idjeur","Mekla","Tizi N'Tleta","Aït Yenni","Aghribs","Iflissen","Boudjima","Aït Yahia Moussa","Souk El Thenine","Aït Khellili","Sidi Namane","Iboudraren","Agouni Gueghrane","Mizrana","Imsouhel","Tadmaït","Aït Bouaddou","Assi Youcef","Aït Toudert"]);
myMap.set('Alger',["Sidi M'Hamed","El Madania","Belouizdad","Bab El Oued","Bologhine","Casbah","Oued Koriche","Bir Mourad Raïs","El Biar","Bouzareah","Birkhadem","El Harrach","Baraki","Oued Smar","Bachdjerrah","Hussein Dey","Kouba","Bourouba","Dar El Beïda","Bab Ezzouar","Ben Aknoun","Dely Ibrahim","El Hammamet","Raïs Hamidou","Djasr KasentinaNote","El Mouradia","Hydra","Mohammadia","Bordj El Kiffan","El Magharia","Beni Messous","Les Eucalyptus","Birtouta","Tessala El Merdja","Ouled Chebel","Sidi Moussa","Aïn Taya","Bordj El Bahri","El Marsa","H'raoua","Rouïba","Reghaïa","Aïn Benian","Staoueli","Zeralda","Mahelma","Rahmania","Souidania","Cheraga","Ouled Fayet","El Achour","Draria","Douera","Baba Hassen","Khraicia","Saoula",]);
myMap.set('Djelfa',["Aïn Chouhada","Aïn El Ibel","Aïn Feka","Aïn Maabed","Aïn Oussara","Amourah","Benhar","Beni Yagoub","Birine","Bouira Lahdab","Charef","Dar Chioukh","Deldoul","Djelfa","Douis","El Guedid","El Idrissia","El Khemis","Faidh El Botma","Guernini","Guettara","Had-Sahary","Hassi Bahbah","Hassi El Euch","Hassi Fedoul","Messaad","M'Liliha","Moudjebara","Oum Laadham","Sed Rahal","Selmana","Sidi Baizid","Sidi Ladjel","Tadmit","Zaafrane","Zaccar",]);
myMap.set('Jijel',["Jijel","Eraguene","El Aouana","Ziama Mansouriah","Taher","Emir Abdelkader","Chekfa","Chahna","El Milia","Sidi Maarouf","Settara","El Ancer","Sidi Abdelaziz","Kaous","Ghebala","Bouraoui Belhadef","Djimla","Selma Benziada	","Boucif Ouled Askeur","El Kennar Nouchfi","Ouled Yahia Khedrouche","Boudriaa Ben Yadjis","Kheïri Oued Adjoul","Texenna","Djemaa Beni Habibi","Bordj Tahar","Ouled Rabah","Ouadjana",]);
myMap.set('Sétif',["Aïn Abessa","Aïn Arnat","Aïn Azel","Aïn El Kebira","Aïn Lahdjar","Aïn Legradj","Aïn Oulmene","Aïn Roua","Aïn Sebt","Aït Naoual Mezada","Aït Tizi","Beni Ouartilene","Amoucha","Babor","Bazer Sakhra","Beidha Bordj","Belaa","Beni Aziz","Beni Chebana","Beni Fouda","Beni Hocine","Beni Mouhli","Bir El Arch","Bir Haddada","Bouandas","Bougaa","Bousselam","Boutaleb","Dehamcha","Djemila","Draa Kebila","El Eulma","El Ouldja","El Ouricia","Guellal","Guelta Zerka","Guenzet","Guidjel","Hamma","Hammam Guergour","Hammam Soukhna","Harbil","Ksar El Abtal","Maaouia","Maoklane","Mezloug","Oued El Barad","Ouled Addouane","Ouled Sabor","Ouled Si Ahmed","Ouled Tebben","Rasfa","Salah Bey","Serdj El Ghoul","Sétif","Tachouda","Talaifacene","Taya","Tella","Tizi N'Bechar",]);
myMap.set('Saïda',["Aïn El Hadjar","Aïn Sekhouna","Aïn Soltane","Doui Thabet","El Hassasna","Hounet","Maamora","Moulay Larbi","Ouled Brahim","Ouled Khaled","Saïda","Sidi Ahmed","Sidi Amar","Sidi Boubekeur","Tircine","Youb"]);
myMap.set('Skikda',["Aïn Bouziane","Aïn Charchar","Aïn Kechra","Aïn Zouit","Azzaba","Bekkouche Lakhdar","Bin El Ouiden","Ben Azzouz","Beni Bechir","Beni Oulbane","Beni Zid","Bouchtata","Cheraia","Collo","Djendel Saadi Mohamed","El Ghedir","El Hadaiek","El Harrouch","El Marsa","Emdjez Edchich","Es Sebt","Filfila","Hamadi Krouma","Kanoua","Kerkera","Kheneg Mayoum","Oued Zehour","Ouldja Boulballout","Ouled Attia","Ouled Hbaba","Oum Toub","Ramdane Djamel","Salah Bouchaour","Sidi Mezghiche","Skikda","Tamalous","Zerdaza","Zitouna",]);
myMap.set('Sidi Bel Abbès',["Aïn Adden","Aïn El Berd","Aïn Kada","Aïn Thrid","Aïn Tindamine","Amarnas","Badredine El Mokrani","Belarbi","Ben Badis","Benachiba Chelia","Bir El Hammam","Boudjebaa El Bordj","Boukhanafis","Chettouane Belaila","Dhaya","El Haçaiba","Hassi Dahou","Hassi Zehana","Lamtar","Makedra","Marhoum","M'Cid","Merine","Mezaourou","Mostefa Ben Brahim","Moulay Slissen","Oued Sebaa","Oued Sefioun","Oued Taourira","Ras El Ma","Redjem Demouche","Sehala Thaoura","Sfisef","Sidi Ali Benyoub","Sidi Ali Boussidi","Sidi Bel Abbes","Sidi Brahim","Sidi Chaib","Sidi Daho des Zairs","Sidi Hamadouche","Sidi Khaled","Sidi Lahcene","Sidi Yacoub","Tabia","Tafissour","Taoudmout","Teghalimet","Telagh","Tenira","Tessala","Tilmouni","Zerouala",]);
myMap.set('Annaba',["Annaba","Berrahal","El Hadjar","Eulma","El Bouni","Oued El Aneb","Cheurfa","Seraïdi","Aïn Berda","Chetaïbi","Sidi Amar","Treat",]);
myMap.set('Guelma',["Aïn Ben Beida","Aïn Larbi","Aïn Makhlouf","Aïn Reggada","Aïn Sandel","Belkheir","Ben Djerrah","Beni Mezline","Bordj Sabath","Bouhachana","Bouhamdane","Bouati Mahmoud","Bouchegouf","Boumahra Ahmed","Dahouara","Djeballah Khemissi","El Fedjoudj","Guellat Bou Sbaa","Guelma","Hammam Debagh","Hammam N'Bail","Héliopolis","Houari Boumédiène","Khezarra","Medjez Amar","Medjez Sfa","Nechmaya","Oued Cheham","Oued Fragha","Oued Zenati","Ras El Agba","Roknia","Sellaoua Announa","Tamlouka",]);
myMap.set('Constantine',["Aïn Abid","Aïn Smara","Beni Hamiden","Constantine","Didouche Mourad","El Khroub","Hamma Bouziane","Ibn Badis","Ibn Ziad","Messaoud Boudjriou","Ouled Rahmoune","Zighoud Youcef",]);
myMap.set('Médéa',["Aïn Boucif","Aïn Ouksir","Aissaouia","Aziz","Baata","Benchicao","Beni Slimane","Berrouaghia","Bir Ben Laabed","Boghar","Bou Aiche","Bouaichoune","Bouchrahil","Boughezoul","Bouskene","Chahbounia","Chellalet El Adhaoura","Cheniguel","Derrag","Deux Bassins","Djouab","Draa Essamar","El Azizia","El Guelb El Kebir","El Hamdania","El Omaria","El Ouinet","Hannacha","Kef Lakhdar","Khams Djouamaa","Ksar Boukhari","Meghraoua","Médéa","Moudjbar","Meftaha","Mezerana","Mihoub","Ouamri","Oued Harbil","Ouled Antar","Ouled Bouachra","Ouled Brahim","Ouled Deide","Ouled Hellal","Ouled Maaref","Oum El Djalil","Ouzera","Rebaia","Saneg","Sedraia","Seghouane","Si Mahdjoub","Sidi Damed","Sidi Errabia","Sidi Naamane","Sidi Zahar","Sidi Ziane","Souagui","Tablat","Tafraout","Tamesguida","Tizi Mahdi","Tlatet Eddouar","Zoubiria",]);
myMap.set('Mostaganem',["Abdelmalek Ramdane","Achaacha","Aïn Boudinar","Aïn Nouissy","Aïn Sidi Cherif","Aïn Tedles","Blad Touahria","Bouguirat","El Hassiane","Fornaka","Hadjadj","Hassi Mameche","Khadra","Kheireddine","Mansourah","Mesra","Mazagran","Mostaganem","Nekmaria","Oued El Kheir","Ouled Boughalem","Ouled Maallah","Safsaf","Sayada","Sidi Ali","Sidi Belattar","Sidi Lakhdar","Sirat","Souaflia","Sour","Stidia","Tazgait",]);
myMap.set("M'Sila",["Aïn El Hadjel","Aïn El Melh","Aïn Errich","Aïn Fares","Aïn Khadra","Belaiba","Ben Srour","Beni Ilmane","Benzouh","Berhoum","Bir Foda","Bou Saâda","Bouti Sayah","Chellal","Dehahna","Djebel Messaad","El Hamel","El Houamed","Hammam Dhalaa","Khettouti Sed El Djir","Khoubana","Maadid","Maarif","Magra","M'Cif","Medjedel","M'Sila","M'Tarfa","Ouanougha","Ouled Addi Guebala","Ouled Atia","Mohammed Boudiaf","Ouled Derradj","Ouled Madhi","Ouled Mansour","Ouled Sidi Brahim","Ouled Slimane","Oultem","Sidi Aïssa","Sidi Ameur","Sidi Hadjeres","Sidi M'Hamed","Slim","Souamaa","Tamsa","Tarmount","Zarzour",]);
myMap.set('Mascara',["Aïn Fares","Aïn Fekan","Aïn Ferah","Aïn Fras","Alaïmia","Aouf","Beniane","Bou Hanifia","Bou Henni","Chorfa","El Bordj","El Gaada","El Ghomri","El Guettana","El Keurt","El Menaouer","Ferraguig","Froha","Gharrous","Guerdjoum","Ghriss","Hachem","Hacine","Khalouia","Makdha","Mamounia","Maoussa","Mascara","Matemore","Mocta Douz","Mohammadia","Nesmoth","Oggaz","Oued El Abtal","Oued Taria","Ras El Aïn Amirouche","Sedjerara","Sehailia","Sidi Abdeldjebar","Sidi Abdelmoumen","Sidi Kada","Sidi Boussaid","Sig","Tighennif","Tizi","Zahana","Zelmata",]);
myMap.set('Ouargla',["Aïn Beida","Hassi Ben Abdellah","Hassi Messaoud","N'Goussa","Ouargla","Rouissat","Sidi Khouiled",]);
myMap.set('Oran',["Oran","Gdyel","Bir El Djir","Hassi Bounif","Es Senia","Arzew","Bethioua","Marsat El Hadjadj","Aïn El Turk","El Ançor","Oued Tlelat","Tafraoui","Sidi Chami","Boufatis","Mers El Kébir","Bousfer","El Kerma","El Braya","Hassi Ben Okba","Ben Freha","Hassi Mefsoukh","Sidi Benyebka","Misserghin","Boutlelis","Aïn El Kerma","Aïn El Bia",]);
myMap.set('El Bayadh',["El Bayadh","Rogassa","Stitten","Brezina","Ghassoul","Boualem","El Abiodh Sidi Cheikh","Aïn El Orak","Arbaouat","Bougtoub","El Kheiter","Kef El Ahmar","Boussemghoun","Chellala","Kraakda","El Bnoud","Cheguig","Sidi Ameur","El Mehara","Tousmouline","Sidi Slimane","Sidi Tifour",]);
myMap.set('Illizi',["Illizi","Djanet","Debdeb","Bordj Omar Driss","Bordj El Haouas","In Amenas",]);
myMap.set('Bordj Bou Arreridj',["Aïn Taghrout","Aïn Tesra","Belimour","Ben Daoud","Bir Kasdali","Bordj Bou Arreridj","Bordj Ghédir","Bordj Zemoura","Colla","Djaafra","El Ach","El Achir","El Anseur","El Hamadia","El Main","El M'hir","Ghilassa","Haraza","Hasnaoua","Khelil","Ksour","Mansoura","Medjana","Ouled Brahem","Ouled Dahmane","Ouled Sidi Brahim","Rabta","Ras El Oued","Sidi Embarek","Tefreg","Taglait","Teniet En Nasr","Tassameurt","Tixter",]);
myMap.set('Boumerdès',["Afir","Ammal","Baghlia","Ben Choud","Beni Amrane","Bordj Menaïel","Boudouaou","Boudouaou-El-Bahri","Boumerdes","Bouzegza Keddara","Chabet el Ameur","Corso","Dellys","Djinet","El Kharrouba","Hammedi","Issers","Khemis El-Khechna","Larbatache","Leghata","Naciria","Ouled Aïssa","Ouled Hedadj","Ouled Moussa","Si Mustapha","Sidi Daoud","Souk El Had","Taourga","Thenia","Tidjelabine","Timezrit","Zemmouri",]);
myMap.set('El Tarf',["Aïn El Assel","Aïn Kerma","Asfour","Ben Mehidi","Berrihane","Besbes","Bougous","Bouhadjar","Bouteldja","Chebaita Mokhtar","Chefia","Chihani","Dréan","Echatt","El Aioun","El Kala","El Tarf","Hammam Beni Salah","Lac des Oiseaux","Oued Zitoun","Raml Souk","Souarekh","Zerizer","Zitouna",]);
myMap.set('Tindouf',["Oum el Assel", "Tindouf"]);
myMap.set('Tissemsilt',["Ammari","Beni Chaib","Beni Lahcene","Boucaid","Bordj Bou Naama","Bordj El Emir Abdelkader","Khemisti","Larbaa","Lardjem","Layoune","Lazharia","Maacem","Melaab","Ouled Bessem","Sidi Abed","Sidi Boutouchent","Sidi Lantri","Sidi Slimane","Tamalaht","Theniet El Had","Tissemsilt","Youssoufia",]);
myMap.set('El Oued',["El Oued","Robbah","Oued El Alenda","Bayadha","Nakhla","Guemar","Kouinine","Reguiba","Hamraia","Taghzout","Debila","Hassani Abdelkrim","Hassi Khalifa","Taleb Larbi","Douar El Ma","Sidi Aoun","Trifaoui","Magrane","Beni Guecha","Ourmas","Still","M'Rara","Sidi Khellil","Tendla","El Ogla","Mih Ouansa","El M'Ghair","Djamaa","Oum Touyour","Sidi Amrane",]);
myMap.set('Khenchela',["Aïn Touila","Babar","Baghai","Bouhmama","Chechar","Chelia","Djellal","El Hamma","El Mahmal","El Oueldja","Ensigha","Kais","Khenchela","Khirane","M'Sara","M'Toussa","Ouled Rechache","Remila","Tamza","Taouzient","Yabous",]);
myMap.set('Souk Ahras',["Souk Ahras","Sedrata","Hanancha","Mechroha","Ouled Driss","Tiffech","Zaarouria","Taoura","Drea","Heddada","Khedara","Merahna","Ouled Moumene","Bir Bou Haouch","M'daourouch","Oum El Adhaim","Aïn Zana","Aïn Soltane","Ouillen","Sidi Fredj","Safel El Ouiden","Ragouba","Khemissa","Oued Keberit","Terraguelt","Zouabi",]);
myMap.set('Tipaza',["Tipaza","Menaceur","Larhat","Douaouda","Bourkika","Khemisti","Aghbal","Hadjout","Sidi Amar","Gouraya","Nador","Chaiba","Aïn Tagourait","Cherchell","Damous","Merad","Fouka","Bou Ismaïl","Ahmar El Aïn","Bouharoun","Sidi Ghiles","Messelmoun","Sidi Rached","Koléa","Attatba","Sidi Semiane","Beni Milleuk","Hadjeret Ennous",]);
myMap.set('Mila',["Ahmed Rachedi","Aïn Beida Harriche","Aïn Mellouk","Aïn Tine","Amira Arrès","Benyahia Abderrahmane","Bouhatem","Chelghoum Laid","Chigara","Derradji Bousselah","El Mechira","Elayadi Barbes","Ferdjioua","Grarem Gouga","Hamala","Mila","Minar Zarza","Oued Athmania","Oued Endja","Oued Seguen","Ouled Khalouf","Rouached","Sidi Khelifa","Sidi Merouane","Tadjenanet","Tassadane Haddada","Teleghma","Terrai Bainen","Tessala Lemtaï","Tiberguent","Yahia Beni Guecha","Zeghaia",]);
myMap.set('Aïn Defla',["Aïn Beniane","Aïn Bouyahia","Aïn Defla","Aïn Lechiekh","Aïn Soltane","Aïn Torki","Arib","Bathia","Belaas","Ben Allal","Birbouche","Bir Ould Khelifa","Bordj Emir Khaled","Boumedfaa","Bourached","Djelida","Djemaa Ouled Cheikh","Djendel","El Abadia","El Amra","El Attaf","El Hassania","El Maine","Hammam Righa","Hoceinia","Khemis Miliana","Mekhatria","Miliana","Oued Chorfa","Oued Djemaa","Rouina","Sidi Lakhdar","Tacheta Zougagha","Tarik Ibn Ziad","Tiberkanine","Zeddine",]);
myMap.set('Naâma',["Naâma","Mecheria","Aïn Sefra","Tiout","Sfissifa","Moghrar","Assela","Djeniene Bourezg","Aïn Ben Khelil","Makman Ben Amer","Kasdir","El Biod",]);
myMap.set('Aïn Témouchent',["Aghlal","Aïn El Arbaa","Aïn Kihal","Aïn Témouchent","Aïn Tolba","Aoubellil","Beni Saf","Bouzedjar","Chaabat El Leham","Chentouf","El Amria","El Emir Abdelkader","El Malah","El Messaid","Hammam Bouhadjar","Hassasna","Hassi El Ghella","Oued Berkeche","Oued Sabah","Ouled Boudjemaa","Ouled Kihal","Oulhaça El Gheraba","Sidi Ben Adda","Sidi Boumedienne","Sidi Ouriache","Sidi Safi","Tamzoura","Terga",]);
myMap.set('Ghardaïa',["Berriane","Bounoura","Dhayet Bendhahoua","El Atteuf","El Guerrara","Ghardaïa","Mansoura","Metlili","Sebseb","Zelfana",]);
myMap.set('Relizane',["Aïn Rahma","Aïn Tarek","Aarch Meknassa","Ammi Moussa","Belassel Bouzegza","Bendaoud","Beni Dergoun","Beni Zentis","Dar Ben Abdellah","Djidioua","El Guettar","El Hamadna","El Hassi","El Matmar","El Ouldja","Had Echkalla","Hamri","Kalaa","Lahlef","Mazouna","Mediouna","Mendes","Merdja Sidi Abed","Ouarizane","Oued Essalem","Oued Rhiou","Ouled Aiche","Oued El Djemaa","Ouled Sidi Mihoub","Ramka","Relizane","Sidi Khettab","Sidi Lazreg","Sidi M'Hamed Ben Ali","Sidi M'Hamed Benaouda","Sidi Saada","Souk El Had","Yellel","Zemmora",]);

$(document).ready(function () {
   /* $('select').selectize({
        sortField: 'text'
    });
*/
});
var tab=myMap.get("Adrar");
  var i=0;
  for(i=0;i<tab.length;i++){
    $("select#commune").append('<option value="'+tab[i]+'">'+tab[i]+'</option>');
        }

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
