
@extends('layouts.app_master_admin')
@section('title', 'khảo sát')

@section('content')
    <style>
        body {
            background: #ecf0f5; 
            margin: 0;
        }
        header.box {
            //background-color: #a04949;
            text-align: center;
            border-top-color;
            padding: 50px;  
        }
        #container {
            "min-height: 768px;
        }
    </style>

    <div class="container">
        <div class="box box-widget col-md-12 column ">
            <form action="{{ route('page.store', $data['id']) }}" method="POST" id="mainForm">
                @csrf
                @php
                    $prototypes = array(A,B,C);
                    $properties = array(chong nang, chong mua, chong gio, chong nhiet);
                    $weight = array(10,20,30,40);
                    $rating = array(3,4,3,4);
                    $weighted_score = array(3.0, 3.5, 4.5);
                @endphp
                <table class="table table-bordered table-hover" id="tab_logic" style="text-align: center; background: white ;">
                    <thead>
                        <tr>
                            {{-- for các mẫu --}}
                            <th></th>
                            @foreach ($prototypes as $keyPrototypes => $namePrototype)
                                <th style= "text-align: center;">
                                    {{$namePrototype}}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody> 
                        
                        @foreach ($properties as $keyProperties => $nameProperties)
                            <tr>
                                <td>{{ $nameProperties }}</td>
                                @foreach ($prototypes as $keyPrototypes => $namePrototype)
                                    <td>
                                        @for ($i = 0; $i < $levels; $i++)
                                            <input type="radio" name="pp_{{ $keyPrototypes }}_{{ $keyProperties }}" value="{{ $i + 1 }} " />
                                        @endfor
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                    <button type="submit" id="btnSubmit" class="btn btn-primary">Gửi</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
                $("#mainForm").validate();
                $(".image_pt").elevateZoom({
                scrollZoom : true
                // zoomWindowWidth 1000,
                // zoomWindowHeight:1000
                // easing : true
                });
                
            });
                      
        </script>


@endsection
    
