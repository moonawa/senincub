@include('superadmin.bord')



<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajoutez un utilisareur à l'entreprise que vous venez de créer</h1>
          </div>
                    <form method="GET" action="{{ route('eseuser') }}" name="add_user">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control bg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nom complet">
                                <span class="text-danger">{{ $errors->first('name') }}</span>                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control bg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="mot de passe">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control bg" name="password_confirmation" required autocomplete="new-password" placeholder="confirmer mot de passe">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control bg" name="telephone" value="{{ old('telephone') }}" required  placeholder="telephone">
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            </div>
                        </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                   Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
              
                    </div>
  @include('layouts.back-footer')

