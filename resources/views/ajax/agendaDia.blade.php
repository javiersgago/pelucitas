<div class="col-xs-3">
    @foreach ($citas as $cita)
        <div class="col-xs-12 horas" style="height:{{$tamDiv}}px;"><p class="hora">{{$cita->hora->format("H:i")}}</p></div>
    @endforeach
</div>
<div class="col-xs-9">
    @foreach ($citas as $cita)
        {!! $cita->html !!}
    @endforeach
</div>