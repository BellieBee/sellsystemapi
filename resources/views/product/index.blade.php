<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Product List</h2>
                    <small><a href={{ url('product/create') }}>Create</a></small>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Tax %</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->tax}}</td>
                                <td>
                                    <a href="{{url('/product', $product->id)}}"><b>show</b></a>,
                                    <a href="{{route('product.edit', $product->id)}}"><b>edit</b></a>,
                                    <a href="{{route('product.destroy', $product->id)}}"><b>delete</b></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
