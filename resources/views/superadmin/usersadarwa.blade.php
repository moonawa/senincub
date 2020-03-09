@include('superadmin.bord')

<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<div class="col-md-6">
<a href="#" class="btn btn-success mb-2">Ajouter</a> 
</div>

<br>
   <div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom </th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Mètier</th>
                 <th>Tache</th>

              </tr>
           </thead>
           <tbody>
              @foreach($users as $product)
              <tr>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->email }}</td>
                 @foreach( $product->metiers as $o)
                 <td>{{ $o->nom }}</td>
                 @endforeach
                 
                
                @foreach( $product->taches as $on)
                 <td>{{ $on->description }}</td>
                 @endforeach
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $users->links() !!}

       </div> 
   </div>


   </div>

   </div>
   @include('layouts.back-footer')