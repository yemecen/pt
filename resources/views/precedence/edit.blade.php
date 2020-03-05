@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Öncelik</div>
            
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
                <form action="{{route('precedences.update',$precedence->ID)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <th>Öncelik Ad</th>
                            <th>Badge</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name" value="{{$precedence->Name}}"></td>
                            <td>
                                <select id="Badge" class="form-control" name="Badge">                                    
                                    <option value="primary" {{$precedence->Badge == 'primary' ? 'selected' : '' }}>Primary</option>
                                    <option value="secondary" {{$precedence->Badge == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                    <option value="success" {{$precedence->Badge == 'success' ? 'selected' : '' }}>Success</option>
                                    <option value="danger" {{$precedence->Badge == 'danger' ? 'selected' : '' }}>Danger</option>
                                    <option value="warning" {{$precedence->Badge == 'warning' ? 'selected' : '' }}>Warning</option>
                                    <option value="info" {{$precedence->Badge == 'info' ? 'selected' : '' }}>Info</option>
                                    <option value="light" {{$precedence->Badge == 'light' ? 'selected' : '' }}>Light</option>
                                    <option value="dark" {{$precedence->Badge == 'dark' ? 'selected' : '' }}>Dark</option>
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