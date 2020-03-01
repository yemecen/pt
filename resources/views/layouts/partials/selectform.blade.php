<form  method="POST" action="{{ route('cms.selectSearch') }}">
    <div class="form-row ">              
      <div class="form-group col-md-2">
        <label for="olusturan">Oluşturan</label>
        <select id="olusturan" class="form-control" name="UserID">
          <option value="">-</option>
          @foreach ($users as $user)
              <option value="{{$user->id}}" {{ isset($selectedValue['UserID']) ? ( $user->id == $selectedValue['UserID'] ? 'selected' : '' ) : '' }} >{{$user->name}}</option>              
          @endforeach
        </select>
      </div>    
      <div class="form-group col-md-2">
        <label for="modul">Modül</label>
        <select id="modul" class="form-control" name="SubSystemID">
          <option value="">-</option>
          @foreach ($subSystems as $subSystem)
              <option value="{{$subSystem->ID}}" {{ isset($selectedValue['SubSystemID']) ? ( $subSystem->ID == $selectedValue['SubSystemID'] ? 'selected' : '' ) : '' }} >{{$subSystem->Name}}</option>              
          @endforeach
        </select>
      </div>    
      <div class="form-group col-md-2">
        <label for="sorumlu">Sorumlu</label>
        <select id="sorumlu" class="form-control" name="ResponsibleUserID">
          <option value="">-</option>
          @foreach ($users as $user)
          <option value="{{$user->id}}" {{ isset($selectedValue['ResponsibleUserID']) ? ( $user->id == $selectedValue['ResponsibleUserID'] ? 'selected' : '' ) : '' }} >{{$user->name}}</option>              
          @endforeach
        </select>
      </div>    
      <div class="form-group col-md-2">
        <label for="oncelik">Öncelik</label>
        <select id="oncelik" class="form-control" name="PrecedenceID">
          <option value="">-</option>
          @foreach ($precedences as $precedence)
              <option value="{{$precedence->ID}}" {{ isset($selectedValue['PrecedenceID']) ? ( $precedence->ID == $selectedValue['PrecedenceID'] ? 'selected' : '' ) : '' }} >{{$precedence->Name}}</option>              
          @endforeach
        </select>
      </div>    
      <div class="form-group col-md-2 ">
        <label for="durum">Durum</label>
        <select id="durum" class="form-control" name="StatID">
          <option value="">-</option>
          @foreach ($stats as $stat)
              <option value="{{$stat->ID}}" {{ isset($selectedValue['StatID']) ? ( $stat->ID == $selectedValue['StatID'] ? 'selected' : '' ) : '' }} >{{$stat->Name}}</option>              
          @endforeach
        </select>
      </div>    
    </div>  
    @csrf
</form>