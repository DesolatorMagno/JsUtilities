<script>
    const btnD = document.getElementsByClassName('delete')
    const lenghtD = btnD.length;

    for (let index = lenghtD; index > 0; index--) {
        btnD[index - 1].addEventListener('click', confirmAlert, false)
    }

    function confirmAlert(e) {
       e.preventDefault();
       let target = this;
        Swal.fire({
            title: "{{ $title ?? 'Estas seguro?'}}",
            text: "{{ $msg ?? 'No podras revertir esta accion!'}}",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{$btnConfirm ?? 'Si'}}",
            cancelButtonText: "{{$btnCancel ?? 'Cancelar'}}"
        }).then((result) => {
        if (result.value) {
            requestAction(target)
        }
        })
    }

    function requestAction(item) {
        let url = item.closest('form').action
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(url,{
            headers:{
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'delete',
            credentials: "same-origin",
            })
            .then((data) => {
                if (data.status == 200) {
                    if ({{ $destroyTr ?? 1 }}) {
                        let tr = item.closest('tr')
                        tr.parentNode.removeChild(tr);
                    }
                }
            })
            .catch(function(error) {
                console.log(error);
            });

    }
</script>
