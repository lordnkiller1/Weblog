<form
    action="{{ $action }}"
    method="POST"
>

    @csrf
    @method('DELETE')


    <button
        type="submit"
        class="
            px-4 py-2
            rounded-xl
            bg-red-500/10
            text-red-400
            hover:bg-red-500
            hover:text-white
            transition-all duration-300
        "
    >
        حذف
    </button>


</form>