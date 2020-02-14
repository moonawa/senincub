
@extends('entreprise.entrepriselayout')
@section('content')


   <div>
   @foreach($user as $use)               
     <p>{{$use->name}}</p>  

            <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Secteur</th>
                 <th>Contacter</th>
              </tr>
           </thead>
           <tbody>
           
            @foreach( $use->entreprises as $value)
            <tr>
                 <td>{{$value->nom_entreprise}}  </td>
                 <td>{{ $value->telephone }}</td>
                 <td>{{ $value->mail }}</td>
               
            
           
             @endforeach
             </tbody>
          </table>

             @endforeach
      
        @yield('content')
    </div>

    </body>
</html>

@endsection 
