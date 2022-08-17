@extends('layouts.UserLayout')

@section('meta')
    <title>Athlitic</title>
@endsection
@section('main')



<div class="latest-release-wrapper">
    <div class="container">
        <div class="latest-release">
            <h1 class="my-5 fs-1">Latest Releases</h1>
            <div>
                @foreach ($collections as $collection)
                    @if ($collection->featured == 1)
                        <div>
                            <img class="presented-img" src="{{ asset('img/collections/' . $collection->image) }}"
                                alt="">

                            <h1>{{ $collection->name }}</h1>

                            <p>{{ $collection->description }}</p>
                            <a href="{{ route('user.shop').'?collection='.$collection->id }}" class="custom-button">Explore!</a>
                        </div>
                    @endif
                @endforeach
                @foreach ($collections as $collection)
                    @if ($collection->featured == 2)
                        <div>
                            <h1>{{ $collection->name }}</h1>
                            <p>{{ $collection->description }}</p>
                            <a href="{{ route('user.shop').'?collection='.$collection->id }}" class="custom-button">Explore!</a>
                            <img class="presented-img" style="margin-top:20px" src="{{ asset('img/collections/' . $collection->image) }}"
                                alt="">
                        </div>
                    @endif
                @endforeach
                @foreach ($collections as $collection)
                    @if ($collection->featured == 3)
                        <div>
                            <img class="presented-img" src="{{ asset('img/collections/' . $collection->image) }}"
                                alt="">

                            <h1>{{ $collection->name }}</h1>

                            <p>{{ $collection->description }}</p>
                            <a href="{{ route('user.shop').'?collection='.$collection->id }}" class="custom-button">Explore!</a>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="trending-wrapper">
    <div class="container">
        <div class="trending">
            <h1 class="my-5">Trending Items</h1>
        </div>
    </div>
    <div class="ccarousel-wrap">
        <button class="left">
            <i class="bi bi-caret-left-fill"></i>
        </button>
        <button class="right">
            <i class="bi bi-caret-right-fill"></i>
        </button>
        <div class="ccarousel-cadre">
            <div class="blur">

            </div>

            @foreach ($products as $index=>$product)
            <div class="ccarousel-item @if ($index==0)
                on
                @elseif($index==1)
                next
                @elseif($index==count($products)-1)
                prev
            @endif">
                <img src="{{ asset('img/products/'.$product->image) }}" alt="">
                <div>
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <p><span class="@if($product->promo) old-price @else new-price m-0 @endif">${{ $product->price }}</span>
                    @if ($product->promo)
                    <span class="new-price">${{ round($product->price - ($product->price * $product->promo) / 100, 2) }}</span>
                    @endif
                    </p>
                    <button class="custom-button">Purchase</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="wide-image-wrapper">
    <div class="container">
        <div class="wide-image">
            <h1>Biking on a whole new level!</h1>
            <button class="custom-button">Explore!</button>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    const items = document.querySelectorAll('.ccarousel-item')
    const nextbtn = document.querySelector('.right')
    const prevbtn = document.querySelector('.left')
    setInterval(() => {
        nextbtn.click()
    }, 5000);
    let i = 0

    nextbtn.addEventListener('click', () => {
        if (i == items.length - 1) {
            i = 0
        } else {
            i++
        }
        if (i == 0) {
            items.forEach(e => {
                e.classList.remove('on')
                e.classList.remove('next')
                e.classList.remove('prev')
            })
            items[0].classList.add('on')
            items[items.length - 1].classList.add('prev')
            items[1].classList.add('next')
        } else if (i == items.length - 1) {
            items.forEach(e => {
                e.classList.remove('on')
                e.classList.remove('next')
                e.classList.remove('prev')
            })
            items[items.length - 1].classList.add('on')
            items[0].classList.add('next')
            items[items.length - 2].classList.add('prev')
        } else {
            items.forEach((element, index) => {
                if (index == i) {
                    element.classList.remove('next')
                    element.classList.remove('prev')
                    element.classList.add('on')
                }
                if (index == i - 1) {
                    element.classList.remove('on')
                    element.classList.remove('next')
                    element.classList.add('prev')

                }
                if (index == i + 1) {
                    element.classList.remove('prev')
                    element.classList.remove('on')
                    element.classList.add('next')

                }
            })

        }
    })
    prevbtn.addEventListener('click', () => {
        if (i == 0) {
            i = items.length - 1
        } else {
            i--
        }
        if (i == 0) {
            items.forEach(e => {
                e.classList.remove('on')
                e.classList.remove('next')
                e.classList.remove('prev')
            })
            items[0].classList.add('on')
            items[items.length - 1].classList.add('prev')
            items[1].classList.add('next')
        } else if (i == items.length - 1) {
            items.forEach(e => {
                e.classList.remove('on')
                e.classList.remove('next')
                e.classList.remove('prev')
            })
            items[items.length - 1].classList.add('on')
            items[0].classList.add('next')
            items[items.length - 2].classList.add('prev')
        } else {
            items.forEach((element, index) => {

                if (index == i) {
                    element.classList.remove('next')
                    element.classList.remove('prev')
                    element.classList.add('on')
                }
                if (index == i - 1) {
                    items.forEach(e => {
                        e.classList.remove('next')
                    })
                    element.classList.remove('on')
                    element.classList.remove('next')
                    element.classList.add('prev')

                }
                if (index == i + 1) {
                    element.classList.remove('prev')
                    element.classList.remove('on')
                    element.classList.add('next')

                }
            })

        }
    })
</script>
@endsection