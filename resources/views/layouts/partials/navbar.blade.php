<nav class="navbar navbar-light bg-light">

  <a class="navbar-brand" href="/">Shop</a>

  
   <div class="dropdown mr-auto">

      <button class="btn btn-outline-light active dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categories 
      </button>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/">All products</a>
            @foreach($categories as $category)
            @if($category->item->count()>0)

            <a class="dropdown-item" href="{{$category->name}}">{{$category->name}}</a>
            @endif
            @endforeach
      </div>

    </div>



    <div class="row">
    <div class="dropdown mr-sm-2">

      <button class="btn btn-outline-light active dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i> Profile 
      </button>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

         @auth
            <a class="dropdown-item" href="/cart">My Cart</a>

            
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
                               
         @else
                        
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>

            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
         @endauth

       

        

      </div>

    </div>

    <form class="form-inline my-2 my-lg-0 " method="GET" action="/search">

      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">

      <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>

    </form>
    </div>
  
</nav>

<div class="container-fluid" style="margin-bottom: 20px;">

  <div class="row d-flex justify-content-end">

    <a href="/cart" class="btn btn-outline-danger btn-lg" role="button" aria-pressed="true">

    <i class="fas fa-shopping-cart"></i> 
    @auth
    {{$cartCount}}
    @else
    0
    @endauth Products (
    @php
    $price = 0;
    @endphp
    @auth
    @foreach($cartItems as $items)
    @php
    $price=$items->price+$price;
    @endphp
    @endforeach
    @endauth
    {{$price}} $) <i class="fas fa-caret-right fa-sm"></i>

  </a>

</div>

</div>
