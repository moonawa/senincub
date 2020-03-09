@include('sidebar')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez un Client</h1>
          </div>
<form action="{{ route('clients.store') }}" method="POST" name="add_client">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom client</strong>
            <input type="text" name="nom_complet" class="form-control" placeholder="Entrer nom_complet">
            <span class="text-danger">{{ $errors->first('nom_complet') }}</span>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="form-group">
            <strong>Telephone</strong>
            <input type="text" name="telephone" class="form-control" placeholder="Entrer telephone">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Mail</strong>
            <input type="text" name="mail" class="form-control" placeholder="Entrer mail">
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
    <button type="submit" class="btn btn-success">Soumettre</button>
    </div>
</div>
 
</form>
<form action=""></form>
</div>
@include('layouts.back-footer')
