@include('superadmin.bord')


<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez une Entreprise</h1>
          </div>
          <div class="row">
 
<form action="{{ route('entreprises.store') }}" method="POST" name="add_entreprise">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom Entreprise</strong>
            <input type="text" name="nom_entreprise" class="form-control " placeholder="Entrer nom_entreprise">
            <span class="text-danger">{{ $errors->first('nom_entreprise') }}</span>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="form-group">
            <strong>Telephone</strong>
            <input type="text" name="telephone" class="form-control " placeholder="Entrer telephone">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Mail</strong>
            <input type="text" name="mail" class="form-control " placeholder="Entrer mail">
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
    <button type="submit" class="btn btn-success">Ajouter</button>
    </div>
</div>
 
</form>
<form action=""></form>
</div>
@include('layouts.back-footer')

