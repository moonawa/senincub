@extends('metier.metierlayout')
   
@section('content')
<a href="{{ route('metiers.create') }}" class="btn btna mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom metier</th>
                 
              </tr>
           </thead>
           <tbody>
              @foreach($metiers as $product)
              <tr>
                 <td>{{ $product->nom }}</td>
                
                 <td><a href="{{ route('metiers.edit',$product->id)}}" class="btn btna">Edit</a></td>
                 <td>
                 <form action="{{ route('metiers.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btna" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $metiers->links() !!}
       </div> 
   </div>
   @endsection 
