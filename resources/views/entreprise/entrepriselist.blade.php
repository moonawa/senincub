@extends('entreprise.entrepriselayout')
   
@section('content')
<a href="{{ route('entreprises.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          <div class="col-md-4">
             <form action="{{ route('entreprises.index') }}" method="get">
                <div class="form-group">
                   <input type="search" name="search" class="form-control">
                   <span class="form-group-btn">
                      <button type="submit" class="btn btn-primary">Search</button>
                   </span>
                </div>
             </form>
          </div>
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom Entreprise</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Secteur</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($entreprises as $product)
              <tr>
                 <td>{{ $product->nom_entreprise }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                 <td>{{ $product->secteur }}</td>
                 <td><a href="{{ route('entreprises.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('entreprises.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $entreprises->links() !!}
       </div> 
   </div>
   @endsection 
