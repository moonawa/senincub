@include('layouts.back-head')
<h1>{{ Session:: get('success')}}</h1>

<div class="container-fluid">
<!-- allouer un client à une entreprise  -->
<h2> Mettre un client à la dispositin d'une entreprise  </h2>
<form action="/clientese" method="GET">
<input type="text" name="nom_complet" placeholder="nom client">
<input type="text" name="nom_entreprise" placeholder="nom entreprise">
   <button type="submit" class="btn btn-success">Allouer</button>
</form>
<br><br><br><br><br>

<!-- detacher un admin à une entreprise  -->
<h2> Suprrimer une relation Entreprise - Client </h2>
<form action="/detachclientese" method="GET">
<input type="text" name="nom_complet" placeholder="nom client">
<input type="text" name="nom_entreprise" placeholder="nom entreprise">
   <button type="submit" class="btn btn-success">Enlever</button>
</form>


</div>
@include('layouts.back-footer')
