@forelse ($schedules as $schedule)
    @php
        $s_time = explode(',', $schedule->start_time);
        $e_time = explode(',', $schedule->end_time);
    @endphp

    @for ($i = 0; $i < count($s_time); $i++)
    <label class="badge bg-primary" >
        <input type="radio" name="times" value="{{ $s_time[$i] }},{{ $e_time[$i] }}"/>
        {{ $s_time[$i] }} -- {{ $e_time[$i] }}
    </label>
    @endfor

    @empty
    <p class="text-danger">Slot Not Available</p>
@endforelse
