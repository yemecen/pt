@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Önem Derecesi</div>
            
            <div class="card-body">
                <a href="{{route('levels.create')}}" class="btn btn-sm btn-primary">Yeni Önem Derecesi Ekle</a>

                <table class="table">
                    <tr>
                        <th>Önem Derecesi Ad</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{$level->Name}}</td>
                            <td><a href="{{route('levels.edit',$level->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('levels.destroy',$level->ID)}}" method="post">
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