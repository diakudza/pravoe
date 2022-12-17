<span
@switch($proposal->status)
    @case('inwork') class="text-primary"> В работе @break
    @case('new') class="text-secondary"> Новая @break
    @case('completed') class="text-accent"> Завершена @break
@endswitch
</span>
