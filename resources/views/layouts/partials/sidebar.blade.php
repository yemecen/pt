<div class="col-md-2">                
    <div class="list-group">
      <a href="{{route('cms.index')}}" class="list-group-item ">Açık Cm <span class="badge badge-light">{{App\Cm::where('StatID','<>',2)->count()}}</span></a>
      <a href="#" class="list-group-item ">Kapalı Cm <span class="badge badge-light">{{App\Cm::where('StatID','=',2)->count()}}</span></a>                    
      <a href="{{route('cms.create')}}" class="list-group-item active">Yeni Kayıt Oluştur</a>                    
    </div>
</div> 