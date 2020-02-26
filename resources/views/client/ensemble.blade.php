@include('superadmin.bord')


<div class="container-fluid">



<br>
   <div class="row">
        <div class="col-12">
        @foreach($entreprise as $entreprises)
       <p>{{$entreprises->nom_complet}}</p> 
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom Entreprise </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($entreprises->entreprises as $product)
              <tr>
                 <td>{{ $product->nom_entreprise }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                 
                 <td><a class="btn btn-success" href="#">Contacter</a> </td>
                 <td>
                  <a href="/detach" class="btn btn-danger">Supprimer</a>
                </td>
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


