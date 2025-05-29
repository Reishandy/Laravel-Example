<div>
   <p>
       Aircraft {{ $aircraft->code.' '.$aircraft->name }} Added
   </p>

    <p>
        <a href="{{ url('/aircraft/'. $aircraft->code) }}">Visit</a>
    </p>
</div>
