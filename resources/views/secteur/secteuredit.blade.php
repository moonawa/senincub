@extends('secteur.secteurlayout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit secteur</a></h2>
<br>
 
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

  
   
</div>
 
</form>
@endsection