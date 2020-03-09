@include('sidebar')


<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez une Tâche</h1>
          </div>
<br>
 
<form action="{{ route('taches.store') }}" method="POST" name="add_tache">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <input type="text" name="description" class="form-control" placeholder="description">
        </div>
    </div>
    <div class="select is-multiple">
    <select name="cats[]" multiple>
    @foreach(App\User::get() as $user)
            <option value="{{ $user->id }}" {{ in_array($user->id, old('cats') ?: []) ? 'selected' : '' }}>{{ $user->name }} {{ $user->telephone }}</option>
        @endforeach
    </select>
</div>

  
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
   
</div>
 
</form>
<form action=""></form>
</div>
@include('layouts.back-footer')

