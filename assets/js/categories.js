const btnNew = document.querySelector('#btnNew')
const frmCategory = document.querySelector('#frmCategory')
const categoryModalLabel = document.querySelector('#categoryModalLabel')

btnNew.addEventListener('click', () => {
  categoryModalLabel.innerHTML = 'Nova Categoria'
  frmCategory.reset()
  frmCategory[0].value = 'insert'
  $('#categoryModal').modal('show')
})

// UPDATE
const btnUpdate = document.getElementsByClassName('btn-update')
for (const btn of btnUpdate) {
  btn.addEventListener('click', async () => {
    const getCategory = await fetch(`/categories.php?get_update_id=${btn.dataset.id}`)
      .then(response => response.json())
      .then(data => data)
    if (getCategory.status === 'success') {
      const data = getCategory.data
      categoryModalLabel.innerHTML = `Editar Categoria: ${data.name}`
      frmCategory[0].value = 'update'
      frmCategory[1].value = data.id
      frmCategory[2].value = data.name
      frmCategory[3].value = data.description
    }
    $('#categoryModal').modal('show')
  })
}

// DELETE
const btnDelete = document.getElementsByClassName('btn-delete')

for (const btn of btnDelete) {
  btn.addEventListener('click', () => {
    const deleteName = document.querySelector('#deleteName')
    const frmDelete = document.querySelector('#frmDelete')
    frmDelete[0].value = btn.dataset.id
    deleteName.innerHTML = btn.dataset.name
    $('#deleteModal').modal('show')
  })
}
