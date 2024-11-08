@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Adaugă o categorie de postare</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titlul</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
              <option value="active">Activ</option>
              <option value="inactive">Inactiv</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Resetează</button>
           <button class="btn btn-success" type="submit">Trimiteți</button>
        </div>
      </form>
    </div>
</div>

@endsection
