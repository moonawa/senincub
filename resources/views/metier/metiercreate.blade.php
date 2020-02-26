@include('superadmin.bord')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez un Metier</h1>
          </div>
 
<form action="{{ route('metiers.store') }}" method="POST" name="add_metier">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom metier</strong>
            <input type="text" name="nom" class="form-control" placeholder="Enter nom_metier">
        </div>
    </div>

  
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
   
</div>
 
</form>
<form action=""></form>
</div>
@include('layouts.back-footer')

