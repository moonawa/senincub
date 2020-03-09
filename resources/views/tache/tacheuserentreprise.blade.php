@include('superadmin.bord')

<div class="container-fluid">
  <h1>{{ Session:: get('success')}}</h1>
  <h2> Allouer une tache de l'utilisateur à une entreprise</h2>
  <form action="/entreprisetacheuser" method="GET">
  <select name="tache_id" >
    @foreach(DB::table('tache_user') as $secteur)
      <option  value="{{$secteur->id}}">{{$secteur->tache_id}}</option>
      @endforeach
    </select>   
     <select name="nom_entreprise" >
    @foreach(App\Entreprises::get() as $secteur)
      <option  value="{{$secteur->nom_entreprise}}">{{$secteur->nom_entreprise}} </option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-success">Allouer</button>
  </form>
  <br><br><br><br><br>
  <!-- detacher un admin à une entreprise  -->
  <h2> Enlever la tache alloué à un utilisateur </h2>
  <form action="/detachtacheuser" method="GET">
    <select name="name">
      {{-- <option  >Utilisateur</option> --}}
      @foreach(App\User::get() as $secteur)
      <option  value="{{$secteur->name}}">{{$secteur->name}} {{$secteur->telephone}}</option>
      @endforeach
    </select>
    <select name="description">
      {{-- <option  >Tache</option> --}}
      @foreach(App\Tache::get() as $sec)
      <option  value="{{$sec->description}}">{{$sec->description}} </option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-success">Enlever</button>
  </form>


</div>
@include('layouts.back-footer')