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

$('#modalAutoresEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var autor = button.data('autor') 
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #recipient-name').val(autor)
  modal.find('.modal-body #recipient-id').val(id)
})   

$('#modalLivrosEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var titulo = button.data('titulo') 
  var autor = button.data('autor') 
  var autorid = button.data('autorid') 
  var editora = button.data('editora') 
  var editoraid = button.data('editoraid') 
  var edicao = button.data('edicao') 
  var paginas = button.data('paginas') 
  var categoria = button.data('categoria') 
  var categoriaid = button.data('categoriaid') 
  var ano = button.data('ano') 
  var anoid = button.data('anoid') 
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #inputTitulo').val(titulo)
  modal.find('.modal-body #selectAutores').val(autorid)
  modal.find('.modal-body #selectEditora').val(editoraid)
  modal.find('.modal-body #selectCategoria').val(categoriaid)
  modal.find('.modal-body #selectAnoPublicacao').val(anoid)
  modal.find('.modal-body #campoEdicao').val(edicao)
  modal.find('.modal-body #campoPaginas').val(paginas)
  modal.find('.modal-body #recipient-id').val(id)
})   

function confirmar_exclusao_ano() {
  if (confirm('Deseja realmente deletar esse ano?')) {
      return  true;
  }
}

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

function confirmar_exclusao_autor() {
  if (confirm('Deseja realmente deletar esse autor?')) {
      return  true;
  }
}

function confirmar_exclusao_livro() {
  if (confirm('Deseja realmente deletar esse livro?')) {
      return  true;
  }
}

var teste;
if (teste == 'granted') {
  

  $(document).ready(function() {
    $('#example').DataTable( {
        language: {
            url : '../DataTables/Portuguese-Brasil.json',
            decimal: ","
        },
        "pageLength": 15,
        "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
        "columns": [
            { data : "id" },
            { data : "titulo" },
            { data : "autor" },
            { data : "editora" },
            { data : "edicao" },
            { data : "paginas" },
            { data : "categoria" },
            { data : "anoPublicacao" },
            { data : 'teste' },
            { data : 'teste2' }
        ]
    } );
  } );

} else {

 $(document).ready(function() {
    $('#example').DataTable( {
        language: {
            url : '../DataTables/Portuguese-Brasil.json',
            decimal: ","
        },
        "pageLength": 15,
        "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
        "columns": [
            { data : "id" },
            { data : "titulo" },
            { data : "autor" },
            { data : "editora" },
            { data : "edicao" },
            { data : "paginas" },
            { data : "categoria" },
            { data : "anoPublicacao" }
        ]
    } );
  } );
}


$(document).ready(function() {
  $('#autoresTable').DataTable( {
      "autoWidth": false,
      responsive: false,
      language: {
          url : '../DataTables/Portuguese-Brasil.json',
          decimal: ","
      },
      "pageLength": 15,
      "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
      columnDefs: [
        { "width": "200px", "targets": [0] },       
        { "width": "1100px", "targets": [1] },
        { "width": "200px", "targets": [2,3] }
      ],
      "columns": [
          { data : "id" },
          { data : "autor" },
          { data : "editar" },
          { data : "deletar" }
      ]
  } );
} );

$(document).ready(function() {
  $('#editorasTable').DataTable( {
      "autoWidth": false,
      responsive: false,
      language: {
          url : '../DataTables/Portuguese-Brasil.json',
          decimal: ","
      },
      "pageLength": 15,
      "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
      columnDefs: [
        { "width": "200px", "targets": [0] },       
        { "width": "1100px", "targets": [1] },
        { "width": "50px", "targets": [2,3] }
      ],
      "columns": [
          { data : "id" },
          { data : "autor" },
          { data : "editar" },
          { data : "deletar" }
      ]
  } );
} );

$(document).ready(function() {
  $('#categoriasTable').DataTable( {
      "autoWidth": false,
      responsive: false,
      language: {
          url : '../DataTables/Portuguese-Brasil.json',
          decimal: ","
      },
      "pageLength": 15,
      "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
      columnDefs: [
        { "width": "200px", "targets": [0] },       
        { "width": "1100px", "targets": [1] },
        { "width": "200px", "targets": [2,3] }
      ],
      "columns": [
          { data : "id" },
          { data : "editora" },
          { data : "editar" },
          { data : "deletar" }
      ]
  } );
} );

$(document).ready(function() {
  $('#anoEdicoesTable').DataTable( {
      "autoWidth": false,
      responsive: false,
      language: {
          url : '../DataTables/Portuguese-Brasil.json',
          decimal: ","
      },
      "pageLength": 15,
      "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
      columnDefs: [
        { "width": "200px", "targets": [0] },       
        { "width": "1100px", "targets": [1] },
        { "width": "200px", "targets": [2,3] }
      ],
      "columns": [
          { data : "id" },
          { data : "editora" },
          { data : "editar" },
          { data : "deletar" }
      ]
  } );
} );