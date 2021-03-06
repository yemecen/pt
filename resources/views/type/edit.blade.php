@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Tip</div>
            
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
                <form action="{{route('types.update',$type->ID)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <th>Tip Ad</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name" value="{{$type->Name}}"></td>
                            <td><button class="btn btn-sm btn-info" type="submit">Güncelle</button></td>                            
                        </tr>
                    </table>                    
                </form>
            </div>
        </div>
    </div>
@endsection