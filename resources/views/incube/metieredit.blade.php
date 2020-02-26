
@include('sidebar')
<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier un métier</h1>
          </div>
 
<form action="{{ route('metiers.update', $metier_info->id) }}" method="POST" name="update_metier">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom metier</strong>
            <input type="text" name="nom" class="form-control" placeholder="Enter nom_metier" value="{{ $metier_info->nom }}">
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