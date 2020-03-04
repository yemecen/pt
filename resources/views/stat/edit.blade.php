@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Durum</div>
            
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
            @endif

            <div class="card-body">
                <form action="{{route('stats.update',$stat->ID)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <th>Durum Ad</th>
                            <th>Badge</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name" value="{{$stat->Name}}"></td>
                            <td>
                                <select id="Badge" class="form-control" name="Badge">                                    
                                    <option value="primary" {{$stat->Badge == 'primary' ? 'selected' : '' }}>Primary</option>
                                    <option value="secondary" {{$stat->Badge == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                    <option value="success" {{$stat->Badge == 'success' ? 'selected' : '' }}>Success</option>
                                    <option value="danger" {{$stat->Badge == 'danger' ? 'selected' : '' }}>Danger</option>
                                    <option value="warning" {{$stat->Badge == 'warning' ? 'selected' : '' }}>Warning</option>
                                    <option value="info" {{$stat->Badge == 'info' ? 'selected' : '' }}>Info</option>
                                    <option value="light" {{$stat->Badge == 'light' ? 'selected' : '' }}>Light</option>
                                    <option value="dark" {{$stat->Badge == 'dark' ? 'selected' : '' }}>Dark</option>
                                </select>
                            </td>
                            <td><button class="btn btn-sm btn-info" type="submit">Güncelle</button></td>                            
                        </tr>
                    </table>                    
                </form>
            </div>
        </div>
    </div>
@endsection