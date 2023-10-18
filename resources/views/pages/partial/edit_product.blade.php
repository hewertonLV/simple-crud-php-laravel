<div class="modal fade" id="editProductModal" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProduct" method="get" action="{{route('editProduct')}}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" id="id_pro" value="">
                        <div class="col-md-6 col-sm-12">
                            <x-input name="name" id="name_pro" label="Nome" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <x-input name="price" id="price_pro" label="Preço" required="true"
                                     type="number" value=""/>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <x-input name="amount" id="amount_pro" label="Quantidade" required="true"
                                     type="number" value=""/>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <x-input name="description" id="description_pro" label="Descrição"
                                     type="text" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="editProduct" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let id_pro = $('#id_pro');
        let name_pro = $('#name_pro');
        let price_pro = $('#price_pro');
        let amount_pro = $('#amount_pro');
        let description_pro = $('#description_pro');

        $("button[id^='product']").click(function () {
            let getEvent = $(this);
            id_pro.val(getEvent.data('id'));
            name_pro.val(getEvent.data('name'));
            price_pro.val(getEvent.data('price'));
            amount_pro.val(getEvent.data('amount'));
            description_pro.val(getEvent.data('description'));
        });
    });
</script>
