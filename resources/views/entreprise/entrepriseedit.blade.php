@extends('entreprise.entrepriselayout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Entreprise</a></h2>
<br>
 
<form action="{{ route('entreprises.update', $entreprise_info->id) }}" method="POST" name="update_entreprise">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom Entreprise</strong>
            <input type="text" name="nom_entreprise" class="form-control" placeholder="Enter nom_entreprise" value="{{ $entreprise_info->nom_entreprise }}">
            <span class="text-danger">{{ $errors->first('nom_entreprise') }}</span>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="form-group">
            <strong>Telephone</strong>
            <input type="text" name="telephone" class="form-control" placeholder="Enter telephone" value="{{ $entreprise_info->telephone }}">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Mail</strong>
            <input type="text" name="mail" class="form-control" placeholder="Enter mail" value="{{ $entreprise_info->mail }}">
            <span class="text-danger">{{ $errors->first('mail') }}</span>
        </div>
    </div>

    <div class="col-md-12">
              <select name="secteur_id">
                {{-- <option value="" >Secteur</option> --}}
                @foreach(App\Secteur::get() as $secteur)
               
                <option name="secteur_id" value="{{$secteur->id}}">{{$secteur->nom}}</option>
                @endforeach
              </select>
          </div> 

    <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection