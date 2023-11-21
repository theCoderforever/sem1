
    <div class="row mb15">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-panel text-left">
                    Tên banner<span class="text-danger">(*)</span></label>
                <input type="text" name="name" value="{{old('name', ($banner->name) ?? '')}}"   class="form-control" placeholder="" autocomplete="off">
            </div>
        </div>
    
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-panel text-left">
                    Image<span class="text-danger">(*)</span></label>
                <input type="file" name="photo"  class="form-control" placeholder="" autocomplete="off">
                @if(isset($banner->name))
                <img src="{{asset('/storage/image/'.($banner->image) ?? '')}}" width="200px" alt="">
                @endif
            </div>
        </div>
    
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-panel text-left">
                    Avatar<span class="text-danger">(*)</span></label>
                <input type="file" name="anh"  class="form-control" placeholder="" autocomplete="off">
                @if(isset($banner->name))
                <img src="{{asset('/storage/image/'.($banner->avatar) ?? '')}}" width="200px" alt="">
                @endif
            </div>
        </div>
    </div>



