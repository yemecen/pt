@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Tip</div>
            
            <div class="card-body">
                <a href="{{route('types.create')}}" class="btn btn-sm btn-primary">Yeni Tip Ekle</a>

                <table class="table">
                    <tr>
                        <th>Sistem Ad</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{$type->Name}}</td>
                            <td><a href="{{route('types.edit',$type->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('types.destroy',$type->ID)}}" method="post">
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