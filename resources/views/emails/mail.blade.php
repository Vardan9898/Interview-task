@component('mail::message')
# {{ $maildata['title'] }}
@component('mail::table')
<div class="row mt-5 d-flex justify-content-center">
<table class="rwd-table col-6">
<tr>
<th>Client</th>
<th>Product</th>
<th>Total</th>
<th>Date</th>
</tr>
@foreach($orders as $order)
<tr>
<td>{{ $order->client->name }}</td>
<td>{{ $order->product->name }}</td>
<td>{{ $order->total }}</td>
<td>{{ $order->date }}</td>
</tr>
@endforeach
</table>
</div>
@endcomponent
@endcomponent
