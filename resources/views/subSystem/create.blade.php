@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Alt Sistem</div>
            
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
                <form action="{{route('subsystems.store')}}" method="post">
                    <table class="table">
                        <tr>
                            <th>Alt S. Ad</th>
                            <th>Sistem</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name"></td>
                            <td>
                                <select id="SystemID" class="form-control" name="SystemID">                                    
                                    @foreach ($systems as $system)
                                        <option value="{{$system->ID}}">{{$system->Name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button class="btn btn-sm btn-info" type="submit">Ekle</button></td>                            
                        </tr>
                    </table>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection