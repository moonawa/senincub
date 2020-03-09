@include('superadmin.bord')


<div class="container-fluid">

<div class="row ">
<div class="col-md-6">
<a href="{{ route('prestataires.create') }}" class="btn btn-success mb-2">Ajouter</a> 
</div>

  </div>
 <br>

  

   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom Prestataire</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Action</th>
                 <th>Tache</th>

              </tr>
           </thead>
           <tbody>
              @foreach($prestataires as $product)
              <tr>
                 <td>{{ $product->nom_complet }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                
                <td><a href="/pres" class="btn btn-success">Détails</a></td>
                @foreach($product->taches as $rr)
                  <td>{{ $rr->description }}</td>
                @endforeach
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $prestataires->links() !!}
       </div> 
   </div>
   </div>

   @include('layouts.back-footer')