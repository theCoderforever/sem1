<form action="{{route('banner.index')}}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @php 
        $perpage = request('perpage') ?: old('perpage');
  

@endphp
         <div class="perpage">
             <div class="uk-flex uk-flex-middle uk-flex-space-between">
              <select name="perpage" class="form-control input-sm perpage filter mr10 setupSelect2" id="">
                  @for($i = 20; $i <= 200; $i+=20)
                  <option {{$perpage == $i  ? 'selected' : ''}} value="{{$i}}">{{$i}} {{__('messages.perpage')}}</option>
                  @endfor
              </select>
             
             </div>
          </div>
          <div class="action">
              <div class="uk-flex uk-flex-middle">
               
                  <div class="uk-search uk-flex uk-flex-middle mr10">
                      <div class="input-group">
                          <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword')}}"
                          placeholder="{{__('messages.search_input')}}"
                          class="form-control"
                          >
                          <span class="input-group-btn">
                              <button type="submit" name="search" value="search" class="btn btn-primary m0 btn-sm">{{__('messages.search')}}</button>
                          </span>
                      </div>
                  </div>
                  <a name="" id="" class="btn btn-danger" href="{{route('banner.create')}}" role="button"><i class="mr5 fa fa-plus">
                    {{__('messages.banner.create.title')}}
                </i></a>
              </div>
          </div>
        </div>
     </div>
</form>