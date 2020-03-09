@include('superadmin.bord')


<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>


   <div class="row">
        <div class="col-12">
        @foreach($entreprise as $entreprises)
       <p>{{$entreprises->nom_entreprise}}</p> 
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Metier</th>
                 <td colspan="3">Tache</td>
              </tr>
           </thead>
           <tbody>
              @foreach($entreprises->users as $product)
              <tr>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->email }}</td>
                 @foreach($product->metiers as $prod)
                 <td>{{$prod->nom }}</td>
                 @endforeach
                 @foreach($product->taches as $pro)
                 <td>{{$pro->description }}</td>
                 @endforeach
                
                 
              </tr>
              @endforeach
           </tbody>
          </table>
          @endforeach

       </div> 
   </div>


   </div>

   </div>
   @include('layouts.back-footer')



