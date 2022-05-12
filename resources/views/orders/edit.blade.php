<x-layout>
    <div class="container d-flex justify-content-center mt-5 pt-5">
        <table class="rwd-table mt-5">
            <tr>
                <th>Client</th>
                <th>Product</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <tr>
                <form action="{{ route('dashboard.update', $order->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <td>{{ $order->client->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td><input name="total" type="number" value="{{ $order->total }}"></td>
                    <td><input name="date" type="date" value="{{ $order->date }}"></td>
                    <td><a href="{{ route('dashboard.index') }}" class="text-white btn border">See all</a></td>
                    <td>
                        <button type="submit" class="text-white btn border">Update</button>
                    </td>
                </form>
            </tr>
        </table>
    </div>
</x-layout>
