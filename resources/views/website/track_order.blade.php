@include('website.layout.head')
<style>
    @media(min-width: 992px){
        #container{
            height: 75vh;
        }
    }
</style>
<div class="container-fluid pt-5" id="container">
    <div class="">
       @if ($orders->contains('status', 'Pending'))
    <h4 class="text-success mb-4">Each order will be delivered within 45 minutes of the time it was created.</h4>
    @php $count = 0; @endphp
    @foreach ($orders as $order)
        @if ($order->status === 'Pending')
            @php $count++; @endphp
            @if ($count === 1)
                <h4 class="text-success mb-4">Your order will arrive at: {{ $order->created_at->addMinutes(45)->format('h:i A') }}</h4>
            @endif
        @endif
    @endforeach
@endif

        <table class="table table-striped">
          <thead>
            <tr>
              <!--<th scope="col">#</th>-->
              <!--<th scope="col">Category</th>-->
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Created at</th>
              <!--<th scope="col">Status</th>-->
            </tr>
          </thead>
          <tbody>
              @foreach($orders as $order)
            <tr>
              <!--<th scope="row">1</th>-->
              <!--<td>{{ $order->cart->product->category->category_name }}</td>-->
              <td>{{ $order->cart->product->name }}</td>
              <td>{{ $order->cart->qty }}</td>
              <td>${{ $order->cart->product->price * $order->cart->qty }}</td>
              <td>{{ $order->created_at }}</td>
              <!--<td>{{ $order->status }}</td>-->
            </tr>
            @endforeach()
          </tbody>
        </table>
    </div>

</div>


@include('website.layout.footer')



