@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Editare postare</h5>
    <div class="card-body">
      <form method="post" action="{{route('post.update', $post->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titlul <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Introduceți titlul"  value="{{$post->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote" class="col-form-label">Citat</label>
          <textarea class="form-control" id="quote" name="quote">{{$post->quote}}</textarea>
          @error('quote')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Rezumat <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$post->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Descriere</label>
          <textarea class="form-control" id="description" name="description">{{$post->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="post_cat_id">Categorie <span class="text-danger">*</span></label>
          <select name="post_cat_id" class="form-control">
              <option value="">--Selectează orice categorie--</option>
              @foreach($categories as $key => $data)
                  <option value='{{$data->id}}' {{(($data->id == $post->post_cat_id) ? 'selected' : '')}}>{{$data->title}}</option>
              @endforeach
          </select>
        </div>
        {{-- {{$post->tags}} --}}
        @php 
                $post_tags = explode(',', $post->tags);
// dd($tags);
              @endphp
        <div class="form-group">
          <label for="tags">Etichetă</label>
          <select name="tags[]" multiple  data-live-search="true" class="form-control selectpicker">
              <option value="">--Selectează orice etichetă--</option>
              @foreach($tags as $key => $data)
              
              <option value="{{$data->title}}"  {{((in_array("$data->title", $post_tags)) ? 'selected' : '')}}>{{$data->title}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="added_by">Autor</label>
          <select name="added_by" class="form-control">
              <option value="">--Selectează oricare--</option>
              @foreach($users as $key => $data)
                <option value='{{$data->id}}' {{(($post->added_by == $data->id) ? 'selected' : '')}}>{{$data->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Fotografie <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Alege
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$post->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($post->status == 'active') ? 'selected' : '')}}>Activ</option>
            <option value="inactive" {{(($post->status == 'inactive') ? 'selected' : '')}}>Inactiv</option>
        </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Actualizează</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <script>
  $('#lfm').filemanager('image');

  $(document).ready(function() {
  $('#summary').summernote({
    placeholder: "Scrie o scurtă descriere.....",
    tabsize: 2,
    height: 150
  });
  });

  $(document).ready(function() {
    $('#quote').summernote({
    placeholder: "Scrie o scurtă descriere.....",
    tabsize: 2,
    height: 100
    });
  });
  $(document).ready(function() {
    $('#description').summernote({
    placeholder: "Scrie o scurtă descriere.....",
    tabsize: 2,
    height: 150
    });
  });
  </script>
@endpush