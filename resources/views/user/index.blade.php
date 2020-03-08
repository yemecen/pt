@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Kullanıcılar</div>
            
            <div class="card-body">
                <form action="{{route('users.updateAllUser')}}" method="post">
                
                    <table class="table">
                        <tr>
                            <th>Yönetici</th>
                            <th>Kullanıcı</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="is_admin[]" value="{{$user->id}}" {{$user->is_admin == 1 ? 'checked' : ''}}></td>
                            <td>{{$user->name}}</td>
                        </tr>
                        @endforeach
                    </table>

                    <input type="submit" class="btn btn-sm btn-primary" value="Güncelle">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection