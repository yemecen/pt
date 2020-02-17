<form action="{{ route('cmDetail.store')}}" method="POST" enctype="multipart/form-data">            
    <input type="hidden" id="cmID" name="cmID" value="{{$cm->ID}}">     
    <input type="hidden" id="userID" name="userID" value="{{Auth::user()->id}}">     
    
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
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
              <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
              <label class="custom-file-label" for="image">Dosya Seçiniz...</label>
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