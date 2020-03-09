@include('superadmin.bord')


<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<a href="{{ route('taches.create') }}" class="btn btn-success mb-2">Ajouter</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Description</th>
                 <th>Action</th>
                 
              </tr>
           </thead>
           <tbody>
              @foreach($taches as $product)
              <tr>
                 <td>{{ $product->description }}</td>
                
                 <td><a href="{{ route('taches.edit',$product->id)}}" class="btn btn-success">Modifier</a></td>
                 
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $taches->links() !!}
       </div> 
   </div>
   </div>
   @include('layouts.back-footer')