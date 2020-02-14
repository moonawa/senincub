
@include('incube')



   <div>
   @foreach($entreprise as $ese)               
     <p>{{$ese->name}}</p>  

            @foreach($ese->entreprises as $client)
            <p> {{$client->nom_entreprise}}  </p>
            <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Contacter</th>
              </tr>
           </thead>
           <tbody>
           
            @foreach($client->clients as $value)
            <tr>
                 <td>{{$value->nom_complet}}  </td>
                 <td>{{ $value->telephone }}</td>
                 <td>{{ $value->mail }}</td>
               
            
           
             @endforeach
             </tbody>
          </table>

             @endforeach
      
   @endforeach
        @yield('content')
    </div>

    </body>
</html>

