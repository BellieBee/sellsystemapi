<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2><a href="{{route('bill.index')}}">Bills</a>\Bill Details</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Client Name: </th>
                                    <td>{{$bill->users->name}}</td>
                                </tr>
                                <tr>
                                    <th>Total Price: </th>
                                    <td>{{$bill->total_price}}</td>
                                </tr>
                                <tr>
                                    <th>Total Tax: </th>
                                    <td>{{$bill->total_tax}}</td>
                                </tr>
                            </thead>
                        </table>
                        <h3>Products</h3>
                        <table>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Tax %</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($bill->sellbills as $sell)
                                <tr>
                                    <td>{{$sell->sells->products->name}}</td>
                                    <td>{{$sell->sells->products->price}}</td>
                                    <td>{{$sell->sells->products->tax}}</td>
                                    <td>{{$sell->sells->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

