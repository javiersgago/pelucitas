<div class="col-xs-3">
    @foreach ($citas as $cita)
        <div class="col-xs-12" style="height:{{$tamDiv}}px;border: solid 1px;">{{$cita->hora->format("H:i")}}</div>
    @endforeach
</div>
<div class="col-xs-9">
    @foreach ($citas as $cita)
        {!! $cita->html !!}
    @endforeach
</div>