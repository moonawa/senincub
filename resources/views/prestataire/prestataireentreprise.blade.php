@include('superadmin.bord')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

<!-- allouer un partenaire à une entreprise  -->
<h2> Mettre un Partenaire à la dispositin d'une entreprise  </h2>
<form action="/prestataireese" method="GET">
<select name="nom_complet">
    @foreach(App\Prestataire::get() as $secteur)
      <option  value="{{$secteur->nom_complet}}">{{$secteur->nom_complet}} {{$secteur->telephone}}</option>
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
<h2> Suprrimer une relation Entreprise - Partenaire </h2>
<form action="/detachprestataireese" method="GET">
<select name="nom_complet" >
    @foreach(App\Prestataire::get() as $secteur)
      <option  value="{{$secteur->nom_complet}}">{{$secteur->nom_complet}} {{$secteur->telephone}}</option>
      @endforeach
    </select>   
     <select name="nom_entreprise" >
    @foreach(App\Entreprises::get() as $secteur)
      <option  value="{{$secteur->nom_entreprise}}">{{$secteur->nom_entreprise}} </option>
      @endforeach
    </select> <button type="submit" class="btn btn-success">Enlever</button>
</form>


</div>
@include('layouts.back-footer')