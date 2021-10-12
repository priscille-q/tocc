const contact = document.querySelector("#contact");
const modal = document.querySelector('#modal')
modal.addEventListener('show.bs.modal', function (event) {

  let title = contact.elements['title'];
  let surname = contact.elements['surname'];
  let email = contact.elements['email'];
  let message = contact.elements['message'];

  let modalBody = document.querySelector('#modal-body');
  modalBody.innerHTML = '';
  modalBody.prepend('Message : '+message.value+' ');
  modalBody.prepend('Email : '+email.value+' ');
  modalBody.prepend('Surname : '+surname.value+' ');
  modalBody.prepend('Title : '+title.value+' ');

});
