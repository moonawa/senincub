@include('superadmin.bord')


<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez un Secteur</h1>
          </div>
<h2 style="margin-top: 12px;" class="text-center">Add secteur</a></h2>
<br>
 
<form action="{{ route('secteurs.store') }}" method="POST" name="add_secteur">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom secteur</strong>
            <input type="text" name="nom" class="form-control" placeholder="nom_secteur">
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

