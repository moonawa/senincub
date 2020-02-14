<div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Nom Entreprise</th>
                 <th>Téléphone</th>
                 <th>Email</th>
                 <th>Secteur</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($entreprises as $product)
              <tr>
                 <td>{{ $product->nom_entreprise }}</td>
                 <td>{{ $product->telephone }}</td>
                 <td>{{ $product->mail }}</td>
                 <td>{{ $product->secteur_id }}</td>
                 <td><a href="{{ route('entreprises.edit',$product->id)}}" class="btn btna">Edit</a></td>
                 <td>
                 <form action="{{ route('entreprises.destroy', $product->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btna" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $entreprises->links() !!}
       </div> 
   </div>