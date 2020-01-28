@extends('client.clientlayout')
   
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add client</a></h2>
<br>
 
<form action="{{ route('clients.store') }}" method="POST" name="add_client">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom client</strong>
            <input type="text" name="nom_complet" class="form-control" placeholder="Enter nom_complet">
            <span class="text-danger">{{ $errors->first('nom_complet') }}</span>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="form-group">
            <strong>Telephone</strong>
            <input type="text" name="telephone" class="form-control" placeholder="Enter telephone">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Mail</strong>
            <input type="text" name="mail" class="form-control" placeholder="Enter mail">
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
              <select name="entreprise">
                {{-- <option value="" >Entreprise</option> --}}
                @foreach(App\Entreprises::get() as $secteur)              
                <option name="entreprise" value="{{$secteur->id}}">{{$secteur->nom_entreprise}}</option>
                @endforeach
              </select>
          </div> 


    <div class="col-md-12">
    <button type="submit" class="btn btna">Submit</button>
    </div>
</div>
 
</form>
<form action=""></form>
@endsection