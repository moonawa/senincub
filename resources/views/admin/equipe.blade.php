
@include('layouts.back-head')




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
              <th>Action</th>
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
              <td><a class="btn btn-success" href="/contact">Contacter</a></td> 
        
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