
@extends('entreprise.entrepriselayout')
@section('content')


  

            @foreach($categories as $category)
            <p> Nom Entreprise: {{$category->nom_entreprise}}  </p>
            <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th> </th>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Metier</th>
                 <th>Action</th>
              </tr>
           </thead>
           <tbody>
           
            @foreach($category->users as $post)
            <tr>
            <td>{{$post->id}}  </td>
                 <td>{{$post->name}}  </td>
                 <td>{{$post->telephone }}</td>
                 <td>{{$post->email }}</td>
                 @foreach($post->metiers as $val)
                 <td>{{$val->nom }}</td>
                 @endforeach
                 <td><button class="btn btna" type="submit">Contacter</button></td>          
             @endforeach
             </tbody>
          </table>

      
   @endforeach
        @yield('content')


    </body>
</html>

@endsection 
