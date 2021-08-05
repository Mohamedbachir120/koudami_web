
@extends('layouts.msg')

@section('content')

<div class="d-flex flex-row p-1 align-items-start flex-wrap">
        
  <div class="col-lg-3  bg-light rounded p-1">
    <ul class="navbar-nav d-flex flex-column p-0">
    <li  id="menu_title" class="w-100 p-2 bg-dark text-center text-light rounded my-1">  
       <h4> Accès rapide</h4>
    </li>
        <li><a href="/home" class="btn border tex-center  w-100"><i class="fa fa-home"></i> Acceuil</a></li>
        <li><a href="/messagerie" class="btn  border tex-center w-100 mt-1"><i class="fa fa-weixin"></i> Messagerie </a></li>
 

  </ul>

  
  
  </div>
        <div class="col-lg-9">
            <div class="card p-0">
            <div class="card-header">
              @if(Auth::user()->type_compte == "admin")
              <a href="/home/show_users/detail_user/{{ $user->id }}" target="_blank"><img src="/css/avatar.png" alt="user" width="50px" height="50px"></a>
              @else
              <img src="/css/avatar.png" alt="user" width="50px" height="50px">
              @endif
              <strong> {{ $user->name }} - {{ $user->prenom }} </strong> </div>

                <div class="card-body d-flex flex-column align-items-center">
                    <ul class="cont" id="conti">
                    <div class="media my-2"  v-for="message in messages">
                        <div class="media-body">
                        

                        <div v-if="message.sender_id == {{ $id }}">  
                          <div class="d-flex flex-column sender_msg"> 
                         <li class="sender msg">
                                
                            @{{message.body}}
                            
                         </li>
                         <span class="date">
                          @{{message.created_at}}
                           
                         </span>
                        </div>
                        </div>
                        <div v-else>
                          <div class="d-flex flex-column receiver_msg"> 
                          
                          <li class="receiver">
                        
                          @{{message.body}}
                        </li>
                        <span class="date">
                          @{{message.created_at}}
                           
                         </span>
                        </div>
                        
                        
                        </div>
                      </div>
                    </div>
                 
                </ul>
                <div class="send row">
                <input type="text" name="body" id="body" v-model="messageBox">
                <button type="submit" class="btn btn-primary" @click.prevent="postmessage">
                  <i class="fa fa-paper-plane"></i>              </button>
                </div>
              </div>
            </div>
        </div>
</div>
@section('scripts')
<script>
    
const app = new Vue({
    el: '#app',
   
    data: {
        messages: {},
        messageBox: '',
        id:{!! $id !!}
        },
        
      mounted() {
        this.getmessages();
        
      },
      methods: {
        getmessages() {
          axios.get('/chatts/'+this.id)
                .then((response) => {
                  this.messages = response.data
                })
                .catch(function (error) {
                  console.log(error);
                });
        },
     
        
        postmessage() {
            axios.post('/send/'+this.id, {
              body: this.messageBox
            })
            .then((response) => {
              this.messages.push(response.data);
              this.messageBox = '';
              this.getmessages();
            })
            .catch((error) => {
              console.log(error);
            })
          },
         

    }
   
});    
</script>
@endsection
@endsection
<style>
  .date{
    font-size:10px;
    font-weight: bold; 
  }
  #menu_title,thead,.card-header{
    text-align: center;
    background: linear-gradient(130deg,dodgerblue,blueviolet);
    color: white;
} 
#side_admin{
  border-radius:6px; 
}  


#conti{
      max-height: 300px;
      overflow-y: scroll;
      min-width: 100%;
    }
    .sender,.receiver{
    list-style: none;
    color: white;
    border-radius:5px; 
    padding: 5px;
    max-width: 400px;
  }
.sender{
    background: linear-gradient(rgb(202, 202, 202),rgb(46, 154, 255));
  }
.receiver{
    background: rgb(219, 219, 219);
    color: #000;
   }
.sender_msg{
  float: left;

} 
.receiver_msg{
  float: right;

}  
@media screen and (max-width: 650px) {
  .sender,.receiver{
  max-width: 200px;
  }

}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$( document ).ready(function() {
    $("#conti").animate({ scrollTop: $('#conti').prop("scrollHeight")}, 0);
});
  
   </script>
