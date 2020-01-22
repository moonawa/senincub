@extends('metier.metierlayout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit metier</a></h2>
<br>
 
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

  
   
</div>
 
</form>
@endsection