@extends('layouts.main')

@section('content')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Öncelik</div>
            
            <div class="card-body">
                <a href="{{route('precedences.create')}}" class="btn btn-sm btn-primary">Yeni Öncelik Ekle</a>

                <table class="table">
                    <tr>
                        <th>Öncelik Ad</th>
                        <th>Badge</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($precedences as $precedence)
                        <tr>
                            <td>{{$precedence->Name}}</td>
                            <td><span class="badge badge-{{$precedence->Badge}}">{{$precedence->Badge}}</span></td>
                            <td><a href="{{route('precedences.edit',$precedence->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('precedences.destroy',$precedence->ID)}}" method="post">
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