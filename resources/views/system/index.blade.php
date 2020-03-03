@extends('layouts.main')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Sistem</div>
            
            <div class="card-body">
                <a href="{{route('systems.create')}}" class="btn btn-sm btn-primary">Yeni Sistem Ekle</a>

                <table class="table">
                    <tr>
                        <th>Sistem Ad</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($systems as $system)
                        <tr>
                            <td>{{$system->Name}}</td>
                            <td><a href="{{route('systems.edit',$system->ID)}}" class="btn btn-sm btn-info">Düzenle</a></td>
                            <td>
                                <form action="{{route('systems.destroy',$system->ID)}}" method="post">
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