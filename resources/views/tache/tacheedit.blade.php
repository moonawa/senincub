@include('superadmin.bord')



<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier la tâche</h1>
          </div>
 
<form action="{{ route('taches.update', $tache_info->id) }}" method="POST" name="update_tache">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <input type="text" name="description" class="form-control"  value="{{ $tache_info->description }}">
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Modifier</button>
    </div>
  
   
</div>
 
</form>
</div>
@include('layouts.back-footer')