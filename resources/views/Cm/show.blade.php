@extends('layouts.main')

@section('content')
{{--Form--}}
<form action="{{ route('cms.store') }}" method="POST" >            
       
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
    @endif
    
    <div class="form-row">              
      <div class="form-group col-md-4">
        <label for="tip">Tip</label>
        <select id="tip" class="form-control" name="tip">
          @foreach ($types as $type)
            <option value="{{$type->ID}}">{{$type->Name}}</option>              
          @endforeach
        </select>
      </div>     

      <div class="form-group col-md-4">
        <label for="sistem">Sistem</label>
        <select id="sistem" class="form-control" name="sistem">
          @foreach ($systems as $system)
            <option value="{{$system->ID}}">{{$system->Name}}</option>              
          @endforeach
        </select>
      </div>    

      <div class="form-group col-md-4">
        <label for="altSistem">Alt Sistem</label>
        <select id="altSistem" class="form-control" name="altSistem">
          @foreach ($subSystems as $subSystem)
            <option value="{{$subSystem->ID}}">{{$subSystem->Name}}</option>              
          @endforeach
        </select>
      </div>              
    </div>

    <div class="form-group">
        <label for="baslik">Başlık</label>
        <input type="text" class="form-control" id="baslik" name="baslik">
    </div>

    <div class="form-row">              
        <div class="form-group col-md-4">
          <label for="onemDerecesi">Önem Derecesi</label>
          <select id="onemDerecesi" class="form-control" name="onemDerecesi">
            @foreach ($levels as $level)
              <option value="{{$level->ID}}">{{$level->Name}}</option>              
            @endforeach
          </select>
        </div>              
        <div class="form-group col-md-4">
          <label for="oncelik">Öncelik</label>
          <select id="oncelik" class="form-control" name="oncelik">
            @foreach ($precedences as $precedence)
              <option value="{{$precedence->ID}}">{{$precedence->Name}}</option>              
            @endforeach
          </select>
        </div>              
        <div class="form-group col-md-4">
          <label for="sorumlu">Sorumlu</label>
          <select id="sorumlu" class="form-control" name="sorumlu">
          </select>
        </div>              
    </div>

    <div class="form-group">
        <label for="aciklama">Açıklama</label>
        <textarea class="form-control" id="aciklama" rows="3" name="aciklama"></textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Dosya Seçiniz...</label>
            </div> 
        </div>
        @csrf
        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary float-right" >Yeni Kayıt Oluştur</button>
        </div>
    </div>

    <div class="form-group">
        <img src="" class="img-thumbnail">
    </div>

</form>
{{--Form--}}
<hr>
{{--Cm--}}
<h1>{{$cm->Title}}</h1>
    <p>{{$cm->Description}}</p>
    <img src="{{URL::asset('/img/cm-1.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>
    <img src="{{URL::asset('/img/cm-2.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block">
    <div>
        <span class="badge badge-pill badge-secondary">{{$cm->created_at->format('d-m-Y')}}</span>
        <div class="float-right">
            <span class="badge badge-primary">story</span> 
            <span class="badge badge-success">blog</span> 
            <span class="badge badge-info">personal</span> 
            <span class="badge badge-warning">Warning</span>
            <span class="badge badge-danger">Danger</span>
        </div>         
    </div>
<hr>
{{--Cm detay var ise--}}
@if (!empty($cmDetail))
    @foreach ($cmDetail as $item)
        <h1>{{$item->Title}}</h1>
        <p>{{$item->Description}}</p>
        <img src="{{URL::asset('/img/cm-1.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>
        <img src="{{URL::asset('/img/cm-2.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block">
        <div>
            <span class="badge badge-pill badge-secondary">{{$item->created_at->format('d-m-Y')}}</span>
            <div class="float-right">
                <span class="badge badge-primary">story</span> 
                <span class="badge badge-success">blog</span> 
                <span class="badge badge-info">personal</span> 
                <span class="badge badge-warning">Warning</span>
                <span class="badge badge-danger">Danger</span>
            </div>         
        </div>
        <hr>
    @endforeach
@endif
@endsection