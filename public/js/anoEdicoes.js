$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var ano = button.data('ano') // Extrai informação dos atributos data-*
  var id = button.data('id')
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-body #recipient-name').val(ano)
  modal.find('.modal-body #recipient-id').val(id)
})        

$('#modalEditarCategoria').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var categoria = button.data('categoria')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #recipient-name').val(categoria)
  modal.find('.modal-body #recipient-id').val(id)
})    

$('#modalEditorasEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var editora = button.data('editora') 
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #recipient-name').val(editora)
  modal.find('.modal-body #recipient-id').val(id)
})   

function confirmar_exclusao_ano() {
  if (confirm('Deseja realmente deletar esse ano?')) {
      return  true;
  }
}

function confirmar_exclusao_categoria() {
  if (confirm('Deseja realmente deletar essa categoria?')) {
      return  true;
  }
}

function confirmar_exclusao_editora() {
  if (confirm('Deseja realmente deletar essa editora?')) {
      return  true;
  }
}