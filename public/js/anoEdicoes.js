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

function confirmar_exclusao() {
  if (confirm('Deseja realmente deletar esse ano?')) {
      return  true;
  }
}