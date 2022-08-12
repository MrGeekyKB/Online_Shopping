<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
<div class="quick_bar">
  <a href="{{url('all_products')}}"><i class="fa fa-search" aria-hidden="true"></i>Explore products</a>
  <a href="{{ route('displayCart', ['id' => Auth::user()->id])}}"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size: 150px;"></i>Cart</a>
</div>

</x-app-layout>
