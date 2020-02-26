
@include('layouts.back-head')


   <div>
   @foreach($categories as $category)               
     <p>{{$category->name}}</p>  
     
            <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Action</th>
              </tr>
           </thead>
           <tbody>
           
            @foreach($category->entreprises as $post)
            <tr>
                 <td>{{$post->nom_entreprise}}  </td>
                 <td>{{ $post->telephone }}</td>
                 <td>{{ $post->mail }}</td>
                 <td><button class="btn btn-success">Contacter</button></td> 
            
           
             @endforeach
             </tbody>
          </table>

             @endforeach
      
        @yield('content')
    </div>

    </body>
</html>

@include('layouts.back-footer')
