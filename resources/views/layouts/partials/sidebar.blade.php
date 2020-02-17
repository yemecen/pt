<div class="col-md-2">                
    <div class="list-group">
      <a href="{{route('cms.open')}}" class="list-group-item ">Açık Cm <span class="badge badge-light">{{App\Cm::where('ResponsibleUserID','=',Auth::user()->id)->where('StatID','<>',2)->count()}}</span></a>
      <a href="{{route('cms.close')}}" class="list-group-item ">Kapalı Cm <span class="badge badge-light">{{App\Cm::where('ResponsibleUserID','=',Auth::user()->id)-> where('StatID','=',2)->count()}}</span></a>                    
      <a href="{{route('cms.index')}}" class="list-group-item ">Tüm Kayıtlar<span class="badge badge-light">{{App\Cm::count()}}</span></a>                    
      <a href="{{route('cms.create')}}" class="list-group-item active">Yeni Kayıt Oluştur</a>                    
    </div>
</div> 