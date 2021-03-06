@include('superadmin.bord')


<div class="container-fluid">
      <div class="row">
           <div class="col-12">
             
             <table class="table table-bordered" id="laravel_crud">
              <thead>
                 <tr>
                    <th>Nom Entreprise</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Nom Projet</th>
                    <td >Action</td>
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
                     <a href="mailto:$product->mail" target="blank" class="btn btn-success"> Sélectionner </a>
                   </td>
                 </tr>

                 @endforeach
              </tbody>
             </table>
             {!! $inscris->links() !!}
          </div> 
      </div>
      </div>
      @include('layouts.back-footer')
   