@include('superadmin.bord')

<div class="container-fluid">
  <h1>{{ Session:: get('success')}}</h1>
  <!-- allouer un admin à une entreprise  -->
  <h2> Allouer une tache à un utisateur </h2>
  <form action="/tacheuser" method="GET">
<div>
  <div>Utilisateur</div>
  <select name="name" >
    @foreach(App\User::get() as $secteur)
      <option  value="{{$secteur->name}}">{{$secteur->name}} {{$secteur->telephone}}</option>
      @endforeach
    </select> 
      </div>
<div>
  <div>Tache</div>
     <select name="description" >
    @foreach(App\Tache::get() as $secteur)
      <option  value="{{$secteur->description}}">{{$secteur->description}} </option>
      @endforeach
    </select>
    </div>
    <button type="submit" class="btn btn-success">Allouer</button>
  </form>
  <br><br><br><br><br>
  <!-- detacher un admin à une entreprise  -->
  <h2> Enlever la tache alloué à un utilisateur </h2>
  <form action="/detachtacheuser" method="GET">
<div>
  <div>Utilisateur</div>
    <select name="name">
      {{-- <option  >Utilisateur</option> --}}
      @foreach(App\User::get() as $secteur)
      <option  value="{{$secteur->name}}">{{$secteur->name}} {{$secteur->telephone}}</option>
      @endforeach
    </select>
    </div>
<div>
  <div>Tache</div>
    <select name="description">
      {{-- <option  >Tache</option> --}}
      @foreach(App\Tache::get() as $sec)
      <option  value="{{$sec->description}}">{{$sec->description}} </option>
      @endforeach
    </select>
    </div>
    <button type="submit" class="btn btn-success">Enlever</button>
  </form>


</div>
@include('layouts.back-footer')