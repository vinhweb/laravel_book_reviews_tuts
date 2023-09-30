@if($rating)
    @for($i=1; $i<=5;$i++)
       {{$i <= round($rating) ? '★' : '☆' }}
    @endfor
@else
    Không có đánh giá
@endif