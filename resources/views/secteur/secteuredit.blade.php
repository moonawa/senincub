@include('superadmin.bord')



<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier le secteur</h1>
          </div>
 
<form action="{{ route('secteurs.update', $secteur_info->id) }}" method="POST" name="update_secteur">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom secteur</strong>
            <input type="text" name="nom" class="form-control" placeholder="Enter nom" value="{{ $secteur_info->nom }}">
            <span class="text-danger">{{ $errors->first('nom') }}</span>
        </div>
    </div>
    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Modifier</button>
    </div>
  
   
</div>
 
</form>
</div>
@include('layouts.back-footer')