@extends('layouts.main')

@section('content')
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Durum</div>
            
            <div class="card-body">
                <a href="{{route('stats.create')}}" class="btn btn-sm btn-primary">Yeni Durum Ekle</a>

                <table class="table">
                    <tr>
                        <th>Durum Ad</th>
                        <th>Badge</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($stats as $stat)
                        <tr>
                            <td>{{$stat->Name}}</td>
                            <td><span class="badge badge-{{$stat->Badge}}">{{$stat->Badge}}</span></td>
                            <td><a href="{{route('stats.edit',$stat->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('stats.destroy',$stat->ID)}}" method="post">
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