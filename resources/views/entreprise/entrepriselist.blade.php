@include('superadmin.bord')

<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<div class="col-md-6">
<a href="{{route('entreprises.create') }}" class="btn btn-success mb-2">Ajouter</a> 
</div>
<div class="col-md-6">
  <form action="/search" method="GET">
   <div class="input-group">
      <input type="search" name="search" placeholder="recherche par nom d'entreprise" class="form-control">
      <span class="input-group-prepend">
         <button type="submit" class="btn btn-success">Rechercher</button>
      </span>
   </div>
  </form>
  </div>
<br>
   <div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom Entreprise</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <td colspan="3">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($entreprises as $product)
              <tr>
                 <td>{{ $product->nom_entreprise }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                 <td><a href="{{ route('entreprises.edit',$product->id)}}" class="btn btn-success">Modifier</a></td>
                 
                <td><a class="btn btn-success" href="ensemble">Détails</a> </td>
                <td>
                 <form action="{{ route('entreprises.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $entreprises->links() !!}
       </div> 
   </div>


   </div>

   </div>
   @include('layouts.back-footer')