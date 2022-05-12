<x-layout>
    <div class="container">
        <div class="row-2 pt-5 d-flex justify-content-center">
            <form method="GET" action="{{ route('dashboard.index') }}" class="form-control d-flex col-6 h-25">
                @if(request('client'))
                    <input type="hidden" name="client" value="{{ request('client') }}">
                @endif
                <input class="form-control" type="text" id="search" name="search" placeholder="Keyword"
                       value="{{ request('search') }}">
                <select name="filters" id="filters" class="form-control w-50 ml-4">
                    <option @if(request('filters') == 'all') selected @endif value="all">All</option>
                    <option @if(request('filters') == 'client') selected @endif value="client">Client</option>
                    <option @if(request('filters') == 'product') selected @endif value="product">Product</option>
                    <option @if(request('filters') == 'total') selected @endif value="total">Total</option>
                    <option @if(request('filters') == 'date') selected @endif value="date">Date</option>
                </select>
                <button class="btn btn-primary ml-4" type="submit">Search</button>
            </form>
        </div>

        <div class="container mt-5 col-9">
            <canvas id="myChart" height="100px"></canvas>
        </div>

        <div class="col-5 d-flex justify-content-center mt-5">
            <a href="{{ route('send-mail', request()->only('search', 'filters')) }}" class="btn btn-primary">Email this report</a>
        </div>

        <div class="row mt-5 d-flex justify-content-center">
            <table class="rwd-table col-6">
                <tr>
                    <th>@sortablelink('client.id', 'Client')</th>
                    <th>@sortablelink('product.id', 'Product')</th>
                    <th>Total</th>
                    <th>@sortablelink('date')</th>
                    <th>Actions</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->date }}</td>
                        <td>
                            <span class="d-flex">
                                <a href="{{ route('dashboard.edit', $order->id) }}"
                                   class="text-white btn border">Edit</a>
                                <form action="{{ route('dashboard.destroy', $order->id) }}" method="POST" class="ml-4">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn text-white border">Delete</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="col-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const config = {
            type: 'line',
            data: {
                labels: {{ Js::from($dataOrders->keys()) }},
                datasets: [{
                    label: 'Total',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: {{ Js::from($dataOrders->values()) }},
                }]
            },
            options: {},
            labels: {{ Js::from($dataOrders->toArray()) }},
            datasets: [{
                label: 'Line',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {{ Js::from($dataOrders->values()) }},
            }]
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
</x-layout>
