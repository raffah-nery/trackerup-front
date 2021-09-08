const btnNew = document.querySelector('#btnNew')
const frmNew = document.querySelector('#frmNew')

btnNew.addEventListener('click', () => {
  frmNew.reset()
  $('#newModal').modal('show')
})