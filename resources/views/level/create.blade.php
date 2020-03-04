@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Önem Derecesi</div>
            
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
                <form action="{{route('levels.store')}}" method="post">
                    <table class="table">
                        <tr>
                            <th>Önem Derecesi Ad</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name"></td>
                            <td><button class="btn btn-sm btn-info" type="submit">Ekle</button></td>                            
                        </tr>
                    </table>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection