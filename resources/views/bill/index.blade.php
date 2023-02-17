<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Sells Uncheckeds</h2>
                    <form method="POST" action="{{ route('bill.store') }}">
                        @csrf
                        <table>
                            <tr>
                                <th>Name</th>
                                <th colspan="3">Sells</th>
                            </tr>
                            @foreach ($users as $user)
                                @if($user->sells()->where('is_checked', 0)->first())
                                    <tr>
                                        <td>
                                            {{$user->name}}
                                            <input type="hidden" id="user_id[]" name="user_id[]" value="{{$user->id}}">
                                        </td>
                                        <td colspan="3">
                                            @foreach ($user->sells as $sell)
                                                @if($sell->is_checked === 0)
                                                    <b>Name:</b> {{$sell->products->name}} <br>
                                                    <b>Price:</b> {{$sell->products->price}} <br>
                                                    <b>Tax:</b> {{$sell->products->tax}} <br>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <x-primary-button class="ml-4">
                            {{ __('Generate Bill') }}
                        </x-primary-button>
                    </form>
                </div>
                <div class="p-6 text-gray-900">
                    <h2>Bills</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th colspan="2">Total Tax</th>
                            <th colspan="2">Total Price</th>
                            <th>Previews</th>
                        </tr>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{$bill->users->name}}</td>
                                    <td colspan="2">{{$bill->total_tax}}</td>
                                    <td colspan="2">{{$bill->total_price}}</td>
                                    <td><a href="{{route('bill.show', $bill->id)}}"><b>show</b></a></td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

