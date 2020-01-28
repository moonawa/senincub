@extends('inscris.inscrislayout')
   
   @section('content')
     <br>
      <div class="row">
           <div class="col-12">
             
             <table class="table table-bordered" id="laravel_crud">
              <thead>
                 <tr>
                    <th>Nom Entreprise</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Nom Projet</th>
                    <td colspan="2">Action</td>
                 </tr>
              </thead>
              <tbody>
                 @foreach($inscris as $product)
                 <tr>
                    <td>{{ $product->nom_complet }}</td>
                    <td>{{ $product->telephone }}</td>
                    <td>{{ $product->mail }}</td>
                    <td>{{ $product->nom_projet }}</td>
                    <td>
                     <form action="{{ route('inscris.edit')}}" method="GET"><input name="email" class="btn btna"><a href="mailto:$email "></a> Sélectionner</form>
                   </td>
                 </tr>

                 @endforeach
              </tbody>
             </table>
             {!! $inscris->links() !!}
          </div> 
      </div>
      @endsection 
   