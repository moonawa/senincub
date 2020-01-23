@extends('entreprise.entrepriselayout')

@section('content')
<br>

  <form action="/alloue" method="GET">
   <div class="form-group">
      <input type="text" name="email" placeholder="email user" class="form-control" >    
   </div>
   <div class="form-group">
      <input type="text" name="nom_entreprise" placeholder=" nom_entreprise" class="form-control" >    
   </div>
   <span class="form-group">
      <button type="submit" class="btn btna">ALLOUE</button>
   </span>
  </form>
 



@endsection