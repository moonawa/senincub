@include('layouts.back-head')

<main class="container-fluid">
        <h1>@lang(' Donner un compte rendu')</h1>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" style="margin-bottom: 140px">
                        <thead>
                            <tr>
                                <th>Envoyeur</th>
                                <th>Note</th>
                                <th>Receveur</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->unreadNotifications as $notification)
                                <tr>
                                
                                    <td>{{$notification->data['data']}}</td>
                                   
                                    <td>
                                        <form action="{{ route('notification.update', $notification->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" class="btn btn-success btn-sm" value="@lang('Marquer comme lu')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </main>
@include('layouts.back-footer')
