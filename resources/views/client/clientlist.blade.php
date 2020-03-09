@include('superadmin.bord')


<div class="container-fluid">

<div class="row ">
<div class="col-md-6">
<a href="{{ route('clients.create') }}" class="btn btn-success mb-2">Ajouter</a> 
</div>
<div class="col-md-6">
  <form action="/searchclient" method="GET">
   <div class="input-group">
      <input type="search" name="searchclient" placeholder="recherche par nom client" class="form-control">
      <span class="input-group-prepend">
         <button type="submit" class="btn btn-success">Rechercher</button>
      </span>
   </div>
  </form>
  </div>
  </div>
 <br>

  

   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom client</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Action</th>

              </tr>
           </thead>
           <tbody>
              @foreach($clients as $product)
              <tr>
                 <td>{{ $product->nom_complet }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                
                <td><a href="/ensembles" class="btn btn-success">Détails</a></td>
               
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $clients->links() !!}
       </div> 
   </div>
   </div>

   @include('layouts.back-footer')