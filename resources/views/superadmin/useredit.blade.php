@include('superadmin.bord')



<div class="container-fluid">
<h1>{{ Session:: get('success')}}</h1>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modifier les données de l'employe</h1>
          </div>
<form action="{{ route('users.update', $user_info->id) }}" method="POST" name="update_user">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom </strong>
            <input type="text" name="name" class="form-control bg" placeholder="nom" value="{{ $user_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="form-group">
            <strong>Telephone</strong>
            <input type="text" name="telephone" class="form-control bg" placeholder=" telephone" value="{{ $user_info->telephone }}">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Mail</strong>
            <input type="text" name="email" class="form-control bg" placeholder=" mail" value="{{ $user_info->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

   

    <div class="col-md-12">
    <button type="submit" class="btn btn-success">Modifier</button>
    </div>
</div>
 
</form>
</div>

</div>
@include('layouts.back-footer')

