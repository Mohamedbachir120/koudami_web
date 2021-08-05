@extends('layouts.layout_moderator')

@section('content')
 <div class="card">
                <div class="card-header bg-dark text-center text-light"><h4>{{ __('Dashboard') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       <a href="/fix_issues" class="btn btn-success m-3"> <i class="fas fa-sync-alt"></i>Synchroniser</a>
                        
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>objet de l'opération</th>
                                    <th>Date de l'opération</th>
                                </tr>
                                </thead>
                        <tbody>    
                        @foreach ($operations as $item)
                        <tr>
                        <td>{{ $item->id }} </td> 
                         <td> {{ $item->object }} </td>
                        <td> {{ $item->created_at  }}</td>
                         </tr>
                        @endforeach
                        </tbody>
                    </table> 
                    {{ $operations->links() }}


                    </div>
            </div>
        </div>
@endsection

<style>

</style>
<script>


var v="{{ session('msg') }}";

if(v.length >0){
    alert(v);
}


</script>

