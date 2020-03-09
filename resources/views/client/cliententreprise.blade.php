@include('superadmin.bord')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<!-- allouer un client à une entreprise  -->
<h2> Mettre un client à la dispositin d'une entreprise  </h2>
<form action="/clientese" method="GET">
<div>
  <div>Client</div>
<select name="nom_complet">
    @foreach(App\Client::get() as $secteur)
      <option  value="{{$secteur->nom_complet}}">{{$secteur->nom_complet}} {{$secteur->telephone}}</option>
      @endforeach
    </select>   
    </div>
    <div>
  <div>Entreprise</div>
     <select name="nom_entreprise" >
    @foreach(App\Entreprises::get() as $secteur)
      <option  value="{{$secteur->nom_entreprise}}">{{$secteur->nom_entreprise}} </option>
      @endforeach
    </select>
    </div>
   <button type="submit" class="btn btn-success">Allouer</button>
</form>
<br><br><br><br><br>

<!-- detacher un admin à une entreprise  -->
<h2> Suprrimer une relation Entreprise - Client </h2>
<form action="/detachclientese" method="GET">
<div>
  <div>Client</div>
<select name="nom_complet" >
    @foreach(App\Client::get() as $secteur)
      <option  value="{{$secteur->nom_complet}}">{{$secteur->nom_complet}} {{$secteur->telephone}}</option>
      @endforeach
    </select>   
    </div>
<div>
  <div>Entreprise</div>
     <select name="nom_entreprise" >
    @foreach(App\Entreprises::get() as $secteur)
      <option  value="{{$secteur->nom_entreprise}}">{{$secteur->nom_entreprise}} </option>
      @endforeach
    </select> 
    </div>
    <button type="submit" class="btn btn-success">Enlever</button>
</form>


</div>
@include('layouts.back-footer')