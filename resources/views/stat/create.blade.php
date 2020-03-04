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
                <form action="{{route('stats.store')}}" method="post">
                    <table class="table">
                        <tr>
                            <th>Durum Ad</th>
                            <th>Badge</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="Name" id="Name"></td>
                            <td>
                                <select id="Badge" class="form-control" name="Badge">                                    
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="warning">Warning</option>
                                    <option value="info">Info</option>
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
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