<script>
function warningMsg(e) {
    e.preventDefault();
    let target = this;
    Swal.fire({
        title: "{{ $msgTitle ?? 'Estas seguro?'}}",
        text: "{{ $msgText ?? 'No podras revertir esta accion!'}}",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "{{$btnConfirm ?? 'Si'}}",
        cancelButtonText: "{{$btnCancel ?? 'Cancelar'}}"
    }).then((result) => {
    if (result.value) {
        target.closest('form').submit()
    }
    })
}

const btn = document.getElementsByClassName('submit-alert')
const lenght = btn.length;

for (let index = lenght; index > 0; index--) {
    btn[index - 1].addEventListener('click', warningMsg, false)
}
</script>
