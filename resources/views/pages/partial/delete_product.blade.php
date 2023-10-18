<div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="excluirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Você tem certeza de que deseja excluir o produto ?</p>
            </div>

            <div class="modal-footer">
                <form action="{{ route('deleteProduct') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="excluirItemId">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        let id = $('#excluirItemId');

        $("button[id^='delete']").click(function () {
            let getEvent = $(this);
            id.val(getEvent.data('id'));
        });
    });
</script>
