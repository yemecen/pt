@extends('layouts.main')

@section('content')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Alt Sistem</div>
            
            <div class="card-body">
                <a href="{{route('subsystems.create')}}" class="btn btn-sm btn-primary">Yeni Alt S. Ekle</a>

                <table class="table">
                    <tr>
                        <th>Alt S. Ad</th>
                        <th>Sistem</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($subsystems as $subsystem)
                        <tr>
                            <td>{{$subsystem->Name}}</td>
                            <td>{{$subsystem->system->Name}}</td>
                            <td><a href="{{route('subsystems.edit',$subsystem->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('subsystems.destroy',$subsystem->ID)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" onclick="return confirm('Silinsin mi?')" class="btn btn-sm btn-danger" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection