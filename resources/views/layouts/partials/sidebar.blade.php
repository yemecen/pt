<div class="col-md-2">                
    <div class="list-group">
      <a href="{{route('cms.open')}}" class="list-group-item ">Açık Cm <span class="badge badge-light">{{App\Cm::where('ResponsibleUserID','=',Auth::user()->id)->where('StatID','<>',2)->count()}}</span></a>
      <a href="{{route('cms.close')}}" class="list-group-item ">Kapalı Cm <span class="badge badge-light">{{App\Cm::where('ResponsibleUserID','=',Auth::user()->id)-> where('StatID','=',2)->count()}}</span></a>                    
      <a href="{{route('cms.index')}}" class="list-group-item ">Tüm Kayıtlar<span class="badge badge-light">{{App\Cm::count()}}</span></a>                    
      <a href="{{route('cms.create')}}" class="list-group-item active">Yeni Kayıt Oluştur</a>                    
    </div>
    <br> 
    <div class="list-group">
      <a href="{{route('types.index')}}" class="list-group-item ">Tip</a>             
      <a href="{{route('systems.index')}}" class="list-group-item ">Sistem</a>             
      <a href="{{route('levels.index')}}" class="list-group-item ">Önem Derecesi</a>             
      <a href="{{route('stats.index')}}" class="list-group-item ">Durum</a>         
    </div>
</div> 