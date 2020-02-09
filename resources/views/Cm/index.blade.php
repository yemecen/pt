@extends('layouts.main')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Kayıt</th>
        <th scope="col">No</th>
        <th scope="col">Başlık</th>
        <th scope="col">Oluş. Tarihi</th>
        <!--<th scope="col">Zaman</th>!-->
        <th scope="col">Oluşturan</th>
        <th scope="col">Modül</th>
        <!--<th scope="col">Sorumlu</th>!-->
        <th scope="col">Öncelik</th>
        <th scope="col">Durum</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cms as $cm)
            <tr>
                <td>{{$cm->type->Name}}</td>
                <!--<th scope="row"><a href="cm/{{--$cm->ID}}/detail">{{$cm->ID--}}</a></th>!-->
                <th scope="row"><a href="{{ route('cms.show',$cm->ID) }}">{{$cm->ID}}</a></th>                
                <td>{{$cm->Title}}</td>
                <td>{{$cm->created_at->format('d-m-Y')}}</td>
                <!--<td>{{--$cm->created_at->format('H:i:s')--}}</td>!-->
                <td>{{$cm->user->name}}</td>
                <td>{{$cm->subsystem->Name}}</td>
                <!--<td>{{--$cm->name--}}</td>!-->
                <td><span class="badge badge-{{$cm->precedence->Badge}}">{{$cm->precedence->Name}}</span></td>
            <td><span class="badge badge-{{$cm->stat->Badge}}">{{$cm->stat->Name}}</span></td>
            </tr> 
        @endforeach  
    </tbody>
  </table>
@endsection