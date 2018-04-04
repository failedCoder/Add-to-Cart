@extends('layouts.master')

@section('content')
    
 	<div class="container-fluid">

            <div class="row">
                <div class="col-md-10">

                @if ($flash=session('message'))
                <div class="alert alert-danger text-center" role="alert" id="fail">
                {{ $flash }}
                </div>    
                @endif
               
                <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
                <script type="text/javascript">
                $("#fail").fadeOut(6000)
                </script>
                
                @if( count($items) < 1 )

                <h1>No items available!</h1>
                
                @endif

                @foreach($items as $item)
                
                    
                    <div class="media color border border-light rounded" style="width: 100%">
                        <img class="align-self-center mr-3 img-style" src="{{$item->image}}" alt="Generic placeholder image"">
                        <div class="media-body d-flex justify-content-between my-auto">
                            <div class="col">
                                <h5 class="mt-0"><strong>{{$item->name}}</strong></h5>
                            </div>
                            <div class="col">
                                <h5 class="mt-0">Category:{{$item->category->name}}</h5>
                            </div>
                            <div class="col">
                                <h5 class="mt-0">Price: {{$item->price}} $</h5>
                            </div>
                            <div class="col">
                                @include('layouts.partials.buttons')
                            </div>
                     
                        </div>
                    </div>

                    @endforeach

                    <br>
                    <div class="container d-flex justify-content-center">
                    {{ $items->links() }}
                    </div>
                    
                </div>
                <div class="col-md-2 text-center">

                    <div class="card bg-light mb-3">
                    <div class="card-header">Categories:</div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             <a href="/">All products</a>
                             <span class="badge badge-primary badge-light">{{$items->count()}}</span>
                             </li>
                        @foreach($categories as $category)
                        @if($category->item->count()>0)
                         
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                             <a href="{{$category->name}}">{{$category->name}}</a>
                             <span class="badge badge-primary badge-light">{{$category->item->count()}}</span>
                             </li>
                         
                         @endif
                         @endforeach
                         </ul>   
                    </div>

                  
                
             
            

            

                
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Contact us</div>
                    <div class="card-body">
                    <p class="card-text">If you need help, we offer a number of options for customer support:</p>
                    <ul class="list-group list-group-flush">
                         <li class="list-group-item">
                            <i class="far fa-envelope"></i> 
                            ExampleMail@mail.com
                        </li>
                         <li class="list-group-item">
                            <i class="fas fa-phone"></i>
                            <br>
                            012345678
                         </li>
                    </ul>
                    </div>
                    </div>
                
                
           
               </div>
            
        </div>




@endsection