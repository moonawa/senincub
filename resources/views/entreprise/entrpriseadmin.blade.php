@include('superadmin.bord')
<div class="container-fluid">
   <h1>{{ Session:: get('success')}}</h1>
   <!-- allouer un admin à une entreprise  -->
   <h2> Mettre un employé à la dispositin d'une entreprise </h2>
   <form action="/alloue" method="GET">
<div>
  <div>Employe</div>
      <select name="name" >
    @foreach(App\User::get() as $secteur)
      <option  value="{{$secteur->name}}">{{$secteur->name}} {{$secteur->telephone}}</option>
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
   
   <h1>{{ Session:: get('successs')}}</h1>
   <!-- detacher un admin à une entreprise  -->
   <h3> Suprrimer une relation Entreprise - Employé </h3>
   <form action="/detach" method="GET">
<div>
  <div>Employe</div>
   <select name="name" >
    @foreach(App\User::get() as $secteur)
      <option  value="{{$secteur->name}}">{{$secteur->name}} {{$secteur->telephone}}</option>
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