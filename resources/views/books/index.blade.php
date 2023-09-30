@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Review Sách List</h1>

    <form method="GET" action="{{route('books.index')}}" class="mb-4 flex items-center space-x-2">
        <input type="text" name="title" placeholder="Tìm kiếm bằng tên" value="{{request('title')}}" class="input h-10">
        <input type="hidden" name="filter" value="{{request('filter')}}">
        <button type="submit" class="btn h-10">Search</button>
        <a href="{{route('books.index')}}" class="btn h-10">Clear</a>
    </form>

    <div class="filer-container mb-4 flex">
        @php
            $filters = [
			    '' => 'Mới nhất',
			    'popular_last_month' => 'Phổ biến tháng trước',
			    'popular_last_6months' => 'Phổ biến 6 tháng trước',
			    'highest_rated_last_month' => 'Đánh giá cao tháng trước',
			    'highest_rated_last_6months' => 'Đánh giá cao 6 tháng trước',
            ]
        @endphp

        @foreach($filters as $key => $label)
            <a href="{{route('books.index', [...request()->query(), 'filter' => $key])}}" class="filter-item">
                {{$label}}
            </a>
        @endforeach
    </div>

    <ul>
        @forelse($books as $book)
            <li class="mb-4">
                <div class="book-item">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto">
                            <a href="{{route('books.show', $book)}}" class="book-title">{{$book->title}}</a>
                            <span class="book-author">của {{$book->author}}</span>
                        </div>
                        <div>
                            <div class="book-rating">
                                <x-star-rating :rating="$book->reviews_avg_rating" />
                            </div>
                            <div class="book-review-count">
                                trong tổng {{$book->reviews_count}} review
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">Không tìm thấy dữ liệu</p>
                    <a href="{{route('books.index')}}" class="reset-link">Reset</a>
                </div>
            </li>
        @endforelse
    </ul>
@endsection
