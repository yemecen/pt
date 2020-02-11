@extends('layouts.main')

@section('content')
{{--Form--}}
<form action="{{ route('cmDetail.store')}}" method="POST" >            
    <input type="hidden" id="cmID" name="cmID" value="{{$cm->ID}}">     
    <input type="hidden" id="userID" name="userID" value="{{Auth::user()->id}}">     

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
            @foreach ($users as $user)
            <option value="{{$user->id}}" {{ $user->id == $cm->ResponsibleUserID ? 'selected' : '' }}>{{$user->name}}</option>              
            @endforeach
          </select>
        </div>              
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="durum">Durum</label>
        <select id="durum" class="form-control" name="durum">
          @foreach ($stats as $stat)
            <option value="{{$stat->ID}}" {{ $stat->ID == $cm->StatID ? 'selected' : '' }}>{{$stat->Name}}</option>              
          @endforeach
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
{{--//Form--}}
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
    @foreach ($additionals as $img)  
        <img src="{{ URL::asset('img/'.$img->FileName.'') }}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>
    @endforeach   
    <div>
        <span class="badge badge-pill badge-secondary">{{$cm->created_at->format('d-m-Y')}}</span>
        <div class="float-right">
          <span class="badge badge-info">{{$cm->type->Name}}</span> 
          <span class="badge badge-{{$cm->stat->Badge}}">{{$cm->stat->Name}}</span> 
          <span class="badge badge-info">{{$cm->subsystem->Name}}</span> 
          <span class="badge badge-{{$cm->precedence->Badge}}">{{$cm->precedence->Name}}</span>
        </div>         
    </div>
<hr>

@endsection