 @foreach ($activity as $event)
    <li class="list-group-item">
        @include ("activity.types.{$event->name}")
    </li>
@endforeach