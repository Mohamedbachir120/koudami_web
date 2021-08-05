@extends('layouts.ar_client')

@section('content')

            <div class="card">
                <div class="card-header text-center bg-dark text-light">ايصال</div>

                <div class="card-body text-right">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p> يرجى إرفاق الإيصال أدناه لتفعيل حسابك ، قد يستغرق الإجراء بضع 
                        الدقائق   </p>
                    <p>

                    </p>
                    <br>
                   
                  
       <form action="/store_quittance" enctype="multipart/form-data"  method="POST">
        
                @csrf
               <div>      
                <div><input type="file"  name="contenu" id="file"  placeholder="contenu" required><label for="contenu">الملف</label></div>
                <div class="errors">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">ارسال</button>
                
                </div> 
 
                        </form>
                        <p>
                           يجب ان لا يتجاوز حجم الملف 10 ميغا <br>
                            jpeg، jpg، png، pdf، gif، docx، xls  الامتدادات المقبولة هي 
                        </p> 
                   
                </div>
            </div>
      
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  $( document ).ready(function() {

    $('#file').change(function(){

        var extentions=['jpeg','jpg','png','pdf','gif','docx','xls'];
        var input = document.getElementById('file').files[0];
        var tab=input.name.split('.');
        if(input.size>10000000)
        {

            $(".errors").text('taille maximale  dépacée');
            $("#submit").prop('disabled',true);
        }
        else{

            var ext=tab[tab.length-1].toLowerCase();
            if(extentions.indexOf(ext)==-1){

                $(".errors").text('extension non acceptée');
                $("#submit").prop('disabled',true);
    

            }else{

                $('.errors').fadeOut(500);
                $("#submit").prop('disabled',false);
    
            }


        }
       

       


          });

  });
</script>
<style>

.errors{
    color: red;
}
</style>