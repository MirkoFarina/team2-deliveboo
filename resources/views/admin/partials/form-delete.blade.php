<form
    onsubmit="return confirm('Vuoi davvero eliminare {{ $title }}?, dopo non sarà possibile recuperarlo')"
    class="d-inline" action=" {{ route($route, $element) }} " method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger mx-2 px-4 my-1">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
