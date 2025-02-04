{{ title }} <br>
{{ last_name }} <br>

@if($title):
  condition is true!!
@endif;

<br>
_________

<br>


@foreach($arr as $ar):
  {{ ar }}

@endforeach;
