@extends('layouts.main')

@section('content')
{{--Form--}}
  @include('layouts.partials.showform')
{{--Form--}}
<hr>
{{--Cm detay var ise--}}
@if (!empty($cmDetail))
  @foreach ($cmDetail as $item)
  <h1>{{--$item->Title--}}</h1>
  <p>{{$item->Description}}</p>
  {{--Cm Detail dosya ekleri png değilse--}}    
  @foreach ($item->additionals as $file)
      @if (in_array(pathinfo($file->FileName, PATHINFO_EXTENSION), array("PDF","pdf","txt","TXT","xls","XLS","doc","DOC","docx","docx","xlsx","XLSx","html","sql","SQL")))
    Dosya Eki : <a href="{{ URL::asset('cmFiles/'.$file->FileName.'') }}">{{$file->FileName}}</a><br>         
      @endif
  @endforeach
  <hr>
  {{--Cm Detail dosya ekleri png ise--}}
  @foreach ($item->additionals as $file)
      @if (in_array(pathinfo($file->FileName, PATHINFO_EXTENSION), array("jpg","JPG","png","PNG")))
        <img src="{{ URL::asset('cmFiles/'.$file->FileName.'') }}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>   
      @endif
  @endforeach   

      <div>
          <span class="badge badge-pill badge-secondary">{{$item->created_at->format('d-m-Y H:i:s')}}</span>
          <div class="float-right">
              <span class="badge badge-info">{{$cm->type->Name}}</span> 
              <span class="badge badge-{{$cm->stat->Badge}}">{{$cm->stat->Name}}</span> 
              <span class="badge badge-info">{{$cm->subsystem->Name}}</span> 
              <span class="badge badge-{{$cm->precedence->Badge}}">{{$cm->precedence->Name}}</span>
          </div>         
      </div>
      <hr>
  @endforeach
@endif

{{--Cm--}}
<h1>{{$cm->Title}}</h1>
<p>{{$cm->Description}}</p>
{{--Cm dosya ekleri png değilse--}}    
@foreach ($additionals as $file)
    @if (in_array(pathinfo($file->FileName, PATHINFO_EXTENSION), array("PDF","pdf","txt","TXT","xls","XLS","doc","DOC","docx","docx","xlsx","XLSx","html")))
      Dosya Eki : <a href="{{ URL::asset('cmFiles/'.$file->FileName.'') }}">{{$file->FileName}}</a><br>         
    @endif
@endforeach
<hr>
{{--Cm dosya ekleri png ise--}}
@foreach ($additionals as $file)
    @if (in_array(pathinfo($file->FileName, PATHINFO_EXTENSION), array("jpg","JPG","png","PNG")))
      <img src="{{ URL::asset('cmFiles/'.$file->FileName.'') }}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>   
    @endif
@endforeach   

<div>
    <span class="badge badge-pill badge-secondary">{{$cm->created_at->format('d-m-Y H:i:s')}}</span>
    <div class="float-right">
      <span class="badge badge-info">{{$cm->type->Name}}</span> 
      <span class="badge badge-{{$cm->stat->Badge}}">{{$cm->stat->Name}}</span> 
      <span class="badge badge-info">{{$cm->subsystem->Name}}</span> 
      <span class="badge badge-{{$cm->precedence->Badge}}">{{$cm->precedence->Name}}</span>
    </div>         
</div>
<hr>

@endsection