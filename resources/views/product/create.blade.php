<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2><a href="{{ url('/product') }}">Product List</a>/Product Form</h2>
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name Product')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$product ? $product->name : ''}}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="Price" :value="__('Price Product')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01"  name="price" value="{{$product ? $product->price : ''}}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="tax" :value="__('Tax Product')" />
                            <x-text-input id="tax" class="block mt-1 w-full" type="number" name="tax" value="{{$product ? $product->tax : ''}}" required autofocus />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            @if(!$show)
                                <x-primary-button class="ml-4">
                                    {{ __('Save') }}
                                </x-primary-button>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{$product ? $product->id : ''}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
