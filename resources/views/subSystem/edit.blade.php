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
                <form action="{{route('subsystems.update',$subsystem->ID)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <th>Alt S. Ad</th>
                            <th>Sistem</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name" value="{{$subsystem->Name}}"></td>
                            <td>
                                <select id="SystemID" class="form-control" name="SystemID">
                                    @foreach ($systems as $system)    
                                        <option value="{{$system->ID}}" {{$subsystem->SystemID == $system->ID ? 'selected' : '' }}>{{$system->Name}}</option>
                                    @endforeach                                    
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