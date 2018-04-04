                        @php
                            $inCart = false;
                        @endphp
                        @auth
                        @foreach(Auth::user()->items as $cart)
                            @if($cart->id == $item->id)
                                @php
                                    $inCart = true;
                                @endphp
                                @break
                            @endif
                        @endforeach
                        @endauth
                        @if($inCart == true)
                                <form method="POST" action="/remove/{{$item->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-outline-warning mr-sm-2 btn-block"><i class="fas fa-trash-alt"></i> Remove from cart
                                    </button>
                                </form>
                        @else
                            <form action="/add" method="POST">
                              @csrf
                              <input type="hidden" name="item_id" value="{{$item->id}}">

                            @auth
                            <button type="submit" class="btn btn-outline-warning mr-sm-2 btn-block"><i class="fas fa-cart-plus"></i> Add to Cart 
                            </button>
                            @else
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Login Required">
                                <button type="submit" class="btn btn-outline-warning mr-sm-2 btn-block" style="pointer-events: none;" disabled><i class="fas fa-cart-plus"></i> Add to cart  
                            </button>
                            </span>
                            @endauth
                        </form>
                        @endif
