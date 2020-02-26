@include('superadmin.bord')


<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

       
<!-- allouer un admin à une entreprise  -->
<h2> Mettre un employé à la dispositin d'une entreprise  </h2>
<form action="/alloue" method="GET">
<input type="text" class="bg" name="name" placeholder="nom employe">
<input type="text" class="bg" name="nom_entreprise" placeholder="nom entreprise">
   <button type="submit" class="btn btn-success">Allouer</button>
</form>
<br><br><br><br><br>
<!-- detacher un admin à une entreprise  -->
<h2> Suprrimer une relation Entreprise - Employé </h2>
<form action="/detach" method="GET">
<input type="text" class="bg" name="name" placeholder="nom employe">
<input type="text" class="bg" name="nom_entreprise" placeholder="nom entreprise">
   <button type="submit" class="btn btn-success">Enlever</button>
</form>


</div>
@include('layouts.back-footer')