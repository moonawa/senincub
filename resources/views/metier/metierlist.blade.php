@include('superadmin.bord')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<a href="{{ route('metiers.create') }}" class="btn btn-success mb-2">Ajouter</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom metier</th>
                 <th colspan="2">Action</th>
                 
              </tr>
           </thead>
           <tbody>
              @foreach($metiers as $product)
              <tr>
                 <td>{{ $product->nom }}</td>
                
                 <td><a href="{{ route('metiers.edit',$product->id)}}" class="btn btn-success">Modifier</a></td>
                
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $metiers->links() !!}
       </div> 
   </div>
   </div>
   @include('layouts.back-footer')

