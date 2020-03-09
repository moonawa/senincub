
@include('superadmin.bord')




<div>
@foreach($entreprise as $ese)               
  <p>{{$ese->name}}</p>  

         @foreach( $ese->entreprises as $value)
         <h2> {{$value->nom_entreprise}}  </h2>
         <table class="table table-bordered" id="laravel_crud">
        <thead>
           <tr>
              <th>Nom </th>
              <th>Téléphone</th>
              <th>Email</th>
              <th>Métier</th>
              <th colspan="2">Action</th>
              <th>Taches</th>
           </tr>
        </thead>
        <tbody>
        
         @foreach( $value->users as $values)
            <tr>
                <td> {{$values->name}}  </td>
                <td>{{ $values->telephone }}</td>
                <td>{{ $values->email }}</td>
                @foreach($values->metiers as $val)
                    <td>{{ $val->nom }}</td>
                @endforeach
                <td><a href="{{ route('users.edit',$values->id)}}" class="btn btn-success">Modifier</a></td> 

                <td>
                <form action="{{ route('users.destroy', $values->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>              
                </td>
                @foreach( $values->taches as $on)
                 <td>{{ $on->description }}</td>
                 @endforeach
                
            </tr>
          @endforeach
          </tbody>
       </table>

          @endforeach
   
@endforeach
     @yield('content')
 </div>

 </body>
</html>

@include('layouts.back-footer')