@extends('backend.layouts.master')

@section('title', 'Detalii comandă')

@section('main-content')
<div class="card">
  <h5 class="card-header">Editare comandă</h5>
  <div class="card-body">
    <form action="{{route('order.update', $order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
          <option value="new" {{($order->status == 'delivered' || $order->status == "process" || $order->status == "cancel") ? 'disabled' : ''}}  {{(($order->status == 'new') ? 'selected' : '')}}>Nou</option>
          <option value="process" {{($order->status == 'delivered' || $order->status == "cancel") ? 'disabled' : ''}}  {{(($order->status == 'process') ? 'selected' : '')}}>Procesat</option>
          <option value="delivered" {{($order->status == "cancel") ? 'disabled' : ''}}  {{(($order->status == 'delivered') ? 'selected' : '')}}>Livrat</option>
          <option value="cancel" {{($order->status == 'delivered') ? 'disabled' : ''}}  {{(($order->status == 'cancel') ? 'selected' : '')}}>Anulat</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Actualizează</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
