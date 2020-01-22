@extends('secteur.secteurlayout')
   
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add secteur</a></h2>
<br>
 
<form action="{{ route('secteurs.store') }}" method="POST" name="add_secteur">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom secteur</strong>
            <input type="text" name="nom" class="form-control" placeholder="Enter nom_secteur">
        </div>
    </div>

  
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
   
</div>
 
</form>
<form action=""></form>
@endsection