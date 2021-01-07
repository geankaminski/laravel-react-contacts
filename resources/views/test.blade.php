<div class="container">
    @foreach ($contacts as $lead)
        {{ $lead->name }}
    @endforeach
</div>

{{ $contacts->links() }}
