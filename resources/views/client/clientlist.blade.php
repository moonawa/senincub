@extends('client.clientlayout')
   
@section('content')
<div class="row ">
<div class="col-md-6">
<a href="{{ route('clients.create') }}" class="btn btna mb-2">Add</a> 
</div>
<div class="col-md-6">
  <form action="/search" method="GET">
   <div class="input-group">
      <input type="search" name="search" placeholder="recherche par nom " class="form-control">
      <span class="input-group-prepend">
         <button type="submit" class="btn btna">Rechercher</button>
      </span>
   </div>
  </form>
  </div>
  </div>
 <br>

  
<form action="/alloue" method="GET">
<input type="text" name="email" placeholder="email user">
<input type="text" name="emails" placeholder="email client">
   <button type="submit" class="btn btna">Alloue</button>
</form>
<br>
<form action="/detach" method="GET">
<input type="text" name="email" placeholder="email user">
<input type="text" name="emails" placeholder="email client">
   <button type="submit" class="btn btna">Detache</button>
</form>

   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom client</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Secteur</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($clients as $product)
              <tr>
                 <td>{{ $product->nom_complet }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                 <td>{{ $product->secteur_id }}</td>
                 <td><a href="{{ route('clients.edit',$product->id)}}" class="btn btna">Edit</a></td>
                 <td>
                 <form action="{{ route('clients.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btna" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $clients->links() !!}
       </div> 
   </div>
   @endsection 
