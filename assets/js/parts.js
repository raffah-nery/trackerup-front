const btnNew = document.querySelector('#btnNew')
const frmNew = document.querySelector('#frmNew')

btnNew.addEventListener('click', () => {
  frmNew.reset()
  $('#newModal').modal('show')
})

// DELETE
const btnDelete = document.getElementsByClassName('btn-delete')

for (const btn of btnDelete) {
  btn.addEventListener('click', () => {
    const deleteName = document.querySelector('#deleteName')
    const frmDelete = document.querySelector('#frmDelete')
    frmDelete[0].value = btn.dataset.code
    deleteName.innerHTML = btn.dataset.name
    $('#deleteModal').modal('show')
  })
}